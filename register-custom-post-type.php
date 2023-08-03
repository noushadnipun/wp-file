<?php
register_post_type('post_type_slug', array( // changeable
    'labels' => array(
        'name' => 'Custom Post Type Name', // changeable
        'add_new_item' => 'Add New Service', // changeable
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set Featured Image',
        'media_buttons' => true,
    ),
    'public' => true,
    'show_in_menu' => true,
    'menu_position' => 2,
    'has_archive' => false,
    'menu_icon' => 'dashicons-admin-home',
    //    'rewrite' => false,
    'rewrite' => array('slug' => '', 'with_front' => false),
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
));
