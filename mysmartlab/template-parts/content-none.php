<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mysmartlab
 */

?>

<section class="no-results not-found">
	<header class="entry-header">
		
		<?php if( get_field('page_title_visibility') == 'Show Page Title'): ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php elseif	( get_field('page_title_visibility') == 'Hide Page Title' ): ?>
			<h1><span style="position: absolute; rect(1px, 1px, 1px, 1px); overflow: hidden; height: 1px; width: 1px;"><?php the_title(); ?></span></h1>
		<?php endif; ?>	
		
		
	</header><!-- .entry-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mysmartlab' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mysmartlab' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mysmartlab' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
