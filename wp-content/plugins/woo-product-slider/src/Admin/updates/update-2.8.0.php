<?php
/**
 * Update version.
 */
update_option( 'woo_product_slider_version', '2.8.0' );
update_option( 'woo_product_slider_db_version', '2.8.0' );

/**
 * Shortcode query for id.
 */
$args = new WP_Query(
	array(
		'post_type'      => 'sp_wps_shortcodes',
		'post_status'    => 'any',
		'posts_per_page' => '3000',
	)
);

$shortcode_ids = wp_list_pluck( $args->posts, 'ID' );

/**
 * Update metabox data along with previous data.
 */
if ( count( $shortcode_ids ) > 0 ) {
	foreach ( $shortcode_ids as $shortcode_key => $shortcode_id ) {
		$shortcode_data = get_post_meta( $shortcode_id, 'sp_wps_shortcode_options', true );
		if ( ! is_array( $shortcode_data ) ) {
			continue;
		}
		$layout_preset = isset( $shortcode_data['layout_preset'] ) ? $shortcode_data['layout_preset'] : 'slider';
		$layouts_data  = array();
		if ( $layout_preset ) {
			$layouts_data['layout_preset'] = $layout_preset;
		}
		$template_style = isset( $shortcode_data['template_style'] ) ? $shortcode_data['template_style'] : 'pre-made';

		if ( 'custom' === $template_style ) {
			$shortcode_data['product_image_border'] = array(
				'all'         => '1',
				'style'       => 'none',
				'color'       => '#dddddd',
				'hover_color' => '#dddddd',
			);
		}
		$shortcode_data['product_content_type'] = 'hide';
		update_post_meta( $shortcode_id, 'sp_wps_shortcode_options', $shortcode_data );
		update_post_meta( $shortcode_id, 'sp_wps_layout_options', $layouts_data );
	}
}
