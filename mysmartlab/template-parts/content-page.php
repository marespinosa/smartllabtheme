<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mysmartlab
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php if( get_field('page_title_visibility') == 'Show Page Title'): ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php elseif	( get_field('page_title_visibility') == 'Hide Page Title' ): ?>
			<h1><span style="position: absolute; rect(1px, 1px, 1px, 1px); overflow: hidden; height: 1px; width: 1px;"><?php the_title(); ?></span></h1>
		<?php endif; ?>	
		
		
	</header><!-- .entry-header -->

	<?php mysmartlab_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mysmartlab' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
