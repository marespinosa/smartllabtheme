<?php
// Add Your Menu Locations
function register_my_menus()
{
    register_nav_menus(
        array(
            'main_nav' => __('Main nav'),
            'footer_nav' => __('Footer navigation'),
        )
    );
}
add_action('init', 'register_my_menus');
