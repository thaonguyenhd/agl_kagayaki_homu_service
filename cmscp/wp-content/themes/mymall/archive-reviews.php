<?php get_header(); ?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/information/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit">クチコミ一覧</h1>
			<span class="text">Reviews</span>
		</div>
	</div>
	<div id="info-01" class="com-sec-01">
		<div class="uk-container">
<?php if ( have_posts() ): ?>
			<ul class="uk-child-width-1-3@l uk-child-width-1-2@s uk-grid-match com-mt-m uk-grid" uk-grid>
<?php while ( have_posts() ): the_post(); ?>
				<li>
					<?php $infor = get_field('infor'); ?>
					<div class="inheritance-panel-01 reviews-panel-01">
						<h4 class="type"><?= $infor['type-service'] ?></h4>
						<div class="head uk-grid-small uk-flex-middle uk-flex-between" uk-grid>
							<div>
								<div class="form-range-01">
									<input type="range" value="<?= $infor['rating'] ?>" min="1" max="5" disabled>
								</div>
							</div>
							<div>
								<time class="date" datetime="<?= get_the_date('Y.m.d') ?>"><?= get_the_date('Y.m.d') ?></time>
							</div>
						</div>
						<ul class="infor">
							<li class="prefectures"><?= $infor['prefectures'] ?></li>
							<li class="age"><?= $infor['age'] ?></li>
						</ul>
						<p><?= the_content() ?></p>
					</div>
				</li>
<?php endwhile; ?>
			</ul>
			<?php get_template_part( 'parts/pagination' ); ?>
<?php endif; ?>
		</div>
	</div><!-- /#info-01 -->
</main>
<?php get_footer(); ?>
