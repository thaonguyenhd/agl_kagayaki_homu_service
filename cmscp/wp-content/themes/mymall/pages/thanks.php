<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
    <figure class="img"><img src="<?= get_theme_file_uri(); ?>/img/contact/kv.jpg" alt=""></figure>
    <div class="detail uk-container">
        <?php
            $tit = 'お問合せ･相談申込';
            $text = 'contact';
            if(get_parent_slug() == 'reviews-form') {
                $tit = '口コミフォーム';
                $text = 'Reviews Service';
            }
        ?>
        <h1 class="tit"><?= $tit ?></h1>
        <span class="text"><?= $text ?></span>
    </div>
</div>
<section id="contact-01" class="com-sec-01">
    <div class="uk-container">
        <h2 class="com-tit-05">ご連絡ありがとうございました。</h2>
        <p>担当者が内容確認後にご連絡させていただきます。</p>
        <ul class="com-mt-s thanks-panel-01 com-list-01 circle">
            <li>入力フォーム送信後、確認のための自動返信メールが送られます。自動返信メールが届かない場合はメールアドレスの入力ミスが考えられます。再度入力して送信ください。</li>
        </ul>
        <p class="com-mt-s">司法書士かがやき法務サービス<br>〒525-0055 滋賀県草津市野路町683番地6-203号<br>電話：077-566-2444</p>
    </div>
</section>