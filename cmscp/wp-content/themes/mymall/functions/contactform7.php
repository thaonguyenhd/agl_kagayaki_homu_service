<?php
// contact、inquiry、entry ページのみ Contact Form 7 のスクリプト／スタイルを読み込む.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

function get_form_page_slug(){
  $form_page_slug = array( 'contact', 'inquiry', 'reservation', 'entry', 'review-form');
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
		//type-service
		if($scanned_tag['name'] == 'type-service'){

			foreach(get_field_object('field_65d83e778c5a5') ["choices"] as $i) {
				$scanned_tag['values'][] = $i;
				$scanned_tag['labels'][] = $i;
			}
			
		}
		//age
		if($scanned_tag['name'] == 'age'){

			foreach(get_field_object('field_65d83f118c5a7') ["choices"] as $i) {
				$scanned_tag['values'][] = $i;
				$scanned_tag['labels'][] = $i;
			}
		}

		//prefectures
		if($scanned_tag['name'] == 'prefectures'){

			foreach(get_field_object('field_65d83f8e8c5a8') ["choices"] as $i) {
				$scanned_tag['values'][] = $i;
				$scanned_tag['labels'][] = $i;
			}
		}

		//rating
		if($scanned_tag['name'] == 'rating'){

			//reorder the array
			$option = array_reverse(get_field_object('field_65d84210ab14d') ["choices"]);

			foreach($option as $i) {
				$scanned_tag['values'][] = $i;
				$scanned_tag['labels'][] = $i;
			}
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
		
		$type_service = $posted_data['type-service']; 
		$customer_age = $posted_data['age'];
		$prefectures = $posted_data['prefectures'];
		$rating = $posted_data['rating'];
		$comment = $posted_data['comment'];
					
		$new_post = array(
			'post_type' => 'reviews',
			'post_title' => $rating[0].'/5★',
			'post_content' => $comment,
			'post_status' => 'draft',
			'post_author' => 2
		);

		$post_id = wp_insert_post( $new_post );

		if(is_wp_error( $post_id )) {
			$errMsg = "レビューの送信に失敗しました。数分後にもう一度お試しください。";

			$submission->set_response($cf7->message('validation_failed'));
			$submission->set_response($cf7->filter_message($errMsg));

			return;
		}

		update_field('reviews_type',$type_service,$post_id);
		update_field('reviews_age',$customer_age,$post_id);
		update_field('reviews_pref',$prefectures,$post_id);
		update_field('reviews_rating',$rating,$post_id);
			
		 // Do my code with this name
		 $changed_name = get_admin_url().'/post.php?post='.$post_id.'&action=edit';
 
		 // Got e-mail text
		 $mail = $contact_form->prop( 'mail' );
 
		 // Replace "[new_review]" field inside e-mail text
		 $new_mail = str_replace( '[new_review]', $changed_name, $mail );
 
		 // Set
		 $contact_form->set_properties( array( 'mail' => $new_mail ) );
		 
		 return $contact_form;
	}
}