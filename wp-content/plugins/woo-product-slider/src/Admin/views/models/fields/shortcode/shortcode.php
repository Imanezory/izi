<?php
/**
 * The framework shortcode fields file.
 *
 * @package Woo_Product_Slider.
 * @subpackage Woo_Product_Slider/models.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.

if ( ! class_exists( 'SPF_WPSP_Fields_shortcode' ) ) {
	/**
	 * SP_PC_Field_shortcode
	 */
	class SPF_WPSP_Field_shortcode extends SPF_WPSP_Fields {
		/**
		 * Field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}
		/**
		 * Render method.
		 *
		 * @return void
		 */
		public function render() {
			// Get the Post ID.
			$post_id = get_the_ID();
			if ( ! empty( $this->field['shortcode'] ) ) {
				echo ( ! empty( $post_id ) ) ? '<div class="spwps-scode-wrap-side"><p>To display your product slider, add the following shortcode into your post, custom post types, page, widget or block editor. If adding the slider to your theme files, additionally include the surrounding PHP code, <a href="https://docs.shapedplugin.com/docs/woocommerce-product-slider-pro/faq/how-to-use-product-slider-shortcode-to-your-theme-files-or-php-templates/" target="_blank">see how</a>.‎</p><span class="spwps-shortcode-selectable">[woo_product_slider id="' . esc_attr( $post_id ) . '"]</span></div><div class="wpspro-after-copy-text"><i class="fa fa-check-circle"></i> Shortcode Copied to Clipboard! </div>' : '';
			} else {
				echo ( ! empty( $post_id ) ) ? '<div class="spwps-scode-wrap-side"><p>Woo Product Slider has seamless integration with Gutenberg, Classic Editor, <strong>Elementor, Divi,</strong> Bricks, Beaver, Oxygen, WPBakery Builder, etc.</p></div>' : '';
			}

		}

	}
}
