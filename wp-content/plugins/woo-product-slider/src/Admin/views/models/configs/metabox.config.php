<?php
/**
 * Metabox page configuration.
 *
 * @since      2.2.0
 * @package    Woo_Product_Slider
 * @subpackage Woo_Product_Slider/Admin/view
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

use ShapedPlugin\WooProductSlider\Admin\views\models\classes\SPF_WPSP;

if ( ! defined( 'ABSPATH' ) ) {
	die; }
// Cannot access pages directly.

/**
 * Product slider metabox prefix.
 */
$prefix = 'sp_wps_shortcode_options';

$smart_brand_plugin_link = 'smart-brands-for-woocommerce/smart-brands-for-woocommerce.php';
$smart_brand_plugin_data = SPF_WPSP::plugin_installation_activation(
	$smart_brand_plugin_link,
	'Install Now',
	'activate_plugin',
	array(
		'ShapedPlugin\SmartBrands\SmartBrands',
		'ShapedPlugin\SmartBrandsPro\SmartBrandsPro',
	),
	'smart-brands-for-woocommerce'
);

// Woo quick view Plugin.
$quick_view_plugin_link = 'woo-quickview/woo-quick-view.php';
$quick_view_plugin_data = SPF_WPSP::plugin_installation_activation(
	$quick_view_plugin_link,
	'Install Now',
	'activate_plugin',
	array(
		'SP_Woo_Quick_View',
		'SP_Woo_Quick_View_Pro',
	),
	'woo-quickview'
);


/**
 * Shortcode metabox.
 *
 * @param string $prefix The metabox main Key.
 * @return void
 */
SPF_WPSP::createMetabox(
	'spwps_shortcode_option',
	array(
		'title'        => __( 'How To Use', 'woo-product-slider' ),
		'post_type'    => 'sp_wps_shortcodes',
		'context'      => 'side',
		'show_restore' => false,
	)
);
SPF_WPSP::createSection(
	'spwps_shortcode_option',
	array(
		'fields' => array(
			array(
				'type'      => 'shortcode',
				'shortcode' => true,
				'class'     => 'spwps-admin-sidebar',
			),
		),
	)
);
SPF_WPSP::createMetabox(
	'spwps_builder_option',
	array(
		'title'        => __( 'Page Builders', 'woo-product-slider' ),
		'post_type'    => 'sp_wps_shortcodes',
		'context'      => 'side',
		'show_restore' => false,
	)
);
SPF_WPSP::createSection(
	'spwps_builder_option',
	array(
		'fields' => array(
			array(
				'type'      => 'shortcode',
				'shortcode' => false,
				'class'     => 'spwps-admin-sidebar',
			),
		),
	)
);

SPF_WPSP::createMetabox(
	'sp_wps_layout_options',
	array(
		'title'           => __( 'Layout', 'woo-product-slider' ),
		'post_type'       => 'sp_wps_shortcodes',
		'show_restore'    => false,
		'spwps_shortcode' => false,
		'context'         => 'normal',
		'preview'         => true,
	)
);
SPF_WPSP::createSection(
	'sp_wps_layout_options',
	array(
		'fields' => array(
			array(
				'type'  => 'heading',
				'image' => esc_url( SP_WPS_URL ) . 'Admin/assets/images/wps-logo.svg',
				'after' => '<i class="fa fa-life-ring"></i> Support',
				'link'  => 'https://shapedplugin.com/support/?user=lite',
				'class' => 'spwps-admin-header',
			),
			array(
				'id'         => 'layout_preset',
				'class'      => 'layout_preset',
				'type'       => 'image_select',
				'title'      => __( 'Layout Preset', 'woo-product-slider' ),
				'image_name' => true,
				'options'    => array(
					'slider'      => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/slider.svg' ),
						'name'            => 'Slider',
						'option_demo_url' => 'https://wooproductslider.io/products-carousel-slider/',
					),
					'grid'        => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/grid.svg' ),
						'name'            => 'Grid',
						'option_demo_url' => 'https://wooproductslider.io/products-grid/',
					),
					'ticker'      => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/ticker.svg' ),
						'name'            => 'Ticker',
						'option_demo_url' => 'https://wooproductslider.io/products-ticker-carousel/',
						'pro_only'        => true,
					),
					'multi-row'   => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/multi_row.svg' ),
						'name'            => 'Multi-row Carousel',
						'option_demo_url' => 'https://wooproductslider.io/multi-row-carousel/',
						'pro_only'        => true,
					),
					'live-filter' => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/live_filter.svg' ),
						'name'            => 'Live Filter',
						'option_demo_url' => 'https://wooproductslider.io/ajax-live-filter/',
						'pro_only'        => true,
					),
					'masonry'     => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/masonry.svg' ),
						'name'            => 'Masonry',
						'option_demo_url' => 'https://wooproductslider.io/product-masonry/',
						'pro_only'        => true,
					),
					'list'        => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/list.svg' ),
						'name'            => 'List',
						'option_demo_url' => 'https://wooproductslider.io/products-list/',
						'pro_only'        => true,
					),
					'table'       => array(
						'image'           => SPF_WPSP::include_plugin_url( 'assets/images/layout-preset/table.svg' ),
						'name'            => 'Table',
						'option_demo_url' => 'https://wooproductslider.io/products-table/',
						'pro_only'        => true,
					),
				),
				'default'    => 'slider',
			),
			array(
				'id'         => 'live_filter_mode',
				'type'       => 'image_select',
				'class'      => 'live_filter_mode hide-active-sign',
				'title'      => __( 'Live Filter Style', 'woo-product-slider' ),
				'options'    => array(
					'filter-carousel'  => array(
						'image'    => SPF_WPSP::include_plugin_url( 'assets/images/filter-style/carousel.svg' ),
						'name'     => 'Carousel',
						'pro_only' => true,
					),
					'filter-multi-row' => array(
						'image'    => SPF_WPSP::include_plugin_url( 'assets/images/filter-style/multi-row.svg' ),
						'name'     => 'Multi-row',
						'pro_only' => true,
					),
					'live-filter-grid' => array(
						'image'    => SPF_WPSP::include_plugin_url( 'assets/images/filter-style/live_filter.svg' ),
						'name'     => 'Grid',
						'pro_only' => true,
					),
				),
				'default'    => 'filter-carousel',
				'dependency' => array( 'layout_preset', '==', 'live-filter', true ),
			),
			array(
				'type'    => 'notice',
				'class'   => 'sp-wps-layout-preset',
				/* translators: %1$s: link tag start %2$s: link tag end */
				'content' => sprintf( __( 'To create eye-catching product layouts that engage your shop visitors and increase sales, %1$sUpgrade To Pro!%2$s', 'woo-product-slider' ), '<a  href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
			),
		),
	)
);

/**
 * Create a metabox for product slider.
 */
SPF_WPSP::createMetabox(
	$prefix,
	array(
		'title'     => __( 'Slider Options', 'woo-product-slider' ),
		'post_type' => 'sp_wps_shortcodes',
		'context'   => 'normal',
		'class'     => 'wpsp-shortcode-options',
		'nav'       => 'inline',
	)
);

/**
 * General Settings section.
 */
