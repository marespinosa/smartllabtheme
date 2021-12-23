<?php

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_script_add_data('jquery', array('integrity', 'crossorigin', 'async'), array('sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=', 'anonymous', true));

}

function add_theme_scripts()
{
    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '20210424');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/style.min.css', array(), '20210424');

    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slick-js'), '20210707', true);
    wp_script_add_data('main-js', 'defer', true);

}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_theme_support('post-thumbnails', array('post', 'page'));
add_theme_support('menus');

function disable_search($query, $error = true)
{
    if (!is_admin() && is_search()) {
        $query->is_search = false;
        $query->query_vars[s] = false;
        $query->query[s] = false;
        // to error
        if ($error == true)
            $query->is_404 = true;
    }
}
add_action('parse_query', 'disable_search');
add_filter('get_search_form', function() { return null; });

add_filter('block_categories', function ($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'kdmining',
                'title' => 'KD Mining',
            ),
        )
    );
}, 10, 2);



function gutenberg_setup()
{

    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('custom-line-height');
    add_theme_support('custom-spacing');


    // Editor Color Palette
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => __('Red', 'en-theme'),
                'slug'  => 'primary',
                'color'    => '#e0281f',
            ),
            array(
                'name'  => __('White', 'en-theme'),
                'slug'  => 'light-500',
                'color'    => '#fff',
            ),
            array(
                'name'  => __('Black', 'en-theme'),
                'slug'  => 'dark-500',
                'color'    => '#050a14',
            ),
            array(
                'name'  => __('Dark Grey', 'en-theme'),
                'slug'  => 'dark-400',
                'color' => '#2a2e37',
            ),
            array(
                'name'  => __('Grey', 'en-theme'),
                'slug'  => 'dark-300',
                'color' => '#43474e',
            ),
            array(
                'name'  => __('Light Grey', 'en-theme'),
                'slug'  => 'dark-200',
                'color' => '#a1a3a6',
            ),
        )
    );

    add_theme_support(
        'editor-gradient-presets',
        array(
            array(
                'name' => __('Black to Dark Grey', 'en-theme'),
                'slug' => 'black-grey',
                'gradient' => 'linear-gradient(180deg, #050a14 0%, #2a2e37 100%)'
            )
        )
    );

    add_theme_support('editor-font-sizes', array(
        array(
            'name' => esc_attr__('Small', 'themeLangDomain'),
            'size' => 12,
            'slug' => 'small'
        ),
        array(
            'name' => esc_attr__('Regular', 'themeLangDomain'),
            'size' => 13.3,
            'slug' => 'regular'
        ),
        array(
            'name' => esc_attr__('Medium', 'themeLangDomain'),
            'size' => 14.6,
            'slug' => 'medium'
        ),
        array(
            'name' => esc_attr__('Large', 'themeLangDomain'),
            'size' => 18.6,
            'slug' => 'large'
        ),
        array(
            'name' => esc_attr__('Extra Large', 'themeLangDomain'),
            'size' => 26.6,
            'slug' => 'extra-large'
        ),
    ));
}
add_action('after_setup_theme', 'gutenberg_setup');

add_action('enqueue_block_editor_assets', 'en_add_gutenberg_assets');

function en_add_gutenberg_assets()
{
    wp_enqueue_style('en-gutenberg', get_theme_file_uri('css/editor-styles.css'), array(), '20210707');
    wp_enqueue_script(
        'en-editor',
        get_stylesheet_directory_uri() . '/lib/js/editor.js',
        array('wp-blocks', 'wp-dom', 'wp-rich-text'),
        '20210707',
        true
    );
}
