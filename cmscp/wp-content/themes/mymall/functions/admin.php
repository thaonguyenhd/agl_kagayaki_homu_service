<?php
// お客様アカウントの管理画面のメニュー調整
function user_remove_menus() {
  $current_user = wp_get_current_user();
  if ( current_user_can( 'author' ) || current_user_can( 'editor' ) ) { //投稿者編集者ならコメントを非表示
    remove_menu_page( 'edit-comments.php' ); // コメント
    remove_menu_page( 'wpcf7' ); // CF7
    remove_menu_page( 'tools.php' ); // ツール
  }
}
add_action('admin_menu', 'user_remove_menus');

// SVGファイルアップロード可能にする
function custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_types' );
