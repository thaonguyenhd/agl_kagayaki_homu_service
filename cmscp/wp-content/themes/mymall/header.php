<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-W42JG8W');</script>
	<!-- End Google Tag Manager -->

	<!-- wp-head -->
	<?php wp_head(); ?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@1,600&family=Noto+Sans+JP:wght@400;500&family=Noto+Serif+JP:wght@400;500&display=swap" rel="stylesheet">
	<!-- ▼icon -->
	<link rel="icon" href="<?= get_theme_file_uri('/img/common/favicon.svg'); ?>">
	<link rel="apple-touch-icon" href="<?= get_theme_file_uri('/img/common/apple-touch-icon.png'); ?>">
	<meta name="apple-mobile-web-app-title" content="かがやき法務サービス">
	<meta name="theme-color" content="#00524c">
	<!-- ▲icon -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W42JG8W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
	/* 
	！headerが2重になっています！
	トップページの最初に表示のヘッダーと、スクロールで表示されるヘッダー＆下層のヘッダー
	Gナビのリストのみphpで共通化しました。
	 */
?>
<header id="header" <?php if(!is_front_page()) { echo 'uk-sticky'; } ?>>
	<?php if(is_front_page()) : ?>
	<div id="header-top">
		<div class="site_tit">
			<a href="<?= home_url('/'); ?>" class="logo"><img src="<?= get_theme_file_uri(); ?>/img/common/logo_02.svg" alt="司法書士かがやき法務サービス"></a>
			<p class="text">Judicial scrivener office</p>
		</div>
		<nav class="gnav uk-flex uk-flex-middle uk-visible@m">
			<ul class="uk-flex uk-width-1-1">
			<?php get_template_part( 'parts/gnav-list' ); ?>
			</ul>
		</nav>
		<div class="contact uk-visible@m">
			<div class="com-grid-30 uk-flex-middle uk-flex-center uk-grid">
				<span>＜相談専用ダイヤル＞</span>
				<div>
					<a href="tel:0120881831"><img src="<?= get_theme_file_uri(); ?>/img/common/tel.svg" alt="0120-881-831"></a>
					<p class="mt5">＜365日受付＞ 9:00～20:00</p>
				</div>
			</div>
		</div>
		<a href="<?= home_url('/contact'); ?>" class="header-mail-01 uk-visible@m">
			<img src="<?= get_theme_file_uri(); ?>/img/common/mail_white.svg" alt="">お問合せ
		</a>
		<?php get_template_part( 'parts/header-contact' ); ?>
	</div>
	<?php endif; ?>
	<div id="header-sroll" <?php if(is_front_page()) { echo "class='home'"; } ?>>
		<div class="group-flex">
			<div class="logo">
				<a href="<?= home_url('/'); ?>">
					<img class="uk-visible@s" src="<?= get_theme_file_uri(); ?>/img/common/logo_01.svg" alt="司法書士かがやき法務サービス">
					<img class="uk-hidden@s" src="<?= get_theme_file_uri(); ?>/img/common/logo_01_s.svg" alt="司法書士かがやき法務サービス">
				</a>
			</div>
			<div class="group uk-flex-1 uk-visible@m">
				<div class="uk-flex-right uk-flex-middle com-grid-15" uk-grid>
					<span>＜相談専用ダイヤル＞</span>
					<div>＜365日受付＞ 9:00～20:00</div>
					<a href="tel:0120881831"><img src="<?= get_theme_file_uri(); ?>/img/common/tel.svg" alt="0120-881-831"></a>
				</div>
				<nav class="gnav uk-flex uk-flex-right">
					<ul class="uk-flex uk-flex-nowrap">
					<?php get_template_part( 'parts/gnav-list' ); ?>
					</ul>
				</nav>
			</div>
			<a href="<?= home_url('/contact'); ?>" class="header-mail-01 uk-visible@m">
				<img src="<?= get_theme_file_uri(); ?>/img/common/mail_white.svg" alt="">お問合せ
			</a>
			<?php get_template_part( 'parts/header-contact' ); ?>
		</div>
		<?php get_template_part( 'parts/header-notice' ); ?>
	</div>
</header><!-- /#header -->