<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mysmartlab_setup' ) ) :

	function mysmartlab_setup() {

		load_theme_textdomain( 'mysmartlab', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );


		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'mysmartlab' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'mysmartlab_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mysmartlab_setup' );

function mysmartlab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mysmartlab_content_width', 640 );
}
add_action( 'after_setup_theme', 'mysmartlab_content_width', 0 );
function mysmartlab_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mysmartlab' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mysmartlab' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mysmartlab_widgets_init' );
function mysmartlab_scripts() {
	wp_enqueue_style( 'mysmartlab-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mysmartlab-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mysmartlab-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mysmartlab_scripts' );
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


require get_template_directory() . '/lib/init.php';
require get_template_directory() . '/lib/menus.php';
require get_template_directory() . '/lib/custom-types.php';
require get_template_directory() . '/lib/helper-functions.php';
require get_template_directory() . '/lib/acf.php';


function footer_sidebar() {
    register_sidebar(
        array(
            'name'          => __( 'Footer 1', 'textdomain' ),
            'id'            => 'footer-1',
            'before_widget' => '<section id="%1$s" class="widget %2$s width40">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

	register_sidebar(
        array(
            'name'          => __( 'Footer 2', 'textdomain' ),
            'id'            => 'footer-2',
            'before_widget' => '<section id="%1$s" class="widget %2$s width30">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

	register_sidebar(
        array(
            'name'          => __( 'Footer 3', 'textdomain' ),
            'id'            => 'footer-3',
            'before_widget' => '<section id="%1$s" class="widget %2$s width30">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

	register_sidebar(
        array(
            'name'          => __( 'Copyrights', 'textdomain' ),
            'id'            => 'copyrights',
            'before_widget' => '<section id="%1$s" class="widget %2$s width100">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

	register_sidebar(
        array(
            'name'          => __( 'Social Media', 'textdomain' ),
            'id'            => 'social-media',
            'before_widget' => '<section id="%1$s" class="widget %2$s width100">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );

}
add_action( 'widgets_init', 'footer_sidebar' );
function button_large( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'url'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
	), $atts ) );
	$content = $text ? $text : $content;
	if ( $url ) {
		$link_attr = array(
			'href'   => esc_url( $url ),
			'title'  => esc_attr( $title ),
			'target' => ( 'blank' == $target ) ? '_blank' : '',
			'class'  => 'customlargbutton'
		);
		$link_attrs_str = '';
		foreach ( $link_attr as $key => $val ) {
			if ( $val ) {
				$link_attrs_str .= ' ' . $key . '="' . $val . '"';	} }
		return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
	}
	else {
		return '<span class="customlargbutton"><span>' . do_shortcode( $content ) . '</span></span>';
	}

}
add_shortcode( 'customlargbutton', 'button_large' );








function register_blocks_and_fields() {

	// Check function exists.
	if( !function_exists('acf_register_block_type') ) {
		return;
	}

// Team Members block
	acf_register_block_type(array(
		'name'              => 'team',
		'title'             => __('Community Member', 'mysmartlab'),
		'description'       => __('List the team members in the Team Members post type', 'mysmartlab'),
		'render_template'   => 'template-parts/blocks/community-member.php',
		'category'          => 'common',
		'icon'              => 'groups',
		'supports'			=> array(
			'align' => 'false',
		)
	));

	acf_register_block_type(array(
		'name'              => 'HeroSlider',
		'title'             => __('Hero Slides', 'mysmartlab'),
		'render_template'   => 'template-parts/blocks/hero-slider.php',
		'category'          => 'common',
		'icon'              => 'groups',
		'supports'			=> array(
			'align' => 'false',
		)
	));
	
	acf_register_block_type(array(
		'name'              => 'FeatureSlider',
		'title'             => __('Features Slides', 'mysmartlab'),
		'render_template'   => 'template-parts/blocks/features-slider.php',
		'category'          => 'common',
		'icon'              => 'groups',
		'supports'			=> array(
			'align' => 'false',
		)
	));

}
add_action('acf/init', 'register_blocks_and_fields');

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6167ecdba3e10',
	'title' => 'Block: Community Member',
	'fields' => array(
		array(
			'key' => 'field_6167ed29d4010',
			'label' => 'Community Member',
			'name' => 'community_member',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_6167ed5ad4011',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_6167ed6fd4012',
					'label' => 'Featured Image',
					'name' => 'featured_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_6167ed8ad4013',
					'label' => 'Title',
					'name' => 'title_member',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),

		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/team',
				),
			),
		),
	'position' => 'side',
	'menu_order' => 0,
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_616ce02f0277f',
	'title' => 'Hero Home Slider',
	'fields' => array(
		array(
			'key' => 'field_616ce0410a1c6',
			'label' => 'Hero Slider',
			'name' => 'hero_slider',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_616ce0540a1c7',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_616ce0540a1c7',
					'label' => 'Title Slider',
					'name' => 'title_slider',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_616ce41dd0344',
					'label' => 'Short Description',
					'name' => 'short_description',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_616ce05d0a1c8',
					'label' => 'Home Video',
					'name' => 'home_video',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/heroslider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


acf_add_local_field_group(array(
	'key' => 'group_616cfac148d0f',
	'title' => 'Feature Slider',
	'fields' => array(
		array(
			'key' => 'field_616cfac7c52d9',
			'label' => 'Features Table',
			'name' => 'features_table',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_616cfad2c52da',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_616cfad2c52da',
					'label' => 'Image Slider',
					'name' => 'image_slider_features',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/featureslider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


endif;
