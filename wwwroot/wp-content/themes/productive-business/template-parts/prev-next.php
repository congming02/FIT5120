<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>
<?php
	$prev = get_previous_post();
	$next = get_next_post();

if ( $prev || $next ) {
	?>

	<div class="flex-content-container-fixed fifty_top_bottom_padding">
		<div class="flex-content-fixed-50 prev-post-link">
		<?php
		if ( $prev ) {
			$main_image = '';
			if ( has_post_thumbnail() ) {
				$image_srcs_array = wp_get_attachment_image_src( get_post_thumbnail_id( $prev->ID ), 'full' );
				if ( $image_srcs_array ) {
					$main_image = $image_srcs_array[0];
				} else {
					$main_image = promindsone_get_placeholder_image();
				}
			} else {
				$main_image = promindsone_get_placeholder_image();
			}
			?>
				<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
					<span class="">
						<i class="material-icons-round txt_three_rem darkgreyed">west</i>
						<img src="<?php echo esc_url( $main_image ); ?>" alt="" />
					</span>
				</a>
			<?php } ?>
		</div>
		
		<div class="flex-content-fixed-50 next-post-link righted">
			<?php
			if ( $next ) {
				$main_image_next = '';
				if ( has_post_thumbnail() ) {
					$image_srcs_array = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'full' );
					if ( $image_srcs_array ) {
						$main_image_next = $image_srcs_array[0];
					} else {
						$main_image_next = promindsone_get_placeholder_image();
					}
				} else {
					$main_image_next = promindsone_get_placeholder_image();
				}
				?>
				<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
					<span class="">
						<img src="<?php echo esc_url( $main_image_next ); ?>" alt="" /> 
						<i class="material-icons-round txt_three_rem darkgreyed">east</i>
					</span>
				</a>
			<?php } ?>
		</div>
	
	</div>

	<?php
}
?>
