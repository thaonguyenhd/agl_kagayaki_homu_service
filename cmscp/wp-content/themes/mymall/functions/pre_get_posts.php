<?php
function pre_post_order ( $query ) {
  // 管理画面は除外
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  // 投稿アーカイブ
  if ( $query->is_tax( 'case-cat' ) ) {
    $query->set( 'posts_per_page', -1 );
  }
}

add_action( 'pre_get_posts', 'pre_post_order' );
