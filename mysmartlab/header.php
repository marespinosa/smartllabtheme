<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mysmartlab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" rel="stylesheet" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" />
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="hero_wrap" style="background-image:url('<?php the_field('background_image_top'); ?>');">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mysmartlab' ); ?></a>


	<div class="header_section">
            <div class="container-fluid container">
                <nav id="site-navigation" class=" main-navigation navbar navbar-expand-lg navbar-light">
                
                <button class="navbar-toggler menu-toggle" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="primary-menu navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" ><?php esc_html_e( 'Primary Menu', 'mysmartlab' ); ?> <span class="navbar-toggler-icon"></span></button>


                    <div class="site-branding">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$mysmartlab_description = get_bloginfo( 'description', 'display' );
						if ( $mysmartlab_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $mysmartlab_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                         <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_class'     => 'navbar-nav mr-auto mt-2 mt-lg-0',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
                        <div class="btn-inline homepage-btn">
                                <a class="btn btn-default btn-login" href="#login">Login</a>
                                <a class="btn btn-default btn-contact" href="https://build.emuninja.dev/contact/">Get in touch</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

	