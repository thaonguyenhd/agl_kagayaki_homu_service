<footer id="footer">
	<div id="footer-body">
		<div class="uk-container">
			<div class="com-tit-02">お問合せ･相談申込</div>
			<p class="com-text-01 uk-text-center">土日祝・夜間も相談に対応。<br class="uk-hidden@m">お気軽にご相談ください。</p>
			<div class="footer-contact-01 com-mt-s">
				<div class="uk-container uk-container-small">
					<div class="group uk-grid uk-grid-collapse uk-grid-match uk-child-width-1-2@m">
						<div class="item">
							<div class="text-justify">
								<div class="com-text-01">相談専用ダイヤル</div>
								<a href="tel:0120881831" class="tel"><img src="<?= get_theme_file_uri(''); ?>/img/common/tel_white.svg" alt="0120-881-831" uk-svg></a>
								<p class="com-fz-14 uk-text-center mt10"><span class="com-text-01">＜365日受付＞ 9:00～20:00</span><br>
								不在の場合は担当者から折り返しご連絡いたします</p>
							</div>
						</div>
						<div class="item uk-text-center">
							<div class="text-justify">
								<a href="<?= home_url('/contact'); ?>" class="mail"><img src="<?= get_theme_file_uri(''); ?>/img/common/mail_white.svg" alt="">メールでご連絡</a>
								<p class="com-fz-14 com-mt-1em">内容を確認のうえ担当者からご連絡いたします</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-grid com-grid-10 uk-flex-center uk-flex-middle com-mt-s">
				<figure><img src="<?= get_theme_file_uri(''); ?>/img/common/calendar_white.svg" alt=""></figure>
				<div>
					<span>土日祝・夜間も<br class="uk-hidden@m">ご相談可能</span>
					<p class="com-fz-18 uk-visible@m">相談専用ダイヤルまたはメールにてお問合せのうえご予約ください。</p>
				</div>
			</div>
			<p class="uk-hidden@m text-justify com-mt-1em">相談専用ダイヤルまたはメールにて<br>お問合せのうえご予約ください。</p>
		</div>
	</div>

	<?php get_template_part( 'parts/breadcrumb' ); ?>
	
	<div class="copyright uk-container">
		<div class="uk-flex-between com-grid-10" uk-grid>
			<p class="com-fz-11">Copyright(C) Kagayaki-houmuservice All Rights Reserved.</p>
			<div>
				<a href="<?= home_url('/privacy-policy'); ?>" class="privacy">プライバシーポリシー</a>
			</div>
		</div>
	</div>
</footer><!-- /#footer -->

<div class="pagetop">
	<a href="#" uk-scroll><img src="<?= get_theme_file_uri(''); ?>/img/common/page-top.svg" alt=""></a>
</div>

<div id="offcanvas" uk-offcanvas="overlay: true; flip: true;">
	<div class="uk-offcanvas-bar uk-">
		<ul class="uk-nav-parent-icon" uk-nav>
			<li class="uk-nav-header">MENU</li>
			<li><a href="<?= home_url('/'); ?>">ホーム</a></li>
			<li class="uk-parent">
				<a href="#">取り扱い業務</a>
				<ul class="uk-nav-sub">
					<li><a href="<?= home_url('/'); ?>inheritance">相続手続</a></li>
					<li><a href="<?= home_url('/'); ?>inheritance/consultation">相続・遺言無料個別相談会</a></li>
					<li><a href="<?= home_url('/'); ?>testament">遺言・家族信託</a></li>
					<li><a href="<?= home_url('/'); ?>realestate">不動産登記</a></li>
					<li><a href="<?= home_url('/'); ?>registration">会社・法人登記</a></li>
					<li><a href="<?= home_url('/'); ?>debts">債務整理</a></li>
					<li><a href="<?= home_url('/'); ?>other-service">その他の業務</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">事務所概要</a>
				<ul class="uk-nav-sub">
					<li><a href="<?= home_url('/'); ?>office">ごあいさつ</a></li>
					<li><a href="<?= home_url('/'); ?>office/outline">事務所情報</a></li>
					<li><a href="<?= home_url('/'); ?>recruit">採用情報</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">アクセス</a>
				<ul class="uk-nav-sub">
					<li><a href="<?= home_url('/'); ?>office/shiga">滋賀事務所</a></li>
					<li><a href="<?= home_url('/'); ?>office/osaka">大阪事務所</a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#">相談事例と手続</a>
				<?php
				$case_cats = get_terms(array('taxonomy' => 'case-cat', 'orderby' => 'menu_order')); 
				if ($case_cats) : ?>
				<ul class="uk-nav-sub">
					<?php foreach ($case_cats as $case_cat) : ?>
					<li><a href="<?= get_term_link($case_cat) ?>"><?= $case_cat->name; ?></a></li>
					<?php endforeach; ?>
					<li><a href="<?= home_url('reviews') ?>">口コミ</a></li>
				</ul>
				<?php endif; ?>
			</li>
			<li><a href="<?= home_url('/'); ?>contact">お問合せ･相談申込</a></li>
			<li><a href="<?= home_url('/'); ?>information">お知らせ</a></li>
		</ul>
	</div>
</div><!-- #offcanvas -->

<!-- wp-foot -->
<?php wp_footer(); ?>

</body>
</html>
