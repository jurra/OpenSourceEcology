<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">
	<div class="sketchfab-embed-wrapper, custom-header-media"  style=""><iframe width="100%" height="100%" src="https://sketchfab.com/models/0902cdcf125747dcb948e36cf56de802/embed" frameborder="0"  allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
</div>

		<!-- <div class="custom-header-media">
			<?php the_custom_header_markup(); ?>
		</div> -->

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