SPF_WPSP::createSection(
	$prefix,
	array(
		'title'  => __( 'Filter Settings', 'woo-product-slider' ),
		'icon'   => 'sp-wps-icon-filter-settings',
		'fields' => array(
			array(
				'id'         => 'product_type',
				'type'       => 'select',
				'title'      => __( 'Filter Products', 'woo-product-slider' ),
				'subtitle'   => __( 'Filter the products you want to show.', 'woo-product-slider' ),
				'options'    => array(
					'latest_products'                  => array(
						'name' => __( 'Latest', 'woo-product-slider' ),
					),
					'featured_products'                => array(
						'name' => __( 'Featured', 'woo-product-slider' ),
					),
					'products_from_categories'         => array(
						'name'     => __( 'Category (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_tags'               => array(
						'name'     => __( 'Tag (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_brands'             => array(
						'name'     => __( 'Brands (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'multiple_taxonomy'                => array(
						'name'     => __( 'Multiple Taxonomies (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'best_selling_products'            => array(
						'name'     => __( 'Best Selling (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'related_products'                 => array(
						'name'     => __( 'Related (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'up_sells'                         => array(
						'name'     => __( 'Upsells (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'cross_sells'                      => array(
						'name'     => __( 'Cross-sells (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'top_rated_products'               => array(
						'name'     => __( 'Top Rated (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'on_sell_products'                 => array(
						'name'     => __( 'On Sale (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'specific_products'                => array(
						'name'     => __( 'Specific (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'most_viewed_products'             => array(
						'name'     => __( 'Most Viewed (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'recently_viewed_products'         => array(
						'name'     => __( 'Recently Viewed (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_sku'                => array(
						'name'     => __( 'SKU (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_attribute'          => array(
						'name'     => __( 'Attribute (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_free'               => array(
						'name'     => __( 'Free (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_exclude_categories' => array(
						'name'     => __( 'Exclude Category (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'products_from_exclude_tags'       => array(
						'name'     => __( 'Exclude Tag (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
				),
				'default'    => 'latest_products',
				'dependency' => array( 'layout_preset', '!=', 'live-filter', true ),
			),
			array(
				'id'         => 'live_filter_by',
				'type'       => 'button_set',
				'title'      => __( 'Frontend Live Filter By', 'woo-product-slider' ),
				'subtitle'   => __( 'Set ajax frontend live filter by.', 'woo-product-slider' ),
				'options'    => array(
					'filter_by_product_type' => array(
						'name' => __( 'Product Type', 'woo-product-slider' ),
					),
					'filter_by_taxonomy'     => array(
						'name' => __( 'Taxonomy', 'woo-product-slider' ),
					),
				),
				'only_pro'   => true,
				'default'    => 'filter_by_product_type',
				'dependency' => array( 'layout_preset', '==', 'live-filter', true ),
			),
			array(
				'id'         => 'multiple_filter_types',
				'type'       => 'checkbox',
				'only_pro'   => true,
				'class'      => 'multiple_filter_types only_pro_fields',
				'title'      => __( 'Multiple Filter Types', 'woo-product-slider' ),
				'subtitle'   => __( 'Check filter type(s) which you want to show in the live filter.', 'woo-product-slider' ),
				'options'    => array(
					'latest_products'       => __( 'New Arrivals', 'woo-product-slider' ),
					'featured_products'     => __( 'Featured', 'woo-product-slider' ),
					'best_selling_products' => __( 'Best Selling', 'woo-product-slider' ),
					'top_rated_products'    => __( 'Top Rated', 'woo-product-slider' ),
					'on_sell_products'      => __( 'On Sale', 'woo-product-slider' ),
				),
				'default'    => array(
					'latest_products' => true,
				),
				'dependency' => array( 'layout_preset|live_filter_by', '==|==', 'live-filter|filter_by_product_type', true ),
			),
			array(
				'id'         => 'live_filter_by_taxonomy',
				'type'       => 'radio',
				'class'      => 'only_pro_fields',
				'title'      => __( 'Taxonomy Filter', 'woo-product-slider' ),
				'only_pro'   => true,
				'subtitle'   => __( 'Check filter type(s) which you want to show in the live filter.', 'woo-product-slider' ),
				'default'    => 'filter_by_cat',
				'options'    => array(
					'filter_by_cat'   => __( 'Category', 'woo-product-slider' ),
					'filter_by_tag'   => __( 'Tag', 'woo-product-slider' ),
					'filter_by_brand' => __( 'Brand', 'woo-product-slider' ),
				),
				'dependency' => array( 'layout_preset|live_filter_by', '==|==', 'live-filter|filter_by_taxonomy', true ),
			),
			array(
				'id'         => 'product_data_type',
				'type'       => 'select',
				'only_pro'   => true,
				'title'      => __( 'Product Data Type', 'woo-product-slider' ),
				'subtitle'   => __( 'Select product type.', 'woo-product-slider' ),
				'options'    => array(
					'all'      => array(
						'name' => __( 'All Types', 'woo-product-slider' ),
					),
					'simple'   => array(
						'name'     => __( 'Simple Product', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'grouped'  => array(
						'name'     => __( 'Grouped Product', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'external' => array(
						'name'     => __( 'External/Affiliate Product', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'variable' => array(
						'name'     => __( 'Variable Product', 'woo-product-slider' ),
						'pro_only' => true,
					),
				),
				'default'    => 'all',
				'dependency' => array( 'product_type', 'any', 'latest_products,featured_products,products_from_categories,products_from_exclude_categories,products_from_tags,products_from_exclude_tags,best_selling_products,top_rated_products,on_sell_products,products_from_brands', true ),
			),
			array(
				'id'         => 'show_variations_as_single_products',
				'class'      => 'show_variations_as_single_products pro_only_field pro_only_field_group',
				'type'       => 'button_set',
				'title'      => __( 'Show Variation as Individual Product', 'woo-product-slider' ),
				'only_pro'   => true,
				'subtitle'   => __( 'Select to show variation as individual product.', 'woo-product-slider' ),
				'title_info' => '<div class="spwps-info-label">' . __( 'Show Variation as Individual Product', 'woo-product-slider' ) . '</div>' . __( 'Here, "Show" option will present variations as individual products with their parent products and "Hide Parent" option will present variations as individual products without their parent products.', 'woo-product-slider' ),
				'options'    => array(
					'show'        => array(
						'name' => __( 'Show', 'woo-product-slider' ),
					),
					'hide_parent' => array(
						'name'     => __( 'Hide Parent', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'none'        => array(
						'name' => __( 'None', 'woo-product-slider' ),
					),
				),
				'default'    => 'none',
				'dependency' => array( 'product_type|product_data_type', '==|any', 'latest_products|all,variable', true ),
			),
			array(
				'id'       => 'show_hidden_product',
				'type'     => 'checkbox',
				'title'    => __( 'Show Hidden Products', 'woo-product-slider' ),
				'subtitle' => __( 'Check to show hidden products.', 'woo-product-slider' ),
				'default'  => false,
			),
			array(
				'id'       => 'hide_out_of_stock_product',
				'type'     => 'checkbox',
				'title'    => __( 'Hide Out of Stock Products', 'woo-product-slider' ),
				'subtitle' => __( 'Check to hide out of stock products.', 'woo-product-slider' ),
				'default'  => false,
			),
			array(
				'id'       => 'hide_on_sale_product',
				'type'     => 'checkbox',
				'title'    => __( 'Hide On Sale Products', 'woo-product-slider' ),
				'subtitle' => __( 'Check to hide on sale products.', 'woo-product-slider' ),
				'default'  => false,
			),
			array(
				'id'       => 'hide_free_product',
				'type'     => 'checkbox',
				'title'    => __( 'Hide Free Products', 'woo-product-slider' ),
				'subtitle' => __( 'Check to hide free product.', 'woo-product-slider' ),
				'default'  => false,
			),
			array(
				'id'       => 'hide_thumbnail_without_featured_img',
				'type'     => 'checkbox',
				'title'    => __( 'Hide Product without Thumbnail', 'woo-product-slider' ),
				'subtitle' => __( 'Hide product if featured image not exist', 'woo-product-slider' ),
				'default'  => false,
			),
			array(
				'id'       => 'product_order_by',
				'type'     => 'select',
				'title'    => __( 'Order By', 'woo-product-slider' ),
				'subtitle' => __( 'Set a order by option.', 'woo-product-slider' ),
				'options'  => array(
					'ID'         => array(
						'name' => __( 'ID', 'woo-product-slider' ),
					),
					'date'       => array(
						'name' => __( 'Date', 'woo-product-slider' ),
					),
					'rand'       => array(
						'name' => __( 'Random', 'woo-product-slider' ),
					),
					'title'      => array(
						'name' => __( 'Title', 'woo-product-slider' ),
					),
					'modified'   => array(
						'name' => __( 'Modified', 'woo-product-slider' ),
					),
					'modified'   => array(
						'name' => __( 'Modified', 'woo-product-slider' ),
					),
					'price'      => array(
						'name'     => __( 'Price (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
					'menu_order' => array(
						'name'     => __( 'Drag and Drop (Pro)', 'woo-product-slider' ),
						'pro_only' => true,
					),
				),
				'default'  => 'date',
			),
			array(
				'id'       => 'product_order',
				'type'     => 'select',
				'title'    => __( 'Order', 'woo-product-slider' ),
				'subtitle' => __( 'Set product order.', 'woo-product-slider' ),
				'options'  => array(
					'ASC'  => array(
						'name' => __( 'Ascending', 'woo-product-slider' ),
					),
					'DESC' => array(
						'name' => __( 'Descending', 'woo-product-slider' ),
					),
				),
				'default'  => 'DESC',
			),
			array(
				'id'       => 'number_of_total_products',
				'type'     => 'spinner',
				'title'    => __( 'Limit', 'woo-product-slider' ),
				'subtitle' => __( 'Set the total number of products to display.', 'woo-product-slider' ),
				'sanitize' => 'spwps_sanitize_number_field',
				'default'  => 16,
				'max'      => 60000,
				'min'      => -1,
			),
			array(
				'type'    => 'notice',
				/* translators: %3$s: link tag start %4$s: link tag end */
				'content' => sprintf( __( 'Want to increase your store sales by %1$sHighlighting and Filtering%2$s specific product types? %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a  href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
			),
		),
	)
);

/**
 * Display Options section.
 */
SPF_WPSP::createSection(
	$prefix,
	array(
		'title'  => __( 'Display Settings', 'woo-product-slider' ),
		'icon'   => 'sp-wps-icon-display-settings',
		'fields' => array(
			array(
				'type'  => 'tabbed',
				'class' => 'wps-display-tabs',
				'tabs'  => array(
					array(
						'title'  => __( 'Basic Preferences', 'woo-product-slider' ),
						'icon'   => '<i class="sp-wps-icon-basic-preferences" aria-hidden="true"></i>',
						'fields' => array(
							array(
								'id'         => 'slider_title',
								'type'       => 'switcher',
								'title'      => __( 'Section Title', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product section title.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
							),
							array(
								'id'       => 'number_of_column',
								'type'     => 'column',
								'title'    => __( 'Columns', 'woo-product-slider' ),
								'subtitle' => __( 'Set products columns in different devices.', 'woo-product-slider' ),
								'sanitize' => 'spwps_sanitize_number_array_field',
								'default'  => array(
									'number1' => '4',
									'number2' => '3',
									'number3' => '2',
									'number4' => '1',
								),
							),
							array(
								'id'            => 'product_margin',
								'type'          => 'spacing',
								'class'         => 'wps_item_margin_between',
								'title'         => __( 'Space', 'woo-product-slider' ),
								'subtitle'      => __( 'Set a space or margin between products.', 'woo-product-slider' ),
								'units'         => array(
									__( 'px', 'woo-product-slider' ),
								),
								'show_title'    => true,
								'all'           => true,
								'vertical'      => true,
								'all_icon'      => '<i class="fa fa-arrows-h" aria-hidden="true"></i>',
								'vertical_icon' => '<i class="fa fa-arrows-v" aria-hidden="true"></i>',
								'default'       => array(
									'all'      => '20',
									'vertical' => '20',
								),
								'attributes'    => array(
									'min' => 0,
								),
								'title_info'    => '<div class="spwps-img-tag"><img src="' . SPF_WPSP::include_plugin_url( 'assets/images/visual-preview/wps_space.svg' ) . '" alt="space between"></div><div class="spwps-info-label img">' . __( 'Space Between', 'woo-product-slider' ) . '</div>',
							),
							array(
								'id'         => 'ajax_search',
								'type'       => 'switcher',
								'class'      => 'pro_only_field ',
								'title'      => __( 'Ajax Product Search', 'woo-product-slider' ),
								'subtitle'   => __( 'Enable/Disable ajax search for product.', 'woo-product-slider' ),
								'text_on'    => __( 'Enabled', 'woo-product-slider' ),
								'text_off'   => __( 'Disabled', 'woo-product-slider' ),
								'default'    => false,
								'text_width' => 100,
								'title_info' => '<div class="spwps-img-tag"><img src="' . SPF_WPSP::include_plugin_url( 'assets/images/visual-preview/wps_ajax_product_search.svg' ) . '" alt="' . __( 'Ajax Product Search', 'woo-product-slider' ) . '"></div><div class="spwps-info-label img">' . __( 'Ajax Product Search', 'woo-product-slider' ) . '</div>',
							),
							array(
								'id'         => 'show_product_brands',
								'type'       => 'switcher',
								'title'      => __( 'Show Brands', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product brands.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
							),
							array(
								'type'       => 'submessage',
								'style'      => 'info',
								/* translators: %1$s: link tag start %2$s: link tag end */
								'content'    => sprintf( __( 'To Enable Product Brands feature, you must Install and Activate the %1$sSmart Brands for WooCommerce%2$s plugin.', 'woo-product-slider' ), '<a class="thickbox open-plugin-details-modal" href="' . esc_url( $smart_brand_plugin_data['plugin_link'] ) . '">', '</a>' ) . ' <a href="#" class="brand-plugin-install' . $smart_brand_plugin_data['has_plugin'] . '" data-url="' . $smart_brand_plugin_data['activate_plugin_url'] . '" data-nonce="' . wp_create_nonce( 'updates' ) . '" > ' . $smart_brand_plugin_data['button_text'] . ' <i class="fa fa-angle-double-right"></i></a>',
								'dependency' => array( 'show_product_brands', '==', 'true', true ),
							),
							array(
								'id'         => 'quick_view',
								'type'       => 'switcher',
								'title'      => __( 'Show Quick View Button', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide quick view button.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
							),
							array(
								'type'       => 'submessage',
								'style'      => 'info',
								/* translators: %1$s: link tag start %2$s: link tag end */
								'content'    => sprintf( __( 'To Enable Quick view feature, you must Install and Activate the %1$sQuick View for WooCommerce%2$s plugin.', 'woo-product-slider' ), '<a class="thickbox open-plugin-details-modal" href="' . esc_url( $quick_view_plugin_data['plugin_link'] ) . '">', '</a>' ) . ' <a href="#" class="quick-view-install' . $quick_view_plugin_data['has_plugin'] . '" data-url="' . $quick_view_plugin_data['activate_plugin_url'] . '" data-nonce="' . wp_create_nonce( 'updates' ) . '" > ' . $quick_view_plugin_data['button_text'] . ' <i class="fa fa-angle-double-right"></i></a> ',
								'dependency' => array( 'quick_view', '==', 'true', true ),
							),
							array(
								'id'         => 'preloader',
								'type'       => 'switcher',
								'title'      => __( 'Preloader', 'woo-product-slider' ),
								'subtitle'   => __( 'Products showcase will be hidden until page load completed.', 'woo-product-slider' ),
								'text_on'    => __( 'Enabled', 'woo-product-slider' ),
								'text_off'   => __( 'Disabled', 'woo-product-slider' ),
								'text_width' => 100,
								'default'    => true,
							),
							array(
								'type'    => 'notice',
								/* translators: %3$s: link tag start %4$s: link tag end */
								'content' => sprintf( __( 'To display %1$sAjax Product Search, Category, Description, Badges,%2$s and more to increase sales, %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
							),
						),
					),
					array(
						'title'  => __( 'Template Styles', 'woo-product-slider' ),
						'icon'   => '<i class="sp-wps-icon-template-styles" aria-hidden="true"></i>',
						'fields' => array(

							array(
								'id'         => 'template_style',
								'class'      => 'template_style',
								'type'       => 'button_set',
								'title'      => __( 'Template Type', 'woo-product-slider' ),
								'subtitle'   => __( 'Choose a template whether custom or pre-made.', 'woo-product-slider' ),
								'options'    => array(
									'custom'   => array(
										'name' => __( 'Custom', 'woo-product-slider' ),
									),
									'pre-made' => array(
										'name' => __( 'Pre-made Templates', 'woo-product-slider' ),
									),
								),
								'default'    => 'custom',
								'dependency' => array( 'layout_preset', '!=', 'table', true ),
							),
							array(
								'id'         => 'theme_style',
								'class'      => 'theme_style',
								'type'       => 'select',
								'title'      => __( 'Template Style', 'woo-product-slider' ),
								/* translators: %1$s: link tag start %2$s: link tag end */
								'subtitle'   => sprintf( __( 'Select which template style you want to display. See %1$stemplates%2$s at a glance!', 'woo-product-slider' ), '<a href="https://wooproductslider.io/28-pre-made-product-templates/" target="_blank">', '</a>' ),
								/* translators: %1$s: bold  tag start %2$s: bold  tag end %3$s: link tag start %4$s: link tag end */
								'desc'       => sprintf( __( 'To unlock %1$s28+ Pre-made beautiful templates%2$s, %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								'options'    => array(
									'theme_one'   => array(
										'name' => __( 'Template One', 'woo-product-slider' ),
									),
									'theme_two'   => array(
										'name' => __( 'Template Two', 'woo-product-slider' ),
									),
									'theme_three' => array(
										'name' => __( 'Template Three', 'woo-product-slider' ),
									),
									'theme_four'  => array(
										'name'     => __( '28+ Templates (Pro)', 'woo-product-slider' ),
										'pro_only' => true,
									),
								),
								'default'    => 'theme_one',
								'preview'    => true,
								'dependency' => array( 'template_style|layout_preset', '==|!=', 'pre-made|table', true ),
							),

							array(
								'id'         => 'content_position',
								'type'       => 'image_select',
								'class'      => 'grid_style',
								'title'      => __( 'Product Content Position', 'woo-product-slider' ),
								'subtitle'   => __( 'Select a position for the product name, content, meta etc.', 'woo-product-slider' ),
								'image_name' => true,
								'options'    => array(
									'bottom'       => array(
										'image' => SPF_WPSP::include_plugin_url( 'assets/images/content-position/bottom.svg' ),
										'name'  => __( 'Bottom', 'woo-product-slider' ),
									),
									'top'          => array(
										'image'    => SPF_WPSP::include_plugin_url( 'assets/images/content-position/top.svg' ),
										'name'     => __( 'Top', 'woo-product-slider' ),
										'pro_only' => true,
									),
									'on_right'     => array(
										'image'    => SPF_WPSP::include_plugin_url( 'assets/images/content-position/right.svg' ),
										'name'     => __( 'Right', 'woo-product-slider' ),
										'pro_only' => true,
									),
									'on_left'      => array(
										'image'    => SPF_WPSP::include_plugin_url( 'assets/images/content-position/left.svg' ),
										'name'     => __( 'Left', 'woo-product-slider' ),
										'pro_only' => true,
									),
									'with_overlay' => array(
										'image'    => SPF_WPSP::include_plugin_url( 'assets/images/content-position/overlay.svg' ),
										'name'     => __( 'Overlay', 'woo-product-slider' ),
										'pro_only' => true,
									),
								),
								/* translators: %1$s: link tag start %2$s: link tag end */
								'desc'       => sprintf( __( 'To unlock amazing product styles and advanced customizations, %1$sUpgrade To Pro!%2$s', 'woo-product-slider' ), '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								'title_info' => '<div class="spwps-info-label">' . __( 'Product Content Position', 'woo-product-slider' ) . '</div> <div class="spwps-short-content">' . __( 'This feature allows you to select the placement of the product content position.', 'woo-product-slider' ) . '</div><div class="info-button"><a class="spwps-open-live-demo" href="https://wooproductslider.io/5-product-content-positions/" target="_blank">' . __( 'Live Demo', 'woo-product-slider' ) . '</a></div>',
								'default'    => 'bottom',
								'dependency' => array( 'template_style|layout_preset', '==|!=', 'custom|table', true ),
							),
							array(
								'id'         => 'product_content_padding',
								'type'       => 'spacing',
								'title'      => __( 'Content Padding', 'woo-product-slider' ),
								'subtitle'   => __( 'Set padding for the product content.', 'woo-product-slider' ),
								'style'      => false,
								'color'      => false,
								'all'        => false,
								'units'      => array( 'px' ),
								'default'    => array(
									'top'    => '18',
									'right'  => '20',
									'bottom' => '20',
									'left'   => '20',
								),
								'attributes' => array(
									'min' => 0,
								),
								'dependency' => array( 'template_style|layout_preset', '==|!=', 'custom|table', true ),
							),
							array(
								'id'          => 'product_border',
								'type'        => 'border',
								'title'       => __( 'Border', 'woo-product-slider' ),
								'subtitle'    => __( 'Set product border.', 'woo-product-slider' ),
								'all'         => true,
								'hover_color' => true,
								'default'     => array(
									'all'         => '1',
									'style'       => 'solid',
									'color'       => '#dddddd',
									'hover_color' => '#dddddd',
								),
								'dependency'  => array( 'template_style|layout_preset', '==|!=', 'custom|table', true ),
							),
							array(
								'id'         => 'carousel_same_height',
								'type'       => 'switcher',
								'class'      => 'pro_only_field ',
								'title'      => __( 'Equalize Products Height', 'woo-product-slider' ),
								'subtitle'   => __( 'Enable to equalize products same height.', 'woo-product-slider' ),
								'text_on'    => __( 'Enabled', 'woo-product-slider' ),
								'text_off'   => __( 'Disabled', 'woo-product-slider' ),
								'text_width' => 100,
								'default'    => false,
								'title_info' => '<div class="spwps-img-tag"><img src="' . SPF_WPSP::include_plugin_url( 'assets/images/visual-preview/wps_equalize_products_height.svg' ) . '" alt="' . __( 'Equalize Products Height', 'woo-product-slider' ) . '"></div><div class="spwps-info-label img">' . __( 'Equalize Products Height', 'woo-product-slider' ) . '</div>',
								'dependency' => array( 'layout_preset', 'any', 'grid,slider', true ),
							),
						),
					),
					array(
						'title'  => __( 'Product Information', 'woo-product-slider' ),
						'icon'   => '<i class="sp-wps-icon-content-1" aria-hidden="true"></i>',
						'fields' => array(
							array(
								'id'         => 'product_name',
								'type'       => 'switcher',
								'title'      => __( 'Product Name', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product name.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
							),
							array(
								'id'              => 'product_name_limit',
								'type'            => 'spacing',
								'class'           => 'product_name_limit',
								'title'           => __( 'Name Length', 'woo-product-slider' ),
								'subtitle'        => __( 'Leave it empty to show full product name.', 'woo-product-slider' ),
								'all'             => true,
								'only_pro'        => true,
								'all_placeholder' => '',
								'all_icon'        => '',
								'default'         => array(
									'all'  => '10',
									'unit' => 'Words (Pro)',
								),
								'units'           => array( 'Words (Pro)', 'Characters (Pro)', 'Lines (Pro)' ),
								'attributes'      => array(
									'min'      => 1,
									'disabled' => 'disabled',
								),
								'dependency'      => array(
									'product_name',
									'==',
									'true',
									true,
								),
							),
							array(
								'id'       => 'product_content_type',
								'type'     => 'button_set',
								'only_pro' => true,
								'title'    => __( 'Description Display Type', 'woo-product-slider' ),
								'subtitle' => __( 'Select a product description display type.', 'woo-product-slider' ),
								'options'  => array(
									'short_description' => array(
										'name' => __( 'Short', 'woo-product-slider' ),
									),
									'full_description'  => array(
										'name' => __( 'Full', 'woo-product-slider' ),
									),
									'hide'              => array(
										'name' => __( 'Hide', 'woo-product-slider' ),
									),
								),
								'default'  => 'hide',
							),
							array(
								'id'              => 'product_content_limit',
								'type'            => 'spacing',
								'class'           => 'product_content_limit',
								'title'           => __( 'Description Length', 'woo-product-slider' ),
								'subtitle'        => __( 'Leave it empty to show  the short/full description', 'woo-product-slider' ),
								'all'             => true,
								'only_pro'        => true,
								'all_placeholder' => '',
								'all_icon'        => '',
								'default'         => array(
									'all'  => 19,
									'unit' => 'Words (Pro)',
								),
								'units'           => array( 'Words (Pro)', 'Characters (Pro)' ),
								'attributes'      => array(
									'min'      => 1,
									'max'      => 1000,
									'disabled' => 'disabled',
								),
								'dependency'      => array( 'product_content_type', '!=', 'hide', true ),
							),
							array(
								'id'         => 'product_content_more_button',
								'type'       => 'switcher',
								'class'      => 'pro_only_field pro_only_field_group',
								'title'      => __( 'Read More Button', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product description read more button.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
							),
							array(
								'id'         => 'product_price',
								'type'       => 'switcher',
								'title'      => __( 'Price', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product price.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
							),
							array(
								'id'         => 'product_del_price_color',
								'type'       => 'color',
								'title'      => __( 'Discount Color', 'woo-product-slider' ),
								'subtitle'   => __( 'Set discount price color.', 'woo-product-slider' ),
								'default'    => '#888888',
								'dependency' => array( 'product_price', '==', 'true' ),
							),
							array(
								'id'         => 'product_rating',
								'type'       => 'switcher',
								'title'      => __( 'Rating', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product rating.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
							),
							array(
								'id'         => 'product_rating_colors',
								'type'       => 'color_group',
								'title'      => __( 'Color', 'woo-product-slider' ),
								'subtitle'   => __( 'Set rating star color.', 'woo-product-slider' ),
								'options'    => array(
									'color'       => __( 'Star Color', 'woo-product-slider' ),
									'empty_color' => __( 'Empty Star Color', 'woo-product-slider' ),
								),
								'default'    => array(
									'color'       => '#F4C100',
									'empty_color' => '#C8C8C8',
								),
								'dependency' => array( 'product_rating', '==', 'true' ),
							),
							array(
								'id'         => 'product_cat',
								'class'      => 'wps_product_cat pro_only_field',
								'type'       => 'switcher',
								'only_pro'   => true,
								'title'      => __( 'Show Category', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product category name with link.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
								'dependency' => array(
									'layout_preset',
									'!=',
									'table',
									true,
								),
							),
						),
					),
					array(
						'title'  => __( 'Product Badge', 'woo-product-slider' ),
						'icon'   => '<i class="sp-wps-icon-product-badge" aria-hidden="true"></i>',
						'fields' => array(
							array(
								'type'    => 'notice',
								'content' => sprintf(
									/* translators:%1$s: strong tag start %2$s: strong tag end %3$s: link tag start %4$s: link tag end */
									__( 'To display attention-grabbing %1$sProduct Badges%2$s and increase your sales, %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ),
									'<strong>',
									'</strong>',
									'<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>',
									'</b></a>'
								),
							),
							array(
								'id'         => 'sale_ribbon',
								'type'       => 'switcher',
								'class'      => 'pro_only_field ',
								'title'      => __( 'Sale Ribbon', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product sale ribbon.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
								'title_info' => '<div class="spwps-img-tag"><img src="' . SPF_WPSP::include_plugin_url( 'assets/images/visual-preview/wps_sale_ribbon.svg' ) . '" alt="' . __( 'Sale Ribbon', 'woo-product-slider' ) . '"></div><div class="spwps-info-label img">' . __( 'Sale Ribbon', 'woo-product-slider' ) . '</div>',
							),
							array(
								'id'      => 'show_on_sale_product_discount',
								'type'    => 'checkbox',
								'class'   => 'pro_only_field ',
								'title'   => __( 'Show Product Discount in Percentage(%) ', 'woo-product-slider' ),
								'default' => false,
							),
							array(
								'id'       => 'sale_ribbon_text',
								'type'     => 'text',
								'class'    => 'pro_only_field ',
								'title'    => __( 'Sale Label', 'woo-product-slider' ),
								'subtitle' => __( 'Set product sale ribbon label.', 'woo-product-slider' ),
								'default'  => 'On Sale!',
							),
							array(
								'id'       => 'sale_ribbon_bg',
								'type'     => 'color',
								'class'    => 'pro_only_field ',
								'title'    => __( 'Background', 'woo-product-slider' ),
								'subtitle' => __( 'Set product sale ribbon background color.', 'woo-product-slider' ),
								'default'  => '#1abc9c',
							),
							array(
								'id'         => 'out_of_stock_ribbon',
								'type'       => 'switcher',
								'class'      => 'pro_only_field ',
								'title'      => __( 'Out of Stock Ribbon', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product out of stock ribbon.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
							),
							array(
								'id'       => 'out_of_stock_ribbon_text',
								'type'     => 'text',
								'class'    => 'pro_only_field ',
								'title'    => __( 'Out of Stock Label', 'woo-product-slider' ),
								'subtitle' => __( 'Set product out of stock ribbon label.', 'woo-product-slider' ),
								'default'  => 'Out of Stock',
							),
							array(
								'id'       => 'out_of_stock_ribbon_bg',
								'type'     => 'color',
								'class'    => 'pro_only_field ',
								'title'    => __( 'Background', 'woo-product-slider' ),
								'subtitle' => __( 'Set product out of stock ribbon background color.', 'woo-product-slider' ),
								'default'  => '#fd5a27',
							),
						),
					),
					array(
						'title'  => __( 'Add to cart button', 'woo-product-slider' ),
						'icon'   => '<i class="sp-wps-icon-add-to-cart-button" aria-hidden="true"></i>',
						'fields' => array(
							array(
								'id'         => 'add_to_cart_button',
								'type'       => 'switcher',
								'title'      => __( 'Add to Cart Button', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide product add to cart button.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
							),
							array(
								'id'         => 'add_to_cart_button_colors',
								'type'       => 'color_group',
								'title'      => __( 'Color', 'woo-product-slider' ),
								'subtitle'   => __( 'Set product add to cart button color.', 'woo-product-slider' ),
								'options'    => array(
									'color'            => __( 'Text Color', 'woo-product-slider' ),
									'hover_color'      => __( 'Text Hover', 'woo-product-slider' ),
									'background'       => __( 'Background', 'woo-product-slider' ),
									'hover_background' => __( 'Hover BG', 'woo-product-slider' ),
								),
								'default'    => array(
									'color'            => '#444444',
									'hover_color'      => '#ffffff',
									'background'       => 'transparent',
									'hover_background' => '#222222',
								),
								'dependency' => array( 'add_to_cart_button', '==', 'true' ),
							),
							array(
								'id'          => 'add_to_cart_border',
								'type'        => 'border',
								'title'       => __( 'Border', 'woo-product-slider' ),
								'subtitle'    => __( 'Set add to cart button border.', 'woo-product-slider' ),
								'all'         => true,
								'hover_color' => true,
								'default'     => array(
									'all'         => '1',
									'style'       => 'solid',
									'color'       => '#222222',
									'hover_color' => '#222222',
								),
								'dependency'  => array( 'add_to_cart_button', '==', 'true' ),
							),
							array(
								'id'         => 'quantity_button',
								'type'       => 'switcher',
								'class'      => 'pro_only_field ',
								'title'      => __( 'Quantities', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/hide quantities selector before the add to cart.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => false,
								'dependency' => array(
									'add_to_cart_button',
									'==',
									'true',
									true,
								),
							),
						),
					),
					array(
						'title'  => __( 'Load More Pagination', 'woo-product-slider' ),
						'class'  => 'load_more_pagination_tab',
						'icon'   => '<i class="sp-wps-icon-load-more-pagination" aria-hidden="true"></i>',
						'fields' => array(
							array(
								'id'         => 'grid_pagination',
								'type'       => 'switcher',
								'title'      => __( 'Pagination', 'woo-product-slider' ),
								'subtitle'   => __( 'Enable/Disable pagination.', 'woo-product-slider' ),
								'text_on'    => __( 'Enabled', 'woo-product-slider' ),
								'text_off'   => __( 'Disabled', 'woo-product-slider' ),
								'text_width' => 100,
								'default'    => true,
								'dependency' => array( 'layout_preset', '==', 'grid', true ),
							),
							array(
								'id'         => 'grid_pagination_type',
								'class'      => 'pagination_pro_field ',
								'type'       => 'radio',
								'title'      => __( 'Pagination Type', 'woo-product-slider' ),
								'subtitle'   => __( 'Choose a pagination type.', 'woo-product-slider' ),
								/* translators: %1$s: link tag start %2$s: link tag end */
								'desc'       => sprintf( __( 'To unlock Ajax Number, Load More & Load More on Scroll, %1$sUpgrade To Pro!%2$s', 'woo-product-slider' ), '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								'options'    => array(
									'normal'           => __( 'Normal', 'woo-product-slider' ),
									'ajax_number'      => __( 'Ajax Number (Pro)', 'woo-product-slider' ),
									'load_more_btn'    => __( 'Ajax Load More Button (Pro)', 'woo-product-slider' ),
									'load_more_scroll' => __( 'Ajax Load More on Scroll (Pro)', 'woo-product-slider' ),
								),
								'title_info' => '<div class="spwps-img-tag"><img src="' . SPF_WPSP::include_plugin_url( 'assets/images/visual-preview/wps_pagination_type.svg' ) . '" alt="' . __( 'Pagination Type', 'woo-product-slider' ) . '"></div><div class="spwps-info-label img">' . __( 'Pagination Type', 'woo-product-slider' ) . '</div>',
								'default'    => 'normal',
								'dependency' => array( 'grid_pagination|layout_preset', '==|==', 'true|grid', true ),
							),
							array(
								'id'         => 'products_per_page',
								'type'       => 'spinner',
								'title'      => __( 'Product(s) To Show Per Page', 'woo-product-slider' ),
								'subtitle'   => __( 'Set number of product(s) to show in per page.', 'woo-product-slider' ),
								'default'    => 8,
								'dependency' => array( 'grid_pagination|layout_preset', '==|==', 'true|grid', true ),
							),
							array(
								'id'         => 'grid_pagination_colors',
								'type'       => 'color_group',
								'title'      => __( 'Pagination Color', 'woo-product-slider' ),
								'subtitle'   => __( 'Set color for the pagination.', 'woo-product-slider' ),
								'options'    => array(
									'color'            => __( 'Color', 'woo-product-slider' ),
									'hover_color'      => __( 'Hover Color', 'woo-product-slider' ),
									'background'       => __( 'Background', 'woo-product-slider' ),
									'hover_background' => __( 'Hover Background', 'woo-product-slider' ),
									'border'           => __( 'Border', 'woo-product-slider' ),
									'hover_border'     => __( 'Hover Border', 'woo-product-slider' ),
								),
								'default'    => array(
									'color'            => '#5e5e5e',
									'hover_color'      => '#ffffff',
									'background'       => 'transparent',
									'hover_background' => '#5e5e5e',
									'border'           => '#dddddd',
									'hover_border'     => '#5e5e5e',
								),
								'dependency' => array( 'grid_pagination|layout_preset', '==|==', 'true|grid', true ),
							),
							array(
								'id'         => 'grid_pagination_alignment',
								'type'       => 'button_set',
								'title'      => __( 'Alignment', 'woo-product-slider' ),
								'subtitle'   => __( 'Select pagination alignment.', 'woo-product-slider' ),
								'options'    => array(
									'wpspro-align-left'   => array(
										'name' => '<i title="Left" class="fa fa-align-left"></i>',
									),
									'wpspro-align-center' => array(
										'name' => '<i title="Left" class="fa fa-align-center"></i>',
									),
									'wpspro-align-right'  => array(
										'name' => '<i title="Left" class="fa fa-align-right"></i>',
									),
								),
								'default'    => 'wpspro-align-center',
								'dependency' => array( 'grid_pagination|layout_preset', '==|==', 'true|grid', true ),
							),
							array(
								'id'         => 'show_counter_message',
								'type'       => 'switcher',
								'class'      => 'pro_only_field',
								'only_pro'   => true,
								'title'      => __( 'Viewed Counter Message', 'woo-product-slider' ),
								'subtitle'   => __( 'Show/Hide load more viewed counter message.', 'woo-product-slider' ),
								'text_on'    => __( 'Show', 'woo-product-slider' ),
								'text_off'   => __( 'Hide', 'woo-product-slider' ),
								'text_width' => 80,
								'default'    => true,
								'dependency' => array( 'grid_pagination|layout_preset', '==|==', 'true|grid', true ),
							),
						),
					),
				),
			),
		),
	)
);

	/**
	 * Image Settings section.
	 */
	SPF_WPSP::createSection(
		$prefix,
		array(
			'title'  => __( 'Image Settings', 'woo-product-slider' ),
			'icon'   => 'fa fa-image',
			'fields' => array(
				array(
					'id'         => 'product_image',
					'type'       => 'switcher',
					'title'      => __( 'Product Image', 'woo-product-slider' ),
					'subtitle'   => __( 'Show/Hide product image.', 'woo-product-slider' ),
					'text_on'    => __( 'Show', 'woo-product-slider' ),
					'text_off'   => __( 'Hide', 'woo-product-slider' ),
					'text_width' => 80,
					'default'    => true,
				),
				array(
					'id'          => 'product_image_border',
					'type'        => 'border',
					'title'       => __( 'Border', 'woo-product-slider' ),
					'subtitle'    => __( 'Set product image border.', 'woo-product-slider' ),
					'all'         => true,
					'hover_color' => true,
					'default'     => array(
						'all'         => '1',
						'style'       => 'solid',
						'color'       => '#dddddd',
						'hover_color' => '#dddddd',
					),
				),
				array(
					'id'         => 'zoom_effect_types',
					'type'       => 'select',
					'title'      => __( 'Zoom Effect', 'woo-product-slider' ),
					'subtitle'   => __( 'Select a zoom effect for the product image.', 'woo-product-slider' ),
					'options'    => array(
						'off'      => __( 'Normal', 'woo-product-slider' ),
						'zoom_in'  => __( 'Zoom In', 'woo-product-slider' ),
						'zoom_out' => __( 'Zoom Out', 'woo-product-slider' ),
					),
					'default'    => 'off',
					'dependency' => array(
						'product_image|template_style',
						'==|==',
						'true|custom',
						true,
					),
				),
				array(
					'id'         => 'image_sizes',
					'type'       => 'image_sizes',
					'title'      => __( 'Dimensions', 'woo-product-slider' ),
					'subtitle'   => __( 'Select a size for product image.', 'woo-product-slider' ),
					'default'    => 'medium',
					'dependency' => array(
						'product_image',
						'==',
						'true',
					),
				),
				array(
					'id'         => 'custom_image_size',
					'class'      => 'spwps_custom_image_option',
					'type'       => 'fieldset',
					'title'      => __( 'Custom Dimensions', 'woo-product-slider' ),
					'subtitle'   => __( 'Set a custom width and height of the product image.', 'woo-product-slider' ),
					'dependency' => array(
						'product_image|image_sizes',
						'==|==',
						'true|custom',
						true,
					),
					'fields'     => array(
						array(
							'id'       => 'image_custom_width',
							'type'     => 'spinner',
							'title'    => __( 'Width*', 'woo-product-slider' ),
							'default'  => 310,
							'unit'     => __( 'px', 'woo-product-slider' ),
							'max'      => 10000,
							'min'      => 1,
							'sanitize' => 'spwps_sanitize_number_field',
						),
						array(
							'id'       => 'image_custom_height',
							'type'     => 'spinner',
							'title'    => __( 'Height*', 'woo-product-slider' ),
							'default'  => 370,
							'unit'     => __( 'px', 'woo-product-slider' ),
							'max'      => 10000,
							'min'      => 1,
							'sanitize' => 'spwps_sanitize_number_field',
						),
						array(
							'id'       => 'image_custom_crop',
							'type'     => 'switcher',
							'class'    => 'pro_only_field',
							'title'    => __( 'Hard Crop', 'woo-product-slider' ),
							'text_on'  => __( 'Yes', 'woo-product-slider' ),
							'text_off' => __( 'No', 'woo-product-slider' ),
							'default'  => false,
						),
					),
				),
				array(
					'id'         => 'load_2x_image',
					'type'       => 'switcher',
					'class'      => 'pro_only_field',
					'title'      => __( 'Load 2x Resolution Image in Retina Display', 'woo-product-slider' ),
					'subtitle'   => __( 'You should upload 2x sized images to show in retina display.', 'woo-product-slider' ),
					'text_on'    => __( 'Enabled', 'woo-product-slider' ),
					'text_off'   => __( 'Disabled', 'woo-product-slider' ),
					'text_width' => 100,
					'default'    => false,
				),
				array(
					'id'         => 'product_image_flip',
					'type'       => 'switcher',
					'class'      => 'pro_only_field',
					'title'      => __( 'Image Flip', 'woo-product-slider' ),
					'subtitle'   => __( 'Enable/Disable product image flipping. Flipping image will be the first image of product gallery.', 'woo-product-slider' ),
					'text_on'    => __( 'Enabled', 'woo-product-slider' ),
					'text_off'   => __( 'Disabled', 'woo-product-slider' ),
					'text_width' => 100,
					'default'    => false,
					'dependency' => array(
						'product_image',
						'==',
						'true',
						true,
					),
				),
				array(
					'id'         => 'image_lightbox',
					'type'       => 'switcher',
					'class'      => 'pro_only_field',
					'title'      => __( 'Lightbox', 'woo-product-slider' ),
					'subtitle'   => __( 'Enable/Disable lightbox gallery for product image.', 'woo-product-slider' ),
					'text_on'    => __( 'Enabled', 'woo-product-slider' ),
					'text_off'   => __( 'Disabled', 'woo-product-slider' ),
					'text_width' => 100,
					'default'    => false,
					'dependency' => array(
						'product_image',
						'==',
						'true',
						true,
					),
				),
				array(
					'id'         => 'image_gray_scale',
					'class'      => 'pro_only_field_group',
					'type'       => 'button_set',
					'title'      => __( 'Image Mode', 'woo-product-slider' ),
					'subtitle'   => __( 'Set a mode for image.', 'woo-product-slider' ),
					'options'    => array(
						''                     => array(
							'name' => __( 'Original', 'woo-product-slider' ),
						),
						'sp-wpsp-always-gray'  => array(
							'name'     => __( 'Grayscale', 'woo-product-slider' ),
							'pro_only' => true,
						),
						'sp-wpsp-custom-color' => array(
							'name'     => __( 'Custom Color', 'woo-product-slider' ),
							'pro_only' => true,
						),
					),
					'default'    => '',
					'dependency' => array(
						'product_image',
						'==',
						'true',
					),
				),
				array(
					'id'         => 'image_grayscale_on_hover',
					'type'       => 'checkbox',
					'class'      => 'pro_only_field',
					'title'      => __( 'Grayscale on Hover', 'woo-product-slider' ),
					'subtitle'   => __( 'Check to grayscale product image on hover.', 'woo-product-slider' ),
					'default'    => false,
					'dependency' => array(
						'product_image',
						'==',
						'true',
					),
				),
				array(
					'type'    => 'notice',
					/* translators: %3$s: link tag start %4$s: link tag end */
					'content' => sprintf( __( 'Want to fine-tune control over %1$sProduct Image Dimensions, Retina, Flipping, Lightbox, Grayscale,%2$s and more?  %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
				),

			),
		)
	);

	/**
	 * Slider Controls section.
	 */
	SPF_WPSP::createSection(
		$prefix,
		array(
			'title'  => __( 'Slider Settings', 'woo-product-slider' ),
			'icon'   => 'fa fa-sliders',
			'fields' => array(
				array(
					'type'  => 'tabbed',
					'class' => 'wps-carousel-tabs',
					'tabs'  => array(
						array(
							'title'  => __( 'General', 'woo-product-slider' ),
							'icon'   => '<i class="sp-wps-icon-carousel-basic" aria-hidden="true"></i>',
							'fields' => array(
								array(
									'id'       => 'carousel_orientation',
									'type'     => 'button_set',
									'title'    => __( 'Carousel Orientation', 'woo-product-slider' ),
									'subtitle' => __( 'Choose a carousel orientation.', 'woo-product-slider' ),
									'options'  => array(
										'horizontal' => array(
											'name' => __( 'Horizontal', 'woo-product-slider' ),
										),
										'vertical'   => array(
											'name'     => __( 'Vertical', 'woo-product-slider' ),
											'pro_only' => true,
										),
									),
									'only_pro' => true,
									'default'  => 'horizontal',
								),
								array(
									'id'         => 'carousel_auto_play',
									'type'       => 'switcher',
									'title'      => __( 'AutoPlay', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable auto play.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => true,
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'carousel_auto_play_speed',
									'type'       => 'slider',
									'class'      => 'carousel_auto_play_ranger',
									'title'      => __( 'AutoPlay Delay Time', 'woo-product-slider' ),
									'subtitle'   => __( 'Set autoplay delay time in millisecond.', 'woo-product-slider' ),
									'unit'       => __( 'ms', 'woo-product-slider' ),
									'step'       => 100,
									'min'        => 100,
									'max'        => 30000,
									'default'    => 3000,
									'title_info' => '<div class="spwps-info-label">' . __( 'AutoPlay Delay Time', 'woo-product-slider' ) . '</div> <div class="spwps-short-content">' . __( 'Set autoplay delay or interval time. The amount of time to delay between automatically cycling a product item. e.g. 1000 milliseconds(ms) = 1 second.', 'woo-product-slider' ) . '</div>',
									'dependency' => array(
										'carousel_auto_play|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'id'         => 'carousel_scroll_speed',
									'type'       => 'slider',
									'class'      => 'carousel_auto_play_ranger',
									'title'      => __( 'Slider Speed', 'woo-product-slider' ),
									'subtitle'   => __( 'Set slider scroll speed. Default value is 600 milliseconds.', 'woo-product-slider' ),
									'unit'       => __( 'ms', 'woo-product-slider' ),
									'step'       => 100,
									'min'        => 1,
									'max'        => 20000,
									'default'    => 600,
									'title_info' => '<div class="spwps-info-label">' . __( 'Carousel Speed', 'woo-product-slider' ) . '</div> <div class="spwps-short-content">' . __( 'Set carousel scrolling speed. e.g. 1000 milliseconds(ms) = 1 second.', 'woo-product-slider' ) . '</div>',
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'slides_to_scroll',
									'type'       => 'column',
									'title'      => __( 'Slide To Scroll', 'woo-product-slider' ),
									'class'      => 'ps_pro_only_field',
									'subtitle'   => __( 'Number of product(s) to scroll at a time.', 'woo-product-slider' ),
									'default'    => array(
										'number1' => '1',
										'number2' => '1',
										'number3' => '1',
										'number4' => '1',
									),
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'carousel_pause_on_hover',
									'type'       => 'switcher',
									'title'      => __( 'Pause on Hover', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable pause on hover.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => true,
								),
								array(
									'id'         => 'carousel_infinite',
									'type'       => 'switcher',
									'title'      => __( 'Infinite Loop', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable infinite loop mode.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => true,
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'carousel_adaptive_height',
									'type'       => 'switcher',
									'title'      => __( 'Adaptive Height', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable adaptive height to set fixed height for the carousel.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => false,
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'       => 'rtl_mode',
									'type'     => 'button_set',
									'title'    => __( 'Slider Direction', 'woo-product-slider' ),
									'subtitle' => __( 'Set slider direction as you need.', 'woo-product-slider' ),
									'options'  => array(
										false => array(
											'name' => __( 'Right to Left', 'woo-product-slider' ),
										),
										true  => array(
											'name' => __( 'Left to Right', 'woo-product-slider' ),
										),
									),
									'default'  => false,
								),
								array(
									'id'         => 'fade_slider_effect',
									'type'       => 'switcher',
									'title'      => __( 'Fade Effect', 'woo-product-slider' ),
									'class'      => 'pro_only_field',
									'subtitle'   => __( 'Enable/Disable fade effect for the carousel.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => false,
									'dependency' => array( 'layout_preset|carousel_orientation', 'any|==', 'slider,multi-row,live-filter|horizontal', true ),
								),
								array(
									'type'    => 'notice',
									/* translators: %3$s: tag link start %4$s: link tag end */
									'content' => sprintf( __( 'To unlock product %1$sVertical Slider, Slide to Scroll, Fade Slide, Ticker, Multi-row Carousel,%2$s and more, %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								),
							),
						),
						array(
							'title'  => __( 'Navigation', 'woo-product-slider' ),
							'icon'   => '<i class="sp-wps-icon-navigation" aria-hidden="true"></i>',
							'fields' => array(
								array(
									'id'     => 'wps_carousel_navigation',
									'class'  => 'wps-navigation-and-pagination-style',
									'type'   => 'fieldset',
									'fields' => array(
										array(
											'id'         => 'navigation_arrow',
											'type'       => 'switcher',
											'title'      => __( 'Navigation', 'woo-product-slider' ),
											'class'      => 'wps_navigation',
											'subtitle'   => __( 'Show/hide navigation.', 'woo-product-slider' ),
											'text_on'    => __( 'Show', 'woo-product-slider' ),
											'text_off'   => __( 'Hide', 'woo-product-slider' ),
											'text_width' => 80,
											'default'    => true,
											'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
										),
										array(
											'id'         => 'nav_hide_on_mobile',
											'type'       => 'checkbox',
											'class'      => 'wps_hide_on_mobile',
											'title'      => __( 'Hide on Mobile', 'woo-product-slider' ),
											'default'    => false,
											'dependency' => array( 'layout_preset|navigation_arrow', 'any|==', 'slider,multi-row,live-filter|true', true ),
										),
									),
								),
								array(
									'id'          => 'navigation_position',
									'type'        => 'select',
									'class'       => 'wps-navigation-position',
									'title'       => __( 'Position', 'woo-product-slider' ),
									'subtitle'    => __( 'Position of the navigation arrows.', 'woo-product-slider' ),
									'options'     => array(
										'top_right'       => array(
											'name' => __( 'Top Right', 'woo-product-slider' ),
										),
										'top_center'      => array(
											'name' => __( 'Top Center', 'woo-product-slider' ),
										),
										'top_left'        => array(
											'name' => __( 'Top Left', 'woo-product-slider' ),
										),
										'bottom_left'     => array(
											'name' => __( 'Bottom Left', 'woo-product-slider' ),
										),
										'bottom_center'   => array(
											'name' => __( 'Bottom Center', 'woo-product-slider' ),
										),
										'bottom_right'    => array(
											'name' => __( 'Bottom Right', 'woo-product-slider' ),
										),
										'vertical_center' => array(
											'name' => __( 'Vertical Center', 'woo-product-slider' ),
										),
										'vertical_outer'  => array(
											'name' => __( 'Vertical Outer', 'woo-product-slider' ),
										),
										'vertical_center_inner' => array(
											'name' => __( 'Vertical Inner', 'woo-product-slider' ),
										),
									),
									'default'     => 'top_right',
									'nav-preview' => true,
									'only_pro'    => true,
									'dependency'  => array( 'navigation_arrow|layout_preset', '==|any', 'true|slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'nav_visible_on_hover',
									'type'       => 'checkbox',
									'title'      => __( 'Visible On Hover', 'woo-product-slider' ),
									'class'      => 'pro_only_field',
									'subtitle'   => __( 'Check to show navigation on hover in the carousel or slider area.', 'woo-product-slider' ),
									'default'    => false,
									'dependency' => array( 'navigation_arrow|layout_preset|navigation_position', '==|any|any', 'true|slider,multi-row,live-filter|vertical_center,vertical_center_inner,vertical_outer', true ),
								),
								array(
									'id'         => 'navigation_arrow_type',
									'type'       => 'button_set',
									'only_pro'   => true,
									'title'      => __( 'Arrow Icon Style', 'woo-product-slider' ),
									'subtitle'   => __( 'Choose a slider navigation arrow icon style.', 'woo-product-slider' ),
									'class'      => 'wpsp-nav-arrow-icons',
									'options'    => array(
										'angle' => array(
											'name' => '<i class="sp-wps-icon-angle-right"></i>',
										),
										'1'     => array(
											'name' => '<i class="sp-wps-icon-right-open"></i>',
										),
										'2'     => array(
											'name' => '<i class="sp-wps-icon-right-open"></i>',
										),
										'3'     => array(
											'name' => '<i class="sp-wps-icon-right-open-1"></i>',
										),
										'4'     => array(
											'name' => '<i class="sp-wps-icon-right-open-3"></i>',
										),
										'5'     => array(
											'name' => '<i class="sp-wps-icon-right-open-outline"></i>',
										),
										'6'     => array(
											'name' => '<i class="sp-wps-icon-right"></i>',
										),
										'7'     => array(
											'name'     => '<i class="sp-wps-icon-arrow-triangle-right"></i>',
											'pro_only' => true,
										),
									),
									'default'    => 'angle',
									'dependency' => array(
										'navigation_arrow|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'id'            => 'navigation_border',
									'type'          => 'border',
									'title'         => __( 'Border', 'woo-product-slider' ),
									'subtitle'      => __( 'Set border for the navigation.', 'woo-product-slider' ),
									'all'           => true,
									'hover_color'   => true,
									'border_radius' => false,
									'show_units'    => true,
									'units'         => array( 'px', '%', 'em' ),
									'default'       => array(
										'all'         => '1',
										'style'       => 'solid',
										'color'       => '#aaaaaa',
										'hover_color' => '#444444',
									),
									'dependency'    => array(
										'navigation_arrow|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'id'         => 'navigation_arrow_colors',
									'type'       => 'color_group',
									'title'      => __( 'Color', 'woo-product-slider' ),
									'subtitle'   => __( 'Set color for the slider navigation.', 'woo-product-slider' ),
									'options'    => array(
										'color'            => __( 'Color', 'woo-product-slider' ),
										'hover_color'      => __( 'Hover Color', 'woo-product-slider' ),
										'background'       => __( 'Background', 'woo-product-slider' ),
										'hover_background' => __( 'Hover Background', 'woo-product-slider' ),
									),
									'default'    => array(
										'color'            => '#444444',
										'hover_color'      => '#ffffff',
										'background'       => 'transparent',
										'hover_background' => '#444444',
									),
									'dependency' => array(
										'navigation_arrow|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'type'    => 'notice',
									/* translators: %3$s: link tag start %4$s: link tag end */
									'content' => sprintf( __( 'Want even more fine-tuned control over the product %1$sSlider Navigation%2$s display? %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								),
							),
						),
						array(
							'title'  => __( 'Pagination', 'woo-product-slider' ),
							'icon'   => '<i class="sp-wps-icon-pagination" aria-hidden="true"></i>',
							'fields' => array(
								array(
									'id'     => 'wps_carousel_pagination',
									'class'  => 'wps-navigation-and-pagination-style',
									'type'   => 'fieldset',
									'fields' => array(
										array(
											'id'         => 'pagination',
											'type'       => 'switcher',
											'title'      => __( 'Pagination', 'woo-product-slider' ),
											'class'      => 'wps_pagination',
											'subtitle'   => __( 'Show/hide navigation.', 'woo-product-slider' ),
											'text_on'    => __( 'Show', 'woo-product-slider' ),
											'text_off'   => __( 'Hide', 'woo-product-slider' ),
											'text_width' => 80,
											'default'    => true,
											'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
										),
										array(
											'id'         => 'wps_pagination_hide_on_mobile',
											'type'       => 'checkbox',
											'class'      => 'wps_hide_on_mobile',
											'title'      => __( 'Hide on Mobile', 'woo-product-slider' ),
											'default'    => false,
											'dependency' => array( 'layout_preset|pagination', 'any|==', 'slider,multi-row,live-filter|true', true ),
										),
									),
								),
								array(
									'id'         => 'pagination_type',
									'type'       => 'image_select',
									'class'      => 'hide-active-sign',
									'title'      => __( 'Pagination Type', 'woo-product-slider' ),
									'subtitle'   => __( 'Select pagination type.', 'woo-product-slider' ),
									'image_name' => true,
									'options'    => array(
										'dots'      => array(
											'image' => SP_WPS_URL . 'Admin/assets/images/pagination-type/bullets.svg',
											'name'  => __( 'Bullets', 'woo-product-slider' ),
										),
										'dynamic'   => array(
											'image'    => SP_WPS_URL . 'Admin/assets/images/pagination-type/dynamic.svg',
											'name'     => __( 'Dynamic', 'woo-product-slider' ),
											'pro_only' => true,
										),
										'strokes'   => array(
											'image'    => SP_WPS_URL . 'Admin/assets/images/pagination-type/strokes.svg',
											'name'     => __( 'Strokes', 'woo-product-slider' ),
											'pro_only' => true,
										),
										'scrollbar' => array(
											'image'    => SP_WPS_URL . 'Admin/assets/images/pagination-type/scrollbar.svg',
											'name'     => __( 'Scrollbar', 'woo-product-slider' ),
											'pro_only' => true,
										),
										'number'    => array(
											'image'    => SP_WPS_URL . 'Admin/assets/images/pagination-type/numbers.svg',
											'name'     => __( 'Numbers', 'woo-product-slider' ),
											'pro_only' => true,
										),
									),
									'default'    => 'dots',
									'dependency' => array( 'pagination|layout_preset', '==|any', 'true|slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'pagination_dots_color',
									'type'       => 'color_group',
									'title'      => __( 'Color', 'woo-product-slider' ),
									'subtitle'   => __( 'Set color for the slider pagination dots and scrollbar.', 'woo-product-slider' ),
									'options'    => array(
										'color'        => __( 'Color', 'woo-product-slider' ),
										'active_color' => __( 'Active Color', 'woo-product-slider' ),
									),
									'default'    => array(
										'color'        => '#cccccc',
										'active_color' => '#333333',
									),
									'dependency' => array(
										'pagination|pagination_type|layout_preset',
										'==|!=|any',
										'true|number|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'type'    => 'notice',
									/* translators: %3$s: link tag start %4$s: link tag end */
									'content' => sprintf( __( 'Want even more fine-tuned control over the product %1$sSlider Pagination%2$s display? %3$sUpgrade To Pro!%4$s', 'woo-product-slider' ), '<strong>', '</strong>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
								),
							),
						),
						array(
							'title'  => __( 'Miscellaneous', 'woo-product-slider' ),
							'icon'   => '<i class="sp-wps-icon-miscellaneous" aria-hidden="true"></i>',
							'fields' => array(
								array(
									'id'         => 'carousel_tab_key_nav',
									'type'       => 'switcher',
									'title'      => __( 'Tab & Key Navigation', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable carousel scroll with tab and keyboard.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => false,
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'carousel_swipe',
									'type'       => 'switcher',
									'title'      => __( 'Touch Swipe', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable touch swipe mode.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => true,
									'dependency' => array( 'layout_preset', 'any', 'slider,multi-row,live-filter', true ),
								),
								array(
									'id'         => 'carousel_mouse_wheel',
									'type'       => 'switcher',
									'title'      => __( 'Mouse Wheel', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable mouse wheel mode.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => false,
									'dependency' => array(
										'carousel_swipe|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'id'         => 'carousel_draggable',
									'type'       => 'switcher',
									'title'      => __( 'Mouse Draggable', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable mouse draggable mode.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => true,
									'dependency' => array(
										'carousel_swipe|layout_preset',
										'==|any',
										'true|slider,multi-row,live-filter',
										true,
									),
								),
								array(
									'id'         => 'carousel_free_mode',
									'type'       => 'switcher',
									'title'      => __( 'Free Mode', 'woo-product-slider' ),
									'subtitle'   => __( 'Enable/Disable free mode.', 'woo-product-slider' ),
									'text_on'    => __( 'Enabled', 'woo-product-slider' ),
									'text_off'   => __( 'Disabled', 'woo-product-slider' ),
									'text_width' => 100,
									'default'    => false,
									'dependency' => array(
										'carousel_swipe|layout_preset|carousel_draggable',
										'==|any|==',
										'true|slider,multi-row,live-filter|true',
										true,
									),
								),
							),
						),
					),
				),
			),
		)
	);

	/**
	 * Typography section.
	 */
	SPF_WPSP::createSection(
		$prefix,
		array(
			'title'  => __( 'Typography', 'woo-product-slider' ),
			'icon'   => 'fa fa-font',
			'fields' => array(
				array(
					'type'    => 'notice',
					/* translators: %1$s: bold tag start %2$s: bold tag end %3$s: link tag start %4$s: link tag end */
					'content' => sprintf( __( 'Want to customize everything %1$s(Colors and Typography)%2$s easily? %3$sUpgrade To Pro!%4$s Note: The Slider Section Title, Product Name, Product Price Font size and color fields work in lite version.', 'woo-product-slider' ), '<b>', '</b>', '<a href="https://wooproductslider.io/pricing/?ref=1" target="_blank"><b>', '</b></a>' ),
				),
				array(
					'id'           => 'slider_title_typography',
					'type'         => 'typography',
					'title'        => __( 'Slider Section Title Font', 'woo-product-slider' ),
					'subtitle'     => __( 'Set slider section title font properties.', 'woo-product-slider' ),
					'default'      => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => '600',
						'type'           => 'google',
						'font-size'      => '22',
						'line-height'    => '23',
						'text-align'     => 'left',
						'text-transform' => 'none',
						'letter-spacing' => '',
						'color'          => '#444444',
					),
					'preview_text' => 'Slider Section Title', // Replace preview text with any text you like.
				),
				array(
					'id'           => 'product_name_typography',
					'type'         => 'typography',
					'title'        => __( 'Product Name Font', 'woo-product-slider' ),
					'subtitle'     => __( 'Set product name font properties.', 'woo-product-slider' ),
					'default'      => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => '600',
						'type'           => 'google',
						'font-size'      => '15',
						'line-height'    => '20',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
						'color'          => '#444444',
						'hover_color'    => '#955b89',
					),
					'hover_color'  => true,
					'preview_text' => 'Product Name', // Replace preview text with any text you like.
				),
				array(
					'id'       => 'product_description_typography',
					'type'     => 'typography',
					'title'    => __( 'Product Description Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set product description font properties.', 'woo-product-slider' ),
					'class'    => 'product-description-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => 'regular',
						'type'           => 'google',
						'font-size'      => '14',
						'line-height'    => '20',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
						'color'          => '#333333',
					),
				),
				array(
					'id'       => 'product_price_typography',
					'type'     => 'typography',
					'title'    => __( 'Product Price Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set product price font properties.', 'woo-product-slider' ),
					'class'    => 'product-price-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => '700',
						'type'           => 'google',
						'font-size'      => '14',
						'line-height'    => '19',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
						'color'          => '#222222',
					),
				),
				array(
					'id'       => 'sale_ribbon_typography',
					'type'     => 'typography',
					'title'    => __( 'Sale Ribbon Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set product sale ribbon font properties.', 'woo-product-slider' ),
					'class'    => 'sale-ribbon-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => 'regular',
						'type'           => 'google',
						'font-size'      => '10',
						'line-height'    => '10',
						'text-align'     => 'center',
						'text-transform' => 'uppercase',
						'letter-spacing' => '1',
						'color'          => '#ffffff',
					),
				),
				array(
					'id'       => 'out_of_stock_ribbon_typography',
					'type'     => 'typography',
					'title'    => __( 'Out of Stock Ribbon Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set product out of stock ribbon font properties.', 'woo-product-slider' ),
					'class'    => 'out-of-stock-ribbon-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => 'regular',
						'type'           => 'google',
						'font-size'      => '10',
						'line-height'    => '10',
						'text-align'     => 'center',
						'text-transform' => 'uppercase',
						'letter-spacing' => '1',
						'color'          => '#ffffff',
					),
				),
				array(
					'id'          => 'product_category_typography',
					'type'        => 'typography',
					'title'       => __( 'Product Category Font', 'woo-product-slider' ),
					'subtitle'    => __( 'Set product category font properties.', 'woo-product-slider' ),
					'class'       => 'product-category-typography',
					'default'     => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => 'regular',
						'type'           => 'google',
						'font-size'      => '14',
						'line-height'    => '19',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
						'color'          => '#444444',
						'hover_color'    => '#955b89',
					),
					'hover_color' => true,
				),
				array(
					'id'       => 'compare_wishlist_typography',
					'type'     => 'typography',
					'title'    => __( 'Compare & Wishlist Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set compare and wishlist font properties.', 'woo-product-slider' ),
					'class'    => 'compare-wishlist-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => 'regular',
						'type'           => 'google',
						'font-size'      => '14',
						'line-height'    => '19',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
					),
					'color'    => false,
				),
				array(
					'id'       => 'add_to_cart_typography',
					'type'     => 'typography',
					'title'    => __( 'Add to Cart & View Details Font', 'woo-product-slider' ),
					'subtitle' => __( 'Set add to cart and view details font properties.', 'woo-product-slider' ),
					'class'    => 'add-to-cart-typography',
					'default'  => array(
						'font-family'    => 'Open Sans',
						'font-weight'    => '600',
						'type'           => 'google',
						'font-size'      => '14',
						'line-height'    => '19',
						'text-align'     => 'center',
						'text-transform' => 'none',
						'letter-spacing' => '',
					),
					'color'    => false,
				),

			),
		)
	);
