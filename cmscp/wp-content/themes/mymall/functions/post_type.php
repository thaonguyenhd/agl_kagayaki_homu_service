<?php
// 相談事例を投稿した際に相談内容に記述した内容をタイトルに自動で入れる。
function add_case_title($data , $postarr) {
	global $post;

	if (isset($postarr['acf'])) {
		// 相談事例の投稿で、相談内容に記述があった場合、
		if( $data['post_type'] === 'case' && isset($data['post_type']) && $postarr['acf']['field_64789351f2c41'] ){
			// タイトルに何も記入がなかった場合もしくは、タイトルと相談内容に差異があった場合に、タイトルを自動変更
			if ( $data['post_title'] === '' || $data['post_title'] !== $postarr['acf']['field_64789351f2c41'] ) {
				$title = wp_strip_all_tags($postarr['acf']['field_64789351f2c41']);
				$data['post_title'] = $title;
			}
		}	
	}
	return $data;
}
add_filter( 'wp_insert_post_data' , 'add_case_title' , '99', 2 );
