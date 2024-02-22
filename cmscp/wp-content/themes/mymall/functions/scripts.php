<?php
/**
 * Control the CSS and scripts loaded into wp_head
 * wp_head に読み込まれるCSSとスクリプトを制御
 */
function custom_scripts() {
  // Do not load block editor CSS
	// ブロックエディターのCSSを読み込まない
	wp_dequeue_style( 'wp-block-library' );
  // load uikit CSS 読み込み
  wp_enqueue_style( 'uikit', esc_url( get_theme_file_uri( 'css/uikit.min.css' )), '', '' );
  // load layout.css 読み込み
  wp_enqueue_style( 'layout', esc_url( get_theme_file_uri( 'css/layout.css' )), 'uikit', '20200703' );
  // load uikit JS 読み込み
  wp_enqueue_script( 'uikit', esc_url( get_theme_file_uri( 'js/uikit.min.js' )), array(), '20200703', true );
	// load font awesome 読み込み
	wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/691b7d2716.js', array(), '', true );
  // load script JS 読み込み
  wp_enqueue_script( 'script', esc_url( get_theme_file_uri( 'js/script.js' )), array(), '20200703', true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );


/**
 * Adjusting fontawesome tags
 * fontawesome のタグの調整
 */
function custom_fontawesome($tag, $handle) {
  if ( $handle !== 'fontawesome' ) {
    return $tag;
  }
  return str_replace('></script>', ' crossorigin="anonymous"></script>', $tag);
}
add_filter('script_loader_tag', 'custom_fontawesome', 10, 2);
