<?php

/**
 * Hero Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'FeatureSlider-' . $block['id'];
$id = ( !empty( $block['anchor'] ) ? $block['anchor'] : $id );

// Create class attribute allowing for custom "className" and "align" values.
$class = 'FeatureSlider';
$class .= ( !empty( $block['className'] ) ? ' ' . $block['className'] : '' );
$class .= ( $is_preview ? ' is-admin' : '' );

?>

<div id="myfeatures">
	<div class="carousel slide" data-ride="carousel">
      
		   <div class="carousel-inner">
			   
			   <?php if( have_rows('features_table') ):
					$hero_slider_one=1; 
					 while ( have_rows('features_table') ) : the_row();
						if ($hero_slider_one == 1) {
					?>
					<div class="carousel-item active">
					   <div class="container-min">
						  <div class="video-descrp"><?php if( get_sub_field('image_slider_features') ): ?>
							<img src="<?php the_sub_field('image_slider_features'); ?>" />
						<?php endif; ?></div>
					   </div>
					</div>
					<?php } else {?> 	
					<div class="carousel-item">
					   <div class="container-min">
						 <div class="video-descrp"><?php if( get_sub_field('image_slider_features') ): ?>
							<img src="<?php the_sub_field('image_slider_features'); ?>" />
						<?php endif; ?></div>
					   </div>
					</div>
				<?php } 
				$hero_slider_one++; ?> 	
				   <?php endwhile;
				else : endif; ?>
			   

			   </div>
			   
	    <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>

     </div>
	 
	 
</div>

		 
	 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  
	 
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>

