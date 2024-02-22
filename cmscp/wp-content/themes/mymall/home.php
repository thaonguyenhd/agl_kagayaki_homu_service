<?php get_header(); ?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/information/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit">お知らせ</h1>
			<span class="text">INFORMATION</span>
		</div>
	</div>
	<div id="info-01" class="com-sec-01">
		<div class="uk-container">
<?php if ( have_posts() ): ?>
			<ul class="info-list-01">
<?php while ( have_posts() ): the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" class="info-btn-01">
					<time datetime="<?= get_the_date('Y-m-d') ?>" class="data"><?= get_the_date('Y.m.d') ?></time>
					<span class="tit"><?php the_title(); ?></span>
				</a></li>
<?php endwhile; ?>
			</ul>
			<?php get_template_part( 'parts/pagination' ); ?>
<?php endif; ?>
		</div>
	</div><!-- /#info-01 -->
</main>
<?php get_footer(); ?>
