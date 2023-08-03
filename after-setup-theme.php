<?php
function aftertheme_default_functions()
{

    // Add Title Tag
    add_theme_support('title-tag');

    //add_theme_support (title-tag);
    add_theme_support('post-thumbnails');
    add_post_type_support('page', 'excerpt');

    //excerpt
    function excerpt($limit)
    {
        $content = preg_replace("/<img(.*?)>/si", "", get_the_content());
        //$post_content = explode(" " , get_the_content());
        $post_content = explode(" ", $content);
        $less_content = array_slice($post_content, 0, $limit);
        echo implode(" ", $less_content);
    }
    function custom_excerpt_length($length)
    {
        return 20;
    }
    add_filter('excerpt_length', 'custom_excerpt_length', 999);
}
add_action('after_setup_theme', 'aftertheme_default_functions');
