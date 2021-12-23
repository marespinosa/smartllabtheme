<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mysmartlab
 */

?>


</div><!-- #page -->

<div class="socialmedia-wrapper">
	<div class="container">
		<?php dynamic_sidebar( 'social-media' ); ?>
	</div>
</div>

<div class="footer-widgets-wrapper">
	<div class="container footer-widgets">
		<?php dynamic_sidebar( 'footer-1' ); ?>
		<?php dynamic_sidebar( 'footer-2' ); ?>
		<?php dynamic_sidebar( 'footer-3' ); ?>
	</div>
	<div class="container"><?php dynamic_sidebar( 'copyrights' ); ?></div>
</div>
<?php wp_footer(); ?>

</body>
</html>
