<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
	<figure class="img"><img src="<?= get_theme_file_uri(); ?>/img/contact/kv.jpg" alt=""></figure>
	<div class="detail uk-container">
		<?php
			 $tit = get_parent_title();
			$text = str_replace('-', ' ', get_parent_slug());
		?>
		<h1 class="tit"><?= $tit ?></h1>
		<span class="text"><?= $text ?></span>
	</div>
</div>
<section id="contact-01" class="com-sec-01">
	<div class="uk-container">
		<?php if(get_parent_slug() == 'review-form'): ?>
		<h2 class="com-tit-05">クチコミの投稿ありがとうございました。</h2>
		<p>内容確認後にクチコミ一覧ページへ掲載させていただきます。</p>
		<?php else: ?>
		<h2 class="com-tit-05">ご連絡ありがとうございました。</h2>
		<p>担当者が内容確認後にご連絡させていただきます。</p>
		<ul class="com-mt-s thanks-panel-01 com-list-01 circle">
			<?php get_template_part( 'parts/form-notice' ); ?>
		</ul>
		<?php endif; ?>
	</div>
</section>