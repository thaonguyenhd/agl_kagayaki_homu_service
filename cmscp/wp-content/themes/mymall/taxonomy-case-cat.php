<?php 
	get_header(); 
	$taxonomy = get_queried_object();
?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/case/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit"><?= $taxonomy->name; ?>の<br>相談事例と手続</h1>
			<span class="text">example & procedure</span>
		</div>
	</div>
<?php if (have_posts()) : ?>
	<section id="category-case-01" class="com-sec-01">
		<div class="uk-container">
			<h2 class="com-tit-03">事例をもとに司法書士のコメントと<br class="uk-visible@s">お客様の声をご紹介</h2>
			<h3 class="com-tit-04 mb15 com-mt-l"><?= $taxonomy->name; ?>の相談事例と手続</h3>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" class="info-btn-02">
					<span class="cat">相談事例</span>
					<?php if(get_field( "case_detail" )) : ?>
					<p class="tit"><?php the_field( "case_detail" ); ?></p>
					<?php endif; ?>
				</a></li>
				<?php endwhile; ?>
			</ul>
			<a href="<?= home_url('/case'); ?>" class="com-btn-01 com-mt-s">相談事例と手続一覧</a>
		</div>
	</section>
<?php endif;?>
</main>
<?php get_footer(); ?>