<?php
// ブロックエディター側でファイルの読み込みを行う
add_action( 'enqueue_block_editor_assets', function() {
  // load uikit JS 読み込み
  wp_enqueue_script( 'uikit', esc_url( get_theme_file_uri( 'js/uikit.min.js' )), array(), '20200703', true );
	// ブロックエディターのCSSを読み込まない
	wp_dequeue_style( 'wp-block-library' );
});

function wpdocs_theme_add_editor_styles() {
	// load uikit CSS 読み込み
  add_editor_style( 'css/uikit.min.css' );
  // load layout.css 読み込み
  add_editor_style( 'css/block-editer.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
 * 投稿のエディタータイプを取得する
 *
 * @return string エディタータイプを出力する block:ブロックエディター classic:クラシックエディター
 */
function get_editor_type() {
	// オプションで初期エディターをどちらに設定しているか
	$editor_replace = get_option( 'classic-editor-replace' );
	// ユーザー側でエディターを変更可能にしているかどうか
	$editor_allow_users = get_option( 'classic-editor-allow-users' );
	// $postに設定されているエディター
	$post_editor_type = get_post_meta( 'classic-editor-remember' );

	if ( $editor_allow_users === 'allow' ) {
		if ( $post_editor_type === 'block-editor' ) {
			$return = 'block';
		} elseif ( $post_editor_type === 'classic-editor' ) {
			$return = 'classic';
		}
	}
	$return = $return ?? $editor_replace;
	return $return;
}

/**
 * 投稿のエディターが指定のエディターかどうか判別する
 *
 * @param string $type 'block' or 'classic'
 * @return bool
 */
function is_editor_type( $type ) {
	return get_editor_type() === $type ? true : false;
}
