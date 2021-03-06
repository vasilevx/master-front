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

function admin_enqueue_scripts() {
    if(get_current_screen()->post_type == 'event' && get_current_screen()->base == 'post'){
      wp_enqueue_script( 'event-helper', get_template_directory_uri() . '/js/event-helper.js' );
    }
}
  
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );

add_theme_support('menus');
add_theme_support('post-thumbnails');

function filter_ptags_on_images($content) {
  $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images');
add_filter('the_content', 'filter_ptags_on_images');

function wpcodex_add_excerpt_support_for_cpt() {
    add_post_type_support( 'event', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_cpt' );

function event_excerpt( $args = '' ){
    global $post;

    $default = array(
        'maxchar'   => 350,   // количество символов.
        'text'      => '',    // какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
        // Если есть тег <!--more-->, то maxchar игнорируется и берется все до <!--more--> вместе с HTML
        'autop'     => false,  // Заменить переносы строк на <p> и <br> или нет
        'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'
        'more_text' => 'Читать дальше...', // текст ссылки читать дальше
    );

    if( is_array($args) ) $_args = $args;
    else                  parse_str( $args, $_args );

    $rg = (object) array_merge( $default, $_args );
    if( ! $rg->text ) $rg->text = $post->post_excerpt ?: $post->post_content;
    $rg = apply_filters( 'kama_excerpt_args', $rg );

    $text = $rg->text;
    $text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
    $text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
    $text = trim( $text );

    // <!--more-->
    if( strpos( $text, '<!--more-->') ){
        preg_match('/(.*)<!--more-->/s', $text, $mm );

        $text = trim($mm[1]);

        $text_append = ' <a href="'. get_permalink( $post->ID ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
    }
    // text, excerpt, content
    else {
        $text = trim( strip_tags($text, $rg->save_tags) );

        // Обрезаем
        if( mb_strlen($text) > $rg->maxchar ){
            $text = mb_substr( $text, 0, $rg->maxchar );
            $text = preg_replace('~(.*)\s[^\s]*$~s', '\\1 ...', $text ); // убираем последнее слово, оно 99% неполное
        }
    }

    // Сохраняем переносы строк. Упрощенный аналог wpautop()
    if( $rg->autop ){
        $text = preg_replace(
            array("~\r~", "~\n{2,}~", "~\n~",   '~</p><br ?/>~'),
            array('',     '</p><p>',  '<br />', '</p>'),
            $text
        );
    }

    $text = apply_filters( 'kama_excerpt', $text, $rg );

    if( isset($text_append) ) $text .= $text_append;

    return ($rg->autop && $text) ? "<p>$text</p>" : $text;
}

function get_event_massmedia($id){
    $massmedia_array = [];

    $list = get_post_meta($id, 'event_mass-media', true);

    if (trim($list) === "") return false;

    $massmedia_array = explode(';', $list);

    if (trim($massmedia_array[count($massmedia_array)-1]) === "")
        array_pop($massmedia_array);

    foreach ($massmedia_array as &$item)
        $item = explode(',', $item);

    foreach ($massmedia_array as &$item)
        foreach ($item as &$element)
            $element = trim($element);

    return $massmedia_array;
}

add_image_size('event_thumb', 350 ,350, false);

add_action('save_post_event', 'set_end_date');
function set_end_date($post_id)
{
    if(!get_post_meta($post_id, 'event_end-date', true)){
        remove_action('save_post_event', 'set_end_date');
        update_post_meta($post_id, 'event_end-date', get_post_meta($post_id, 'event_begin-date', true));
        add_action('save_post_event', 'set_end_date');
    }
}