<?php get_header(); ?>
<main>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$page_slug = $post->post_name;
		if ( locate_template( 'pages/' . $page_slug . '.php' ) !== '' ) {
			// あったのでページテンプレートを読み込む
			get_template_part( 'pages/' . $page_slug );
		} else {
			// なかったのでページの本文を読み込む
			if (function_exists('is_editor_type')) {
				if (is_editor_type('block')) {
					echo '<div class="block-editor">';
					the_content();
					echo '</div><!-- /.block-editor -->';
				} else {
					the_content();
				}
			}
			else {
				the_content();
			}
		}
	}
}
?>
</main>
<?php get_footer(); ?>
