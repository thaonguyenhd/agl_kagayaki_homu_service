<?php
// WordPressの絵文字削除
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// WordPressバージョン情報の削除
remove_action( 'wp_head', 'wp_generator' );
// ショートリンクURLの削除
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
// wlwmanifestの削除
remove_action( 'wp_head', 'wlwmanifest_link' );
// application/rsd+xmlの削除
remove_action( 'wp_head', 'rsd_link' );
// コメントフィードを削除
remove_action('wp_head', 'feed_links_extra', 3);


function setup_my_theme() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'script', 'style' ) );
}
add_action( 'after_setup_theme', 'setup_my_theme');


function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


// URLに`wp/v2/users/`が含まれていた場合トップページにリダイレクト
function disable_users_query() {
  if( preg_match('/wp\/v2\/users/i', $_SERVER['REQUEST_URI'])  || preg_match('/wp\/v2\/users/i', $_SERVER['QUERY_STRING']) ){
    wp_redirect( home_url() );
    exit;
  }
}
add_action('init', 'disable_users_query');

// ユーザーページにアクセスするとトップページにリダイレクト
function disable_author_archive() {
  if( isset( $_GET['author'] ) || preg_match( '#/author/.+#', $_SERVER['REQUEST_URI'] ) ){
		wp_redirect( home_url() );
    exit;
  }
}
add_action('init', 'disable_author_archive');
