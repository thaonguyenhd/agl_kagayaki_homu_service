<?php get_header(); ?>
<main>
	<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
		<figure class="img"><img src="<?= get_theme_file_uri(''); ?>/img/information/kv.jpg" alt=""></figure>
		<div class="detail uk-container">
			<h1 class="tit">口コミ</h1>
			<span class="text">REVIEWS</span>
		</div>
	</div>
	<div id="info-01" class="com-sec-01">
		<div class="uk-container">
<?php if ( have_posts() ): ?>
			<ul class="uk-child-width-1-2@s uk-grid-match com-mt-m uk-grid" uk-grid>
<?php while ( have_posts() ): the_post(); ?>
<li>
                <div class="inheritance-panel-01 review-panel-01">
                    <div class="head uk-grid-medium" uk-grid>
						<div>
							<img src="<?= get_theme_file_uri() ?>/img/common/ico_user.svg" alt="" width="90" class="image">
						</div>
						<div>
							<div class="form-range-01">
								<input type="range" value="<?= get_field('reviews_rating')??1 ?>" min="1" max="5" disabled>
							</div>
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
							<span>相続手続</span>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
                    <p><?php the_content() ?></p>
					<div class="uk-text-right mt20">
						<time datetime="<?= get_the_date('Y/m/d') ?>" class="date">
							<?= get_the_date('Y年n月j日掲載') ?>
							<!-- 2024年2月15日掲載 -->
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
</main>
<?php get_footer(); ?>
