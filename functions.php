<?php

function enqueue_styles() {
    wp_enqueue_style( 'general', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_scripts() {
  if(is_page(47) or is_page(49) or is_page(51) or is_page(60) or is_page('contacts')){
    wp_enqueue_script( 'request', get_template_directory_uri() . '/js/request.js' );
  }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

add_theme_support('menus');
add_theme_support('post-thumbnails');

function filter_ptags_on_images($content) {
  $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images');
add_filter('the_content', 'filter_ptags_on_images');