<?php

function enqueue_styles() {
    wp_enqueue_style( 'general', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_scripts() {
  if(is_page('events')){
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js' );
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