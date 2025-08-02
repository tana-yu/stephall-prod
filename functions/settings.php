<?php


function my_setup()
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_setup' );
