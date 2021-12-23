<?php

//Add options page to ACF
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'  => 'Global content',
        'menu_title'  => 'Global content',
        'menu_slug'   => 'global_content'
    ));
}

function register_acf_block_types()
{

    acf_register_block_type(array(
        'name'              => 'slider-block',
        'title'             => __('Slider Block'),
        'description'       => __('Slider for testimonials'),
        'render_template'   => 'blocks/acf-slider-block.php',
        'category'          => 'kdmining',
        'icon'              => 'businessperson',
        'keywords'          => array('Slider', 'KD'),
        'supports'			=> array(
            'mode'              => false,
            '__experimental_jsx' => true,
            'jsx' => true,
            'color'	=> [ 'gradients' => true ],
            
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'popup-block',
        'title'             => __('Popup Block'),
        'description'       => __('Video popup block'),
        'render_template'   => 'blocks/acf-video-popup-block.php',
        'category'          => 'kdmining',
        'icon'              => 'businessperson',
        'keywords'          => array('Video', 'Popup', 'KD'),
        'supports'			=> array(
            'mode'              => false,
            '__experimental_jsx' => true,
            'jsx' => true,            
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'popup-button-block',
        'title'             => __('Popup Button Block'),
        'description'       => __('Video popup button block'),
        'render_template'   => 'blocks/acf-video-popup-button-block.php',
        'category'          => 'kdmining',
        'icon'              => 'businessperson',
        'keywords'          => array('Video', 'Popup', 'KD'),
        'supports'			=> array(
            'mode'              => false,
            '__experimental_jsx' => true,
            'jsx' => true,            
        ),
        'parent'            => array('kdmining/popup-block')
    ));

    acf_register_block_type(array(
        'name'              => 'popup-panel-block',
        'title'             => __('Popup Panel Block'),
        'description'       => __('Video popup panel block'),
        'render_template'   => 'blocks/acf-video-popup-panel-block.php',
        'category'          => 'kdmining',
        'icon'              => 'businessperson',
        'keywords'          => array('Video', 'Popup', 'KD'),
        'supports'			=> array(
            'mode'              => false,
            '__experimental_jsx' => true,
            'jsx' => true,            
        ),
        'parent'            => array('kdmining/popup-block')
    ));

}

// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}
