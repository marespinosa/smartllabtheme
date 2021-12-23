<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/purejscarousel.js"></script>

<!-- Team -->
<?php

/**
 * Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
$id = ( !empty( $block['anchor'] ) ? $block['anchor'] : $id );

// Create class attribute allowing for custom "className" and "align" values.
$class = 'team';
$class .= ( !empty( $block['className'] ) ? ' ' . $block['className'] : '' );
$class .= ( $is_preview ? ' is-admin' : '' );

?>


 <section>

      <div class="carousel" id="carousel-autoplay">
			<?php if( have_rows('community_member') ): ?>
				<?php while( have_rows('community_member') ): the_row();
					?>
					<div class="slide">
						<div class="description-slide"><p><?php the_sub_field('description'); ?></p></div>

            <div class="featured-info"><?php if( get_sub_field('featured_image') ): ?>
                <img src="<?php the_sub_field('featured_image'); ?>" />
              <?php endif; ?>
						<p><?php the_sub_field('title_member'); ?></p></div>
					</div>
				<?php endwhile; ?>

		<?php endif; ?>


      </div>
    </section>

 <script>
		 var carouselAutoplay = new PureJSCarousel({
          carousel: '#carousel-autoplay',
          slide: '.slide',
          infinite: true,
          autoplay: true
        });
	</script>


<!-- End: Team -->
