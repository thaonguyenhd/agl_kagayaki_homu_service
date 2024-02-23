<div class="page-tit-01 uk-flex uk-flex-wrap uk-child-width-1-2@m">
    <figure class="img"><img src="<?= get_theme_file_uri(); ?>/img/contact/kv.jpg" alt=""></figure>
    <div class="detail uk-container">
        <h1 class="tit">口コミフォーム</h1>
        <span class="text">Reviews Service</span>
    </div>
</div>
<section id="contact-01" class="com-sec-01">
    <div class="uk-container">
        <h2 class="com-tit-03">土日祝・夜間も相談に対応。お気軽にご相談ください。</h2>
        <p class="com-mt-m">お問合せや相談の予約については、お電話、LINE、メールフォームよりお願いします。 また、LINE、メールによる法律相談はお受けしておりませんのでご了承ください。 なお、弊所からの返信内容について、無断転載やインターネット上への公表等はお断りしております。</p>
        <a href="<?= home_url('/privacy-policy'); ?>" class="com-btn-01 com-mt-1em">プライバシーポリシー</a>
        <div class="com-panel-01 com-mt-l">
            <div class="uk-flex-middle uk-flex-center" uk-grid>
                <figure><img class="ico" src="<?= get_theme_file_uri(); ?>/img/home/05_01.png" alt=""></figure>
                <div class="flex-pc">
                    <h4 class="catch">オンライン相談</h4>
                    <p>パソコン・スマートフォン・タブレットなどでZoomを利用して相談が可能です。<br>ご希望の方は電話またはメールにてお知らせください。</p>
                </div>
            </div>
        </div>
        <h3 class="com-tit-04 com-mt-l">お電話によるお問合せ･相談申込</h3>
        <div class="tel com-text-02 uk-flex-bottom" uk-grid>
            <div>
                <div class="text mb10">相談専用ダイヤル</div>
                <a href="tel:0120881831"><img src="<?= get_theme_file_uri(); ?>/img/common/tel.svg" alt="0120-881-831"></a>
            </div>
            <p><span class="text">＜365日受付＞  受付時間 平日 9:00～20:00</span><br>土日祝は担当者の携帯に転送されます</p>
        </div>
    </div>
</section>
<section id="contact-02" class="com-sec-01 com-bg-01">
    <div class="uk-container">
        <h3 class="com-tit-04">LINEよるお問合せ･相談申込</h3>
        <p>下記の「QRコード」から、”司法書士かがやき法務サービス”を友だち追加し、LINEのトーク画面からご連絡ください。</p>
        <div class="com-mt-s" uk-grid>
            <figure><a href="https://lin.ee/d9pEnw9" target="_blank" rel="noopener">
                <img src="<?= get_theme_file_uri(); ?>/img/contact/qr.png" alt="">
            </a></figure>
            <div>
                <span class="com-fz-20">LINEメッセージには、下記の内容を必ずご記入ください。</span>
                <ul class="com-list-02 mt10">
                    <li>氏名</li>
                    <li>住所</li>
                    <li>連絡先</li>
                    <li>お問合せ内容・ご相談内容</li>
                    <li>相談予約の希望の日時（任意）</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="contact-03" class="com-sec-01">
    <div class="uk-container">
        <h3 class="com-tit-04">お問合せ･相談申込フォーム</h3>
        <p>下記フォームに必要項目を入力し送信ボタンを押してください。<br>内容を確認のうえご連絡いたします。</p>
        <ul class="com-list-01 circle com-mt-1em com-fz-14">
            <li>入力のうえ送信されますと、確認のための自動返信メール送られます。メールが届かない場合は、メールアドレスの入力ミスなどが考えられますので再度入力して送信してください。</li>
        </ul>
        <p class="com-mt-s com-fz-12"><span class="form-icon-required">必須</span>が付いている項目は必須入力です</p>
        <?= do_shortcode('[contact-form-7 id="272" title="口コミフォーム"]'); ?>
    </div>
</section>