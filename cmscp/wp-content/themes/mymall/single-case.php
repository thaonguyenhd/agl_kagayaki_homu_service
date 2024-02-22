<?php 
	get_header(); 
	$taxonomy = get_the_terms( $post->ID , 'case-cat' );
?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/case/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit"><?= $taxonomy[0]->name; ?>の<br>相談事例と手続</h1>
			<span class="text">example & procedure</span>
		</div>
	</div>
	<?php if ( have_posts() ): ?>
	<section id="single-01" class="com-sec-01">
		<div class="uk-container">
			<?php while ( have_posts() ): the_post(); ?>
				<?php if(get_field( "case_detail" )) : ?>
				<h2 class="com-tit-05"><?php the_field( "case_detail" ); ?></h2>
				<?php endif; ?>
				<?php if(get_field( "case_comment" )) : ?>
				<div class="com-mt-m">
					<h3 class="case-tit-02">担当司法書士のコメント</h3>
					<div class="com-grid-30" uk-grid>
						<div class="uk-flex-1"><?php the_field( "case_comment" ); ?></div>
						<?php if(get_field( "case_img" )) : ?>
						<div class="uk-width-auto@m uk-width-1-1 uk-text-center case-img-01"><img src="<?= get_field( "case_img" )['sizes']['medium']; ?>" alt></div>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if(get_field( "case_voice" )) : ?>
				<div class="com-mt-m">
					<h3 class="case-tit-02">お客様の声</h3>
					<div><?php the_field( "case_voice" ); ?></div>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<div class="com-mt-m">
				<div class="single-nav">
					<div class="prev"><?php previous_post_link('%link', '前の記事'); ?></div>
					<div class="back"><a href="<?= get_post_type_archive_link( $post->post_type ); ?>" class="index">一覧</a></div>
					<div class="next"><?php next_post_link('%link', '次の記事'); ?></div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>