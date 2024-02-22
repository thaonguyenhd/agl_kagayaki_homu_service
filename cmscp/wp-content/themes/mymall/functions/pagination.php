<?php
/**
 * ページング
 */
function pagination($q = '', $pages = '', $range = 1) {
  global $paged;
  global $wp_query;

  $showitems = ($range * 2) + 1;

  if(empty($paged)) $paged = 1;

  if($pages == '') {
    $pages = ($q == '') ? $wp_query->max_num_pages : $q->max_num_pages;
    if(!$pages) $pages = 1;
  }

  if ($pages > 1) {
    echo paginate_links(array(
      // 'base' => get_bloginfo('url') . '/information%_%',
      // 'format' => '/%#%/',
      'current'   => max(1, $paged),
      'prev_text' => '<i class="fas fa-chevron-left"></i>', //「前へ」のテキスト。
      'next_text' => '<i class="fas fa-chevron-right"></i>', //「次へ」のテキスト
      'type'      => 'list',
      'total'     => $pages,
    ));
  }
}
