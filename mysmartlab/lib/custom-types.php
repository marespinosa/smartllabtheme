<?php

function en_custom_type()
{

    register_post_type( 'testimonial', 
		array(
			'labels' => array(
				'name' => 'Testimonials',
				'singular_name' => 'Testimonial',
				'add_new' => 'Add Testimonial',
				'add_new_item' => 'Add New Testimonial',
				'edit' => 'Edit',
				'edit_item' => 'Edit Testimonial',
				'new_item' => 'New Testimonial',
				'view' => 'View Testimonials',
				'view_item' => 'View Testimonial',
				'search_items' => 'Search Testimonials',
			),
			'hierarchical'        => true,
			'supports'            => array( 'title', 'editor' ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_rest'        => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => array( 'slug' => 'testimonial', 'with_front' => false ),
			'menu_icon'           => 'dashicons-format-quote',
			'template'            => array( array( 'core/quote', array( 'className' => 'is-style-large' ) ) ),
			'template_lock'      => 'all',
		)
    );

}
add_action('init', 'en_custom_type');