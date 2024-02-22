<?php get_header(); ?>
<main>
<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
	<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/information/kv.jpg" alt=""></figure>
	<div class="detail uk-container">
		<div class="tit">お知らせ</div>
		<span class="text">INFORMATION</span>
	</div>
</div>

<?php if ( have_posts() ): ?>
<section id="single-01" class="com-sec-01">
	<div class="uk-container">
<?php while ( have_posts() ): the_post(); ?>
		<h1 class="com-tit-04"><?php the_title(); ?> </h1>
		<ul class="uk-grid-small" uk-grid>
			<li><time datetime="<?= get_the_date('Y-m-d') ?>" class="data"><?= get_the_date('Y.m.d') ?></time></li>
		</ul>
		<div class="single-info com-mt-m">
			<?php the_content(); ?>
		</div>
<?php endwhile; ?>
		<div class="single-nav">
			<div class="prev"><?php previous_post_link('%link', '前の記事'); ?></div>
			<div class="back"><a href="<?= get_post_type_archive_link( $post->post_type ); ?>" class="index">一覧</a></div>
			<div class="next"><?php next_post_link('%link', '次の記事'); ?></div>
		</div>
	</div>
</section><!-- /.single-01 -->
<?php endif; ?>

</main>
<?php get_footer(); ?>
