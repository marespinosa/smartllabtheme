<?php
/**
 * Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mysmartlab
 */

get_header();
?>

<div class="container hero_content">
	  <div class="row">
			  <div class="col-6">
			  	
			  	<h1><?php echo get_field( "title_hero" ); ?></h1>
			  	<?php echo get_field( "description_hero" ); ?>

			  </div>
			  <div class="col-6">
				<?php if( get_field('featured_image') ): ?>
    				<img src="<?php the_field('featured_image'); ?>" />
				<?php endif; ?>
			  </div>
	  </div>

	</div>

</div>



<main id="primary" class="site-main full-width">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

</main><!-- #main -->




<?php
get_footer();
?>


