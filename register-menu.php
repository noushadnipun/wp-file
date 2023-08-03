<?php
// Include to functions.php

//Register Nav Menu
register_nav_menus(array(
    'header_menu' => __('Header Menu', ''),
));

function buildTree($elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element->menu_item_parent == $parentId) {
            $children = buildTree($elements, $element->ID);
            $element->id = $element->ID;
            if ($children)
                $element->children = $children;

            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
};

function load_menu($menu_name)
{
    $menu_name = $menu_name; //'primary';
    $locations = get_nav_menu_locations();
    //Get the id of 'primary_menu'
    $menu_id = $locations[$menu_name];
    //Returns a navigation menu object.
    $menuObject = wp_get_nav_menu_object($menu_id);
    // Retrieves all menu items of a navigation menu.
    $current_menu = $menuObject->slug;
    // $array_menu = wp_get_menu_array($current_menu);
    $array_menu = buildTree(wp_get_nav_menu_items($current_menu));
    return  $array_menu;
}

/**
 * use in frontend
 * load_menu('menu_id');
 * @ return Array 
 */
