<?php

$content_width = null;


add_action( 'wp_enqueue_scripts', 'eactheme_enqueue_scripts' );
add_action( 'widgets_init', 'eactheme_widgets_init' );

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
