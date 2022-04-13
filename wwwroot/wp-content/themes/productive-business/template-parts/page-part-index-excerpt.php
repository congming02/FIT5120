<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>
<div class="product">
	<div class="the_search_item">
	
		  <div class="the_search_thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>"> 
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail' );
				} else {
					do_action( 'display_placeholder_image' );
				}
				?>
			</a>
		</div>
		
		<?php
		$post_format = get_post_format();
		if ( 'status' != $post_format && 'aside' != $post_format ) {
			?>
				<div class="the_search_title">
					<?php
					echo '<h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3>';
					?>
				</div>
			<?php
		}
		?>
			
		<div class="the_search_excerpt">
			<?php
				echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) );
			?>
		</div>
	</div>
</div>
