<?php
// contact、inquiry、entry ページのみ Contact Form 7 のスクリプト／スタイルを読み込む.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

function get_form_page_slug(){
  $form_page_slug = array( 'contact', 'inquiry', 'reservation', 'entry', 'reviews-form');
  return $form_page_slug;
}

function cf7_enqueue_scripts_and_styles(){
	if ( is_page( get_form_page_slug()  ) ) {
		wp_enqueue_script( 'yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), null, true );
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
		}
		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
}
add_action( 'wp_enqueue_scripts', 'cf7_enqueue_scripts_and_styles');


// Redirect to Thanks page
// サンクスページへ遷移するためのコード
function cf7_thanks_redirect() {
	if ( is_page( get_form_page_slug() ) ) {
		$tag = "document.addEventListener( 'wpcf7mailsent', function( event ) {
	location = '". get_post( get_the_ID() )->post_name ."/thanks'; }, false );";
		wp_add_inline_script('script', $tag, 'after');
	}
}
add_action( 'wp_enqueue_scripts', 'cf7_thanks_redirect');


/**
* WP Contact Form 7でメールの確認を行う.
* emailは email / email_confirm 共に必須項目なので、
* wpcf7_validate_email フィルターは不要.
*/
add_filter( 'wpcf7_validate_email*', function( $result, $tag ) {
	$type = $tag['type']; // email*
	$name = $tag['name']; // email / email_confirm
	$_POST[$name] = trim( strtr( (string) $_POST[$name], '\n', ' ' ) );
	if ( 'email' == $type || 'email*' == $type ):
		if (preg_match('/(.*)-confirm$/', $name, $matches) ):
			$target_name = $matches[1];
			if ( $_POST[$name] != $_POST[$target_name] ):
				if ( method_exists( $result, 'invalidate' ) ):
					$result->invalidate( $tag, '確認用のメールアドレスが一致していません' );
				else:
					$result['valid'] = false;
					$result['reason'][$name] = '確認用のメールアドレスが一致していません';
				endif;
			endif;
		endif;
	endif;
	return $result;
}, 11, 2 );


//Contact Form 7 のカスタマイズ
function filter_wpcf7_form_tag( $scanned_tag, $replace ) {
  if(!empty($scanned_tag)){
    //nameで判別
    if($scanned_tag['name'] == 'desired-job'){
      //カスタム投稿タイプの取得
      global $post;
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'recruitment',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        );
      $customPosts = get_posts($args);
      if($customPosts){
        foreach($customPosts as $post){
          setup_postdata( $post );
          $title = get_the_title();
          //$scanned_tagに情報を追加
          $scanned_tag['values'][] = $title;
          $scanned_tag['labels'][] = $title;
        }
      }
      wp_reset_postdata();
    }
  }
  return $scanned_tag;
};
add_filter( 'wpcf7_form_tag', 'filter_wpcf7_form_tag', 11, 2 );

// Create comment when send mail
add_action( 'wpcf7_before_send_mail', 'add_comment_cf7'); 
function add_comment_cf7( $contact_form ) { 
    $submission = WPCF7_Submission::get_instance();
	$contact_form_id = $contact_form->id;
    if ( $submission && $contact_form_id == 277 ) {
        
        $posted_data = $submission->get_posted_data();
		
        $full_name = $posted_data['full-name']; 
		$type_service = $posted_data['type-service']; 
		$customer_age = $posted_data['age'];
		$prefectures = $posted_data['prefectures'];
		$rating = $posted_data['rating'];
		$comment = $posted_data['comment'];
        // $current_post_id = $submission->get_meta('container_post_id');
        
        $new_post = array(
			'post_type' => 'reviews',
			'post_title' => $rating.'/5スタート - '.$full_name,
			'post_content' => $comment,
			'post_status' => 'draft',
			'post_author' => 2
		);

		$post_id = wp_insert_post( $new_post );

		$data = array(
			'type-service' => $type_service,
			'age' => $customer_age,
			'prefectures' => $prefectures,
			'rating' => $rating,
			'comment' => $comment,
		);
		update_field('infor',$data,$post_id);
    
		// Do my code with this name
		$changed_name = get_edit_post_link($post_id);

		// Got e-mail text
		$mail = $contact_form->prop( 'mail' );

		// Replace "[s2-name]" field inside e-mail text
		$new_mail = str_replace( '[new_review]', $changed_name, $mail );

		// Set
		$contact_form->set_properties( array( 'mail' => $new_mail ) );
		
		return $contact_form;
    }
}