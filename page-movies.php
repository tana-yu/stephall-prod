<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<h1 class="headline">
    <?php echo tagImg('/movies/headline.svg', 'MOVIE'); ?>
    <span>StepHALLの動画</span>
</h1>

<section class="content">

    <div class="content-headline">
        <?php echo tagImg('/movies/toilet-headline.webp', 'StepHALLトイレ案内動画 '); ?>
    </div>

    <p>
        StepHALLのあのわかりにくい問題を、<br class="pc-only">
        アーティストの方々に分かりやすく説明してもらう「トイレ案内動画」。<br class="pc-only">
        トイレを案内してもらいながら、アーティストのことも分かる！！<br class="pc-only">
        StepHALLの名物になるまで続けますよ！<br class="pc-only">
        皆さん楽しみにトイレに行きましょう！<br><br>

        見にくい場合は、<a href="https://www.youtube.com/channel/UCQaP3-6dn4qNCMXsifbYrVA" target=_brank>youtubeチャンネル</a>よりお楽しみ下さい。<br class="pc-only">
        チャンネル登録してもらえると、きっと良いことがありますよ！
    </p>

    <ul>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <li>
                <div class="video-wrap">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/oeDkECnVYBM?si=dhijLcpiAnpliYrm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="title">
                    <h2>作人＆キャラメルパッキング編作人＆キャラメルパッキング編</h2>
                </div>
                <div class="comment-btn">
                    コメントを表示する
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </div>
                <p class="comment">
                    お待ちかね、第3回の案内ゲストは4月10日に2マンライブを行ってくれた作人＆キャラメルパッキングの登場です。2組の人柄と仲の良さが伝わってきます。
                </p>
            </li>
        <?php endfor; ?>
    </ul>

</section>

<div class="back-btn">
    <a href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/movies-accordion.js"></script>

<?php
get_footer();
