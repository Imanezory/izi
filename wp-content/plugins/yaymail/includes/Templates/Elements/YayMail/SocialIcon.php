<?php $img_url = YAYMAIL_PLUGIN_URL . 'assets/dist/images/play.png'; ?>
<?php
$yaymail_settings = get_option( 'yaymail_settings' );
$direction_rtl    = $yaymail_settings['direction_rtl'];
?>
<table
	width="<?php esc_attr_e( $general_attrs['tableWidth'], 'woocommerce' ); ?>"
	cellspacing="0"
	cellpadding="0"
	border="0"
	align="center"
	style="display: table; <?php echo esc_attr( 'background-color: ' . $attrs['backgroundColor'] ); ?>; <?php echo ! $isInColumns ? esc_attr( 'min-width:' . $general_attrs['tableWidth'] . 'px' ) : esc_attr( 'width: 100%' ); ?>;"
	class="web-main-row"
	id="web<?php echo esc_attr( $id ); ?>"
  >
  <tbody>
	  <tr>
		<td
		  align="<?php echo esc_attr( $attrs['align'] ); ?>"
		  id="web-<?php echo esc_attr( $id ); ?>-socialicon"
		  class="web-video-wrap"
		  style="<?php echo esc_attr( 'padding: ' . $attrs['paddingTop'] . 'px ' . $attrs['paddingRight'] . 'px ' . $attrs['paddingBottom'] . 'px ' . $attrs['paddingLeft'] . 'px;' . ' text-align: ' . $attrs['align'] . ';'); ?>"
		>
			<?php
			if ( isset( $attrs['iconSocialsArr'] ) ) {
				foreach ( $attrs['iconSocialsArr'] as $key => $el ) {
					$imgUrl      = YAYMAIL_PLUGIN_URL . 'assets/dist/images/SocialIcons/' . $attrs['styleTheme'] . '/' . $el['icon'] . '.png';
					
					$first_index = ('rtl' === $direction_rtl) ? count($attrs['iconSocialsArr']) - 1 : 0;
					$margin_left = ($first_index === $key) ? '0px' : $attrs['iconSpacing'] . 'px';
					
					?> 

						<a class="nta-web-icon-socials-wrap" href="<?php echo esc_attr( $el['pathLink'] ); ?>" target="_blank" style="border: none; text-decoration: none; display: inline-block !important;margin-left:<?php echo esc_attr( $margin_left ); ?>"><img border="0" tabindex="0" src="<?php echo esc_attr( $imgUrl ); ?>" height="<?php echo esc_attr( $attrs['widthSocialIcon'] ); ?>" style="margin-right: 0;width:<?php echo esc_attr( $attrs['widthSocialIcon'] ); ?>px; "/></a>
					<?php
				}
			}
			?>
		</td>
	  </tr>
	</tbody>
  </table>
