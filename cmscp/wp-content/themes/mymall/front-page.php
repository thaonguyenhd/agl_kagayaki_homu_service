<?php get_header(); ?>
<main>
	<section id="keyvisual">
		<div class="uk-visible-toggle" tabindex="-1" uk-slideshow="animation: fade; autoplay: true; autoplay-interval: 4000; pause-on-hover: true;">
	        <ul class="uk-slideshow-items">
	            <li>
	                <img class="cover uk-visible@s" src="<?= get_theme_file_uri(''); ?>/img/home/kv_01.jpg" alt="">
	                <img class="cover uk-hidden@s" src="<?= get_theme_file_uri(''); ?>/img/home/kv_01_s.jpg" alt="">
	            </li>
	            <li>
	                <img class="cover uk-visible@s" src="<?= get_theme_file_uri(''); ?>/img/home/kv_02.jpg" alt="">
	                <img class="cover uk-hidden@s" src="<?= get_theme_file_uri(''); ?>/img/home/kv_02_s.jpg" alt="">
	            </li>
	            <li>
	                <img class="cover" src="<?= get_theme_file_uri(''); ?>/img/home/kv_03.jpg" alt="">
	            </li>
	        </ul>
	    </div>
		<div class="info uk-text-center">
			<h1 class="tit">わかりやすい説明と<br>丁寧なサービス</h1>
			<p class="text">Easy-to-understand explanations and attentive service</p>
		</div>
		<?php get_template_part( 'parts/header-notice' ); ?>
	</section>

	<div class="home-panel-01">
		<a href="#home-01" class="scroll uk-visible@m" uk-scroll="offset:100">SCROLL DOWN</a>
		<ul class="list">
			<li><a href="<?= home_url('/'); ?>office/shiga">
				<strong>滋賀事務所</strong><br class="uk-hidden@m">滋賀県草津市野路町683番地 6-203号<br class="uk-hidden@m">＜JR南草津駅 徒歩3分＞
			</a></li>
			<li><a href="<?= home_url('/'); ?>office/osaka">
				<strong>大阪事務所</strong><br class="uk-hidden@m">大阪市北区西天満4丁目3番18号<br class="uk-hidden@m">＜南森町駅 徒歩5分＞
			</a></li>
		</ul>
	</div>

	<section id="home-01">
		<div class="uk-container">
			<p class="home-tit-01">Service</p>
			<h2 class="com-text-01 mt0 uk-text-center">取扱業務</h2>
			<ul class="uk-child-width-1-3@m uk-child-width-1-2 uk-grid-match com-grid-15 com-mt-m" uk-grid>
				<li><a href="<?= home_url('/'); ?>inheritance" class="btn">相続手続</a></li>
				<li><a href="<?= home_url('/'); ?>testament" class="btn">遺言・家族信託</a></li>
				<li><a href="<?= home_url('/'); ?>realestate" class="btn">不動産登記</a></li>
				<li><a href="<?= home_url('/'); ?>registration" class="btn">会社･法人登記</a></li>
				<li><a href="<?= home_url('/'); ?>debts" class="btn">債務整理</a></li>
				<li><a href="<?= home_url('/'); ?>other-service" class="btn">その他の業務</a></li>
			</ul>
		</div>
	</section>

	<section id="home-02" class="uk-grid-collapse uk-grid-match" uk-grid>
		<div class="uk-position-relative uk-width-2-5@m">
			<img class="cover" src="<?= get_theme_file_uri(''); ?>/img/home/02.jpg" alt="">
			<div class="wrap">
				<p class="home-tit-01">About us</p>
				<h3 class="com-text-01 mt0">事務所概要</h3>
			</div>
		</div>
		<div class="info uk-width-3-5@m">
			<div class="uk-container">
				<h4 class="tit">分かりやすい説明と<br>丁寧なサービスを<br class="uk-hidden@l">心掛けています</h4>
				<p>弊所は、滋賀県と大阪市北区に事務所を構えています。</p>
				<p class="mt10">ご依頼は、権利に関するあらゆる不動産登記、不動産や金融資産を中心とした相続手続、遺産分割協議の成立に向けた支援、遺言や家族信託等の遺産承継に関する業務、商業登記を中心とした会社法務、破産や民事再生などの債務整理業務、裁判所提出書類の作成、簡易裁判所における訴訟代理、帰化申請など、幅広く司法書士業務を行っています。</p>
				<p class="mt10">どの業務においても、仕事の質にこだわって最良の法務サービスの提供に努めています。</p>
				<p class="mt10">初めてご相談くださるお客様も歓迎しております。お気軽にお問合せください。</p>
				<h4 class="catch com-text-02">自分ならどのような人に依頼したいか<br class="uk-hidden@m">自分ならどのような仕事を期待するか</h4>
				<p class="com-fz-15">一人ひとりのお客様に「依頼してよかった」と感じていただけるよう、誠実に全力で業務に取り組みます。</p>
				<a href="<?= home_url('/'); ?>office" class="com-btn-01 com-mt-m">事務所概要</a>
			</div>
		</div>
	</section>

	<section id="home-03" class="com-sec-01">
		<div class="uk-container">
			<div class="com-grid-01 uk-child-width-1-2@m" uk-grid>
				<div>
					<h3 class="com-tit-02">滋賀事務所</h3>
					<p class="uk-text-center">〒525-0055 滋賀県草津市野路町683番地6-203号<br>電話：077-566-2444</p>
					<p class="com-text-02 uk-text-center mt10">＜JR南草津駅 徒歩3分＞<br>駐車場あり</p>
					<div class="map com-mt-s">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1634.019305878924!2d135.94342453822512!3d35.00573855922222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001727ac1c75271%3A0xe81a1c920d16cbbf!2z5Y-45rOV5pu45aOr44GL44GM44KE44GN5rOV5YuZ44K144O844OT44K5!5e0!3m2!1sja!2sjp!4v1686028083461!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<a href="<?= home_url('/'); ?>office/shiga" class="com-btn-01 com-mt-s">滋賀事務所の詳細</a>
				</div>
				<div>
					<h3 class="com-tit-02">大阪事務所</h3>
					<p class="uk-text-center">〒530-0047 大阪市北区西天満4丁目3番18号 MF西天満ビル9階<br>電話：06-6940-4403</p>
					<p class="com-text-02 uk-text-center mt10">＜Osaka Metro谷町線／堺筋線 南森町駅(2番出口) 徒歩5分＞<br>＜JR東西線 大阪天満宮駅(2番出口) 徒歩5分＞</p>
					<div class="map com-mt-s">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10524.662915420527!2d135.49706353747297!3d34.69739054360818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e6e9cdddb60d%3A0x501fc3658487a4c5!2z44CSNTMwLTAwNDcg5aSn6Ziq5bqc5aSn6Ziq5biC5YyX5Yy66KW_5aSp5rqA77yU5LiB55uu77yT4oiS77yR77yXIE1G6KW_5aSp5rqA44OT44OrIDnpmo4!5e0!3m2!1sja!2sjp!4v1685595355654!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<a href="<?= home_url('/'); ?>office/osaka" class="com-btn-01 com-mt-s">大阪事務所の詳細</a>
				</div>
			</div>
		</div>
	</section>

	<section id="home-04" class="com-sec-01">
		<div class="uk-container">
			<p class="home-tit-01">Case / Procedure</p>
			<h3 class="uk-text-center mt0 com-text-01">相談事例と手続</h3>
			<?php
				$case_cats = get_terms(array('taxonomy' => 'case-cat', 'orderby' => 'menu_order'));
				if ($case_cats) :
			?>
			<div class="inner com-mt-s">
				<div class="subnav-scroll">
					<ul class="uk-subnav uk-flex-nowrap uk-grid" uk-switcher="connect: .js-switcher" uk-grid uk-height-match="target: a">
						<?php foreach ($case_cats as $case_cat) : ?>
					    <li><a href="#"><?= $case_cat->name; ?></a></li>
					    <?php endforeach; ?>
					</ul>
				</div>
				<div class="uk-switcher js-switcher">
					<?php foreach ($case_cats as $case_cat) : ?>
				    <div>
				    	<?php 
						$case_post = [
							'post_type' => 'case',
							'posts_per_page' => 4,
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
				    		<li><a href="<?php the_permalink(); ?>" class="btn">
				    			<span class="cat"><?= $case_cat->name; ?></span>
				    			<p class="tit uk-flex-1"><?php the_field( "case_detail" ); ?></p>
				    		</a></li>
				    		<?php endwhile; ?>
				    	</ul>
						<?php endif; wp_reset_postdata(); ?>
				    </div>
				    <?php endforeach; ?>
				</div>
			</div>
			<a href="<?= home_url('/'); ?>case" class="com-btn-01 com-mt-s">相談事例と手続</a>
			<?php endif; ?>
		</div>
	</section>

	<section id="home-05">
		<div class="uk-container uk-container-large uk-position-relative">
			<div class="inner">
				<div class="uk-container">
					<p class="com-tit-02">お問合せ･相談申込</p>
					<h3 class="com-text-01 mt0 uk-text-center">お気軽にご相談ください。</h3>
					<div class="com-mt-s">
						<div class="group uk-grid uk-grid-collapse uk-grid-match uk-child-width-1-2@m">
							<div class="item com-text-02">
								<div class="text-justify">
									<div class="com-text-01">相談専用ダイヤル</div>
									<a href="tel:0120881831" class="tel"><img src="<?= get_theme_file_uri(''); ?>/img/common/tel.svg" alt="0120-881-831"></a>
									<p class="com-fz-14 uk-text-center mt10"><span class="com-text-01">＜365日受付＞ 9:00～20:00</span><br>
									不在の場合は担当者から折り返しご連絡いたします</p>
								</div>
							</div>
							<div class="item com-text-02 uk-text-center">
								<div class="text-justify">
									<a href="<?= home_url('/'); ?>contact" class="mail"><img src="<?= get_theme_file_uri(''); ?>/img/common/mail.svg" alt="">メールでご連絡</a>
									<p class="com-fz-14 com-mt-1em">内容を確認のうえ担当者からご連絡いたします</p>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-grid com-grid-10 uk-flex-center uk-flex-middle mt30">
						<figure><img src="<?= get_theme_file_uri(''); ?>/img/common/calendar.svg" alt=""></figure>
						<div>
							<span class="text com-text-02">土日祝・夜間も<br class="uk-hidden@m">ご相談可能</span>
							<p class="com-fz-18 uk-visible@m">相談専用ダイヤルまたはメールにてお問合せのうえご予約ください。</p>
						</div>
					</div>
					<p class="uk-hidden@m text-justify com-mt-1em">相談専用ダイヤルまたはメールにて<br>お問合せのうえご予約ください。</p>
				</div>
			</div>
			<div class="com-panel-01">
				<div class="uk-flex-middle uk-flex-center" uk-grid>
					<figure><img class="ico" src="<?= get_theme_file_uri(''); ?>/img/home/05_01.png" alt=""></figure>
					<div class="flex-pc">
						<h4 class="catch">オンライン相談</h4>
						<p>パソコン・スマートフォン・タブレットなどでZoomを利用して相談が可能です。<br>ご希望の方は電話またはメールにてお知らせください。</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
        $article_post = array('posts_per_page' => 4);
        $article_query = new WP_Query($article_post);
        if($article_query->have_posts()):
    ?>
	<section id="home-06">
		<div class="uk-container">
			<p class="home-tit-01">Information</p>
			<h3 class="uk-text-center mt0 com-text-01">事務所からのお知らせ</h3>
			<ul class="inner com-mt-s">
				<?php while ( $article_query->have_posts() ): $article_query->the_post();
                $cat = get_the_category();
                $cat = $cat[0]; ?>
				<li><a href="<?php the_permalink(); ?>" class="btn">
					<time datetime="<?= get_the_date('Y-m-d'); ?>" class="data"><?= get_the_date('Y.m.d'); ?></time>
					<p class="uk-flex-1"><?php the_title(); ?></p>
				</a></li>
				<?php endwhile;?>
			</ul>
			<a href="<?= home_url('/information'); ?>" class="com-btn-01 com-mt-s">お知らせ</a>
		</div>
	</section>
	<?php endif; wp_reset_query(); ?>
</main>
<?php get_footer(); ?>
