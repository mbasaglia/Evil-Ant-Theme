<?php

add_action( 'wp_enqueue_scripts', 'eactheme_enqueue_scripts' );
add_action( 'widgets_init', 'eactheme_widgets_init' );
add_action( 'wp_head', 'eactheme_head' );

add_filter( 'wp_nav_menu_objects', 'eactheme_filter_menu');

function eactheme_enqueue_scripts()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	//wp_enqueue_style( 'eac-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

function eactheme_widgets_init() 
{
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'sidebar-footer',
		'description'   => 'Appears in the footer section of the site.',
		'before_title'  => '<span class="footer-title">',
		'after_title'   => '</span>',
	));
}

function eactheme_head()
{
	echo '<link rel="icon" type="image/png" href="'.
		get_stylesheet_directory_uri().'/img/eacon.png" />';
}

// Removes private pages (and their children) from menus
function eactheme_filter_menu( $sorted_menu_items )
{
	if ( in_array( 'administrator', (array) wp_get_current_user()->roles ) )
		return $sorted_menu_items;
		
	$output = array();
	$menuitem_is_private = array();
	foreach ( $sorted_menu_items as $item )
	{
		$page = WP_Post::get_instance($item->object_id);
		if ( ($page && $page->post_status == 'private') ||
			 ($item->menu_item_parent && $menuitem_is_private[$item->menu_item_parent]) )
			$menuitem_is_private[$item->ID] = true;
		else
			$output []= $item;
	}
	
	return $output;
}
