<?php
add_filter('post_type_link', 'generateCustomPostLink', 1, 2);
add_filter('rewrite_rules_array', 'addRewriteRules');

function generateCustomPostLink($link, $post)
{
  if ($post->post_type === 'case') {
    // 投稿IDに書き換えたパーマリンク文字列を返す
    return home_url('/case/post' . $post->ID);
  } else {
    return $link;
  }
}
function addRewriteRules($rules)
{
  // 書き換えたパーマリンクに対応したクエリルールを追加
  $new_rule = array(
    'case/post([0-9]+)/?$' => 'index.php?post_type=case&p=$matches[1]',
  );
  // ルール配列に結合
  return $new_rule + $rules;
}
