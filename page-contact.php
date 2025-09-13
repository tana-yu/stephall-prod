<?php
get_header();
?>

 <main role="main"> 

    <?php get_template_part('parts/page-top-menu'); ?>

    <div class="headline">
        <?php echo tagImg('/contact/headline.svg', 'Contact'); ?>
        <span>お問い合わせ</span>
    </div>

    <section class="web-contact">
        <h2>WEBでお問い合わせ</h2>

        <p>
            入力フォームは全て必須項目です。お問い合わせ後、メールまたはお電話にて折り返しご連絡させていただきます。お問い合わせを送信いただいてから3日以上返答がない場合、恐れ入りますがお電話にてご連絡ください。　お電話でのお問い合わせの方は
            <a href="#tel-contact">コチラ</a>から。
        </p>

        <?php echo do_shortcode('[contact-form-7 id="59f5b3c" title="お問い合わせフォーム"]'); ?>

    </section>

    <section class="tel-contact" id="tel-contact">
        <h2>お電話でのお問い合わせ</h2>

        <p>
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>

        <div class="number">
            <a href="tel:06-6371-2264">06-6371-2264</a><span> (13:00〜22:00)</span>
        </div>
    </section>

</main> 

<?php
get_footer();
