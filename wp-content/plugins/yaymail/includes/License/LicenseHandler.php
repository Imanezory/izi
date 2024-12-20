<?php

namespace YayMail\License;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'YAYCOMMERCE_SELLER_SITE_URL' ) ) {
	define( 'YAYCOMMERCE_SELLER_SITE_URL', 'https://yaycommerce.com/' );
}

class LicenseHandler {
	protected static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	protected function __construct() {
		new RestAPI();
		if ( is_admin() ) {
			$this->do_hooks();
			$this->do_cron_job();
			$this->do_post_requests();
			$this->show_plugin_page_notification();
		}
	}

	public function do_hooks() {
		//add_action( 'admin_notices', array( $this, 'not_activate_license_notice' ) );
		add_filter( 'plugins_list', array( $this, 'support_auto_update' ), 100 );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_license_scripts' ) );
		add_action( 'yaycommerce_licenses_page', array( $this, 'yaycommerce_licenses_settings' ), 100 );
		add_filter( 'yaycommerce_licensing_plugins', array( $this, 'register_licensing_plugins' ), 100 );

		/** Expired license admin notice */
		add_action( 'admin_notices', array( $this, 'license_expired_admin_notice' ) );

		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			$license = new License( $plugin['slug'] );
			if ( ! $license->is_active() || $license->is_expired() ) {
				/** Add plugin action when expired license */
				add_filter( 'plugin_action_links_' . $plugin['basename'], array( $this, 'edit_action_links' ) );
			}
		}

		/** Auto update */
		add_action( 'admin_init', array( $this, 'auto_update' ) );
		add_filter( 'auto_update_plugin', array( $this, 'add_disabled_auto_update_text' ), 100, 2 );
	}

	public function support_auto_update( $plugins ) {
		foreach ( $plugins['all'] as $ind => $active_plugin ) {
			if ( 'YayCommerce' === $active_plugin['Author'] ) {
				$plugins['all'][ $ind ]['update-supported'] = true;
			}
		}
		return $plugins;
	}

	public function not_activate_license_notice() {
		$current_screen = get_current_screen();
		if ( 'yaycommerce_page_yaycommerce-licenses' === $current_screen->id ) {
			return;
		}
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			$license = new License( $plugin['slug'] );
			if ( $license->is_active() ) {
				return;
			}
			?>
				<div class="error">		
					<p>
					<?php
					// translators: %s: search WooCommerce plugin link
					printf( esc_html__( '%1$s license key is required. %2$sPlease enter your license key to start using the plugin%3$s.', 'yaymail' ), isset( $plugin['name'] ) ? esc_html( $plugin['name'] ) : 'YayMail', '<a href="' . esc_url( admin_url( 'admin.php?page=yaycommerce-licenses' ) ) . '">', '</a>' );
					?>
					</p>
				</div>
			<?php
		}
	}

	public function do_cron_job() {
		add_filter( 'cron_schedules', array( $this, 'custom_schedules' ) );
		add_action( 'check_license_cron', array( $this, 'check_license_cron_run' ) );
		if ( ! wp_next_scheduled( 'check_license_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'check_license_cron' );
		};
	}

	public function custom_schedules( $schedules ) {
		$schedules['3hours'] = array(
			'interval' => 60 * 60 * 3,
			'display'  => 'Three Hours',
		);
		return $schedules;
	}

	public function check_license_cron_run() {
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			$license = new License( $plugin['slug'] );
			$license->update();
		}
	}

	public function enqueue_license_scripts() {
		if ( ! isset( $_GET['page'] ) || ! 'yaycommerce-licenses' === $_GET['page'] ) {
			return;
		}
		wp_enqueue_script( CorePlugin::get( 'slug' ) . '-license-script', plugin_dir_url( __FILE__ ) . 'assets/js/license.js', array(), CorePlugin::get( 'version' ), true );
		wp_localize_script(
			CorePlugin::get( 'slug' ) . '-license-script',
			CorePlugin::get( 'slug' ) . 'LicenseData',
			array(
				'apiSettings' => array(
					'restNonce' => wp_create_nonce( 'wp_rest' ),
					'restUrl'   => esc_url_raw( rest_url( CorePlugin::get( 'slug' ) . '-license/v1' ) ),
					'adminUrl'  => admin_url(),
				),
			)
		);
	}

	public function yaycommerce_licenses_settings() {
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $_plugin ) {
			$licensing_plugin = new LicensingPlugin( $_plugin['slug'] );
			$license          = $licensing_plugin->get_license();
			if ( $license->is_active() ) {
				require plugin_dir_path( __FILE__ ) . 'views/information-card.php';
			} else {
				require plugin_dir_path( __FILE__ ) . 'views/activate-card.php';
			}
		}
	}

	public static function get_plugin_data( $plugin_info ) {
		$plugin_data = [
			'Name' => 'YayMail - WooCommerce Email Customizer',
			'Version' => YAYMAIL_VERSION,
			'AuthorName' => 'YayCommerce'
		];
		return $plugin_data;
	}

	public function register_licensing_plugins( $plugins = array() ) {
		return array_merge( $plugins, self::get_licensing_plugins() );
	}

	public static function get_licensing_plugins() {
		$plugins = array();
		return apply_filters( CorePlugin::get( 'slug' ) . '_available_licensing_plugins', $plugins );
	}

	public function do_remove_license_request() {
		if ( isset( $_POST['nonce'] ) ) {
			wp_verify_nonce( sanitize_text_field( $_POST['nonce'] ) );
		}
		$licensing_plugin_slug = isset( $_POST[ CorePlugin::get( 'slug' ) . '_licensing_plugin' ] ) ? sanitize_text_field( $_POST[ CorePlugin::get( 'slug' ) . '_licensing_plugin' ] ) : '';
		$license               = new License( $licensing_plugin_slug );
		$license->remove_license_key();
		$license->remove_license_info();
	}

	public function do_post_requests() {
		if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
			if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( $_POST['_wpnonce'] ), 'woocommerce-settings' ) ) {
				if ( isset( $_POST[ CorePlugin::get( 'slug' ) . '_remove_license' ] ) ) {
					$this->do_remove_license_request();
				}
			}
		}
	}

	/** NOTIFICATION */
	public function license_expired_admin_notice() {
		require plugin_dir_path( __FILE__ ) . 'views/expired-admin-notice.php';
	}

	public function show_plugin_page_notification() {
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			add_action( 'after_plugin_row_' . $plugin['basename'], array( $this, 'plugin_notifications' ), 10, 2 );
		}
	}

	public function plugin_notifications( $file, $plugin_info ) {
		$licensing_plugins = $this->get_licensing_plugins();
		$match_position    = array_search( $file, array_column( $licensing_plugins, 'basename' ) );
		if ( false === $match_position ) {
			return;
		}
		$plugin           = $licensing_plugins[ $match_position ];
		$licensing_plugin = new LicensingPlugin( $plugin['slug'] );
		$license          = $licensing_plugin->get_license();
		if ( ! $license->is_active() || $license->is_expired() ) {
			?>
			<tr class="plugin-update-tr active"><td colspan="4" class="plugin-update colspanchange" style="box-shadow:none;">
			<script>
				var plugin_row_elements = document.querySelectorAll('tr.plugin-update-tr[data-plugin="<?php echo esc_js( plugin_basename( $file ) ); ?>"] .plugin-update, tr.active[data-plugin="<?php echo esc_js( plugin_basename( $file ) ); ?>"] > th, tr.active[data-plugin="<?php echo esc_js( plugin_basename( $file ) ); ?>"] > td');
				[].forEach.call(plugin_row_elements, function(element) {
					element.style.boxShadow = "none";
				});
			</script>
			<?php
			if ( ! $license->is_active() ) {
				require plugin_dir_path( __FILE__ ) . 'views/not-activate-license-notification.php';
			}
			if ( $license->is_expired() ) {
				require plugin_dir_path( __FILE__ ) . 'views/expired-license-notification.php';
			}
			?>
			</td></tr>
			<?php
		}
	}

	/** Plugin action link */
	public function edit_action_links( $action_links ) {
		$new_action_links = array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=yaycommerce-licenses' ) . '" aria-label="' . esc_attr( 'View YayCommerce license settings' ) . '">' . esc_html( 'Enter license key' ) . '</a>',
		);
		return array_merge( $new_action_links, $action_links );
	}

	/** Auto update */
	public function auto_update() {
		$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
		if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
			return;
		}
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			$license     = new License( $plugin['slug'] );
			$license_key = '';
			$_file       = $plugin['dir_path'] . basename( $plugin['basename'] );
			$plugin_data = self::get_plugin_data( $plugin );
			if ( $license->is_active() && ! $license->is_expired() ) {
				$license_key = $license->get_license_key();
			}
			$args = array(
				'version' => $plugin_data['Version'],
				'license' => $license_key,
				'author'  => $plugin_data['AuthorName'],
				'item_id' => $plugin['item_id'],
			);
			new EDD_SL_Plugin_Updater(
				YAYCOMMERCE_SELLER_SITE_URL,
				$_file,
				$args
			);
		}
	}

	public static function remove_site_plugin_check() {
		global $pagenow;
		if ( 'plugin-install.php' === $pagenow ) {
			return;
		}
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$licensing_plugins             = self::get_licensing_plugins();
		$site_transient_update_plugins = get_site_transient( 'update_plugins' );
		$check                         = false;
		foreach ( $licensing_plugins as $plugin ) {
			if ( isset( $site_transient_update_plugins->checked[ $plugin['basename'] ] ) ) {
				unset( $site_transient_update_plugins->checked[ $plugin['basename'] ] );
				$check = true;
			}
		}
		if ( false !== $site_transient_update_plugins && $check ) {
			set_site_transient( 'update_plugins', $site_transient_update_plugins );
		}
	}

	public function add_disabled_auto_update_text( $value, $plugin_info ) {
		if ( ! isset( $plugin_info->plugin ) ) {
			return $value;
		}
		$licensing_plugins = $this->get_licensing_plugins();
		foreach ( $licensing_plugins as $plugin ) {
			if ( $plugin['basename'] === $plugin_info->plugin ) {
				$license = new License( $plugin['slug'] );
				if ( ! $license->is_active() || $license->is_expired() ) {
					return false;
				}
			}
		}
		return $value;
	}
}
