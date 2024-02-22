<section id="inheritance-05" class="com-sec-01">
	<div class="uk-container">
		<div class="inner">
			<?php $title = is_parent_slug('inheritance') ? get_parent_title('inheritance') : get_the_title(); ?>
			<h3 class="tit uk-text-center"><?= $title; ?>の相談事例と手続</h3>
<?php
$term_slug = is_parent_slug('inheritance') ? get_parent_slug('inheritance') : $post->post_name;
$case_post = [
	'post_type' => 'case',
	'posts_per_page' => 4,
	'tax_query' => array(
		array(
			'taxonomy'         => 'case-cat',
			'field'            => 'slug',
			'terms'            => $term_slug
		)
	)
];
$case_query = new WP_Query($case_post);
if ($case_query->have_posts()) :
?>
			<ul class="uk-child-width-1-2@m uk-grid-match com-grid-30 com-mt-s" uk-grid>
<?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
				<li><div class="item">
					<span class="cat">事例</span>
					<p><?php the_omission(str_replace(array("\r\n","\r","\n"), '', get_the_title())); ?></p>
					<a href="<?php the_permalink(); ?>" class="com-btn-01">続きを読む</a>
				</div></li>
<?php endwhile; ?>
			</ul>
<?php endif; wp_reset_postdata(); ?>
<?php if ($case_query->max_num_pages > 1): // 2ページ目がある場合に表示する ?>
			<a href="<?= home_url('/'); ?>case-cat/<?= $term_slug; ?>" class="btn com-mt-1em"><?= $title; ?>の相談事例と手続</a>
<?php endif; ?>
		</div>
	</div>
</section>