<?php
function get_parent_slug() {
  global $post;
  if ( $post->post_parent ) {
    $post_data = get_post( $post->post_parent );
    return $post_data->post_name;
  }
  return false;
}

function get_parent_title() {
  global $post;
  if ( $post->post_parent ) {
    $post_data = get_post( $post->post_parent );
    return $post_data->post_title;
  }
  return false;
}


function is_parent_slug( $slug = '' ) {
  $current_slug = get_parent_slug();
  if ( is_string($slug) ) {
    if ( $current_slug === $slug ) {
      return true;
    }
  } elseif ( is_array($slug) ) {
    if ( in_array( $current_slug, $slug, true ) ) {
      return true;
    }
  }

  return false;
}


/**
 * 該当ファイルのサーバの更新日を取得してGETパラメータを作成する
 *
 * @param string $file WPテーマファイルからのファイルパス（/から始まる）
 * @return string バージョンパラメータ
 */
function get_file_ver( $file = '' ) {
	$filename = $file ? get_template_directory() . $file : '';
	if($filename) {
		/* after wp ver5.3 */
		if (function_exists('wp_date')) {
			$filemtime = $filename ? wp_date("Ymd-Hi", filemtime($filename)) : '';
		}
		/* before wp ver5.3 */
		else {
			$filemtime = $filename ? date_i18n("Ymd-Hi", filemtime($filename) + get_option( 'gmt_offset' ) * HOUR_IN_SECONDS) : '';
		}
	}
	return $filemtime ? '?ver='.$filemtime : '';
}

/**
 * 該当ファイルのサーバの更新日を取得してGETパラメータを付与する
 *
 * @param string $file WPテーマファイルからのファイルパス（/から始まる）
 * @return string バージョンパラメータを出力
 */
function the_file_ver( $file = '' ) {
	echo get_file_ver($file);
}

/**
 * 該当ファイルのフルパスとバージョンパラメータを合わせたパスを取得する
 *
 * @param string $file WPテーマファイルからのファイルパス（/から始まる）
 * @return string 該当ファイルパス+バージョンパラメータのURL
 */
function get_file_path_ver( $file = '' ) {
	$file_path = $file ? get_template_directory_uri().$file : '';
	$file_ver = get_file_ver($file);
	return $file_path . $file_ver;
}

/**
 * 該当ファイルのフルパスとバージョンパラメータを合わせたパスを出力する
 *
 * @param string $file WPテーマファイルからのファイルパス（/から始まる）
 * @return string 該当ファイルパス+バージョンパラメータのURL
 */
function the_file_path_ver( $file = '' ) {
	echo get_file_path_ver($file);
}

/**
 * 該当ファイルのフルパスとバージョンパラメータを合わせたパスを出力するショートコード用
 *
 * @param array $atts WPテーマファイルからのファイルパス（/から始まる）
 * @return string 該当ファイルパス+バージョンパラメータのURL
 *
 * [file_path_ver src='/img/...jpg']
 */
function file_path_ver_func( $atts ) {
	$file = shortcode_atts( array(
		'src' => '',
	), $atts );

	return get_file_path_ver($file[src]);
}
add_shortcode( 'file_path_ver', 'file_path_ver_func' );

function my_part_include($params = array()) {
	extract(shortcode_atts(array('file' => 'default'), $params));
	ob_start();
	include(STYLESHEETPATH . "/$file.php");
	return ob_get_clean();
}
add_shortcode('get_part', 'my_part_include');

function the_omission( $txet ) {
	$max_n = 30;
	if ( mb_strlen( $txet ) > $max_n ) {
		$txet = mb_substr( $txet, 0, $max_n );
		echo $txet . '...';
	} else {
		echo $txet;
	}
}