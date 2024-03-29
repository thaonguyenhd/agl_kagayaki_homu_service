<?php get_header(); ?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/debts/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit">クチコミ一覧</h1>
			<span class="text">Reviews</span>
		</div>
	</div>
	<div id="info-01" class="com-sec-01">
		<div class="uk-container">
			<h2 class="com-tit-03">お客様によるクチコミをご紹介</h2>
			<?php if ( have_posts() ): ?>
			<ul class="uk-child-width-1-2@s uk-grid-match com-mt-l uk-grid" uk-grid>
			<?php while ( have_posts() ): the_post(); ?>
				<li>
					<div class="inheritance-panel-01 review-panel-01">
						<div class="head">
							<div>
								<img src="<?= get_theme_file_uri() ?>/img/common/ico_user.svg" alt="" width="90" class="image">
							</div>
							<div>
								<?php if(!empty(get_field('reviews_rating'))): ?>
								<div class="com-rating-01">
									<?php
										$rating = get_field('reviews_rating');
										$gray_star = 5 - $rating;
									?>
									<span>
										<?php for($i = 1; $i <= $rating; $i++): ?>
										★
										<?php endfor; ?>
									</span>
									<?php 
										if($gray_star > 0):
										for($i = 1; $i <= $gray_star; $i++): ?>
										★
									<?php endfor;endif; ?>
								</div>
								<?php endif; ?>
								<ul class="infor uk-grid-small" uk-grid>
									<li>相談者年齢：<?= get_field('reviews_age') ?></li>
									<li>依頼地域：<?= get_field('reviews_pref') ?></li>
								</ul>
							</div>
						</div>
						<?php if(!empty(get_field('reviews_type'))): ?>
						<ul class="type uk-flex uk-flex-wrap">
							<?php foreach(get_field('reviews_type') as $i): ?>
							<li>
								<span><?= $i ?></span>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
						<p><?php the_content() ?></p>
						<div class="uk-text-right mt10">
							<time datetime="<?= get_the_date('Y/m/d') ?>" class="date">
								<?= get_the_date('Y年n月j日掲載') ?>
							</time>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php get_template_part( 'parts/pagination' ); ?>
			<?php endif; ?>
		</div>
	</div><!-- /#info-01 -->
	<?php get_template_part( 'parts/case-part' ); ?>
</main>
<?php get_footer(); ?>
