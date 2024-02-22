<?php get_header(); ?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/case/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit">相談事例と手続</h1>
			<span class="text">example & procedure</span>
		</div>
	</div>
<?php
	$case_cats = get_terms(array('taxonomy' => 'case-cat', 'orderby' => 'menu_order'));
?>
	<section id="case-01" class="com-sec-01 pb20">
		<div class="uk-container">
			<h2 class="com-tit-03">事例をもとに司法書士のコメントと<br class="uk-visible@s">お客様の声をご紹介</h2>
<?php if ($case_cats) : ?>
			<ul class="uk-child-width-1-3@m uk-child-width-1-2@s com-grid-02 com-mt-l" uk-grid>
<?php foreach ($case_cats as $case_cat) : ?>
				<li><a href="#case-archive-<?= $case_cat->term_id; ?>" class="com-btn-02" uk-scroll="offset: 147"><?= $case_cat->name; ?></a></li>
<?php endforeach; ?>
			</ul>
<?php endif; ?>
		</div>
	</section>

<?php if ($case_cats) : ?>
<?php foreach ($case_cats as $key => $case_cat) : $count = $key + 1; ?>
	<section id="case-archive-<?= $case_cat->term_id; ?>" class="com-sec-01 <?php if($count % 2 === 0) { echo 'com-bg-01';} ?>">
		<div class="uk-container">
			<h3 class="com-tit-04 mb15"><?= $case_cat->name; ?>の相談事例と手続</h3>
<?php 
$case_post = [
	'post_type' => 'case',
	'posts_per_page' => 5,
	'tax_query' => array(
		array(
			'taxonomy'         => 'case-cat',
			'field'            => 'term_id',
			'terms'            => $case_cat->term_id
		)
	)
];
$case_query = new WP_Query($case_post);
if ($case_query->have_posts()) :
?>
			<ul>
<?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" class="info-btn-02">
					<span class="cat">相談事例</span>
<?php if(get_field( "case_detail" )) : ?>
					<p class="tit"><?php the_field( "case_detail" ); ?></p>
<?php endif; ?>
				</a></li>
<?php endwhile; ?>
			</ul>
<?php if ($case_query->max_num_pages > 1): // 2ページ目がある場合に表示する ?>
			<a href="<?= get_term_link($case_cat) ?>" class="com-btn-01 com-mt-s">すべて見る</a>
<?php endif; ?>
<?php endif; wp_reset_postdata(); ?>
		</div>
	</section>
<?php endforeach; ?>
<?php endif; ?>
</main>
<?php get_footer(); ?>
