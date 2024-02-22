<li><a href="<?= home_url('/'); ?>">ホーム</a></li>
<li>
	<a href="#">取扱業務</a>
	<div class="column-02" uk-dropdown>
		<ul class="uk-child-width-1-2 com-grid-15" uk-grid>
			<li><a href="<?= home_url('/'); ?>inheritance" class="btn">相続手続</a></li>
			<li><a href="<?= home_url('/'); ?>testament" class="btn">遺言・家族信託</a></li>
			<li><a href="<?= home_url('/'); ?>realestate" class="btn">不動産登記</a></li>
			<li><a href="<?= home_url('/'); ?>registration" class="btn">会社･法人登記</a></li>
			<li><a href="<?= home_url('/'); ?>debts" class="btn">債務整理</a></li>
			<li><a href="<?= home_url('/'); ?>other-service" class="btn">その他の業務</a></li>
		</ul>
	</div>
</li>
<li>
	<a href="#">事務所概要</a>
	<ul uk-dropdown>
		<li><a href="<?= home_url('/'); ?>office">ごあいさつ</a></li>
		<li><a href="<?= home_url('/'); ?>office/outline">事務所情報</a></li>
		<li><a href="<?= home_url('/'); ?>recruit">採用情報</a></li>
	</ul>
</li>
<li>
	<a href="#">アクセス</a>
	<ul uk-dropdown>
		<li><a href="<?= home_url('/'); ?>office/shiga">滋賀事務所</a></li>
		<li><a href="<?= home_url('/'); ?>office/osaka">大阪事務所</a></li>
	</ul>
</li>
<li>
	<a href="<?= home_url('/'); ?>case">相談事例と手続</a>
	<?php 
	$case_cats = get_terms(array('taxonomy' => 'case-cat', 'orderby' => 'menu_order'));
	if ($case_cats) : ?>
	<div class="column-02" uk-dropdown>
		<ul class="uk-child-width-1-2 com-grid-15" uk-grid>
			<?php foreach ($case_cats as $case_cat) : ?>
			<li><a href="<?= get_term_link($case_cat) ?>"><?= $case_cat->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
</li>