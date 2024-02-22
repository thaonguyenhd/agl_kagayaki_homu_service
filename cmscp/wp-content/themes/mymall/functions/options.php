<?php
if( function_exists('acf_add_options_page') ) {
	$option_page = acf_add_options_page(array(
		'page_title' => '管理',
		'menu_title' => '管理',
		'menu_slug' => 'my-managed',
		'capability' => 'edit_posts',
		'update_button' => '更新',
		'redirect' => false,
		'updated_message' => '更新しました',
		'autoload' => true,
	));
}