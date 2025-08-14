<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<div class="headline">
    <?php echo tagImg('/live-schedule/headline.svg', 'Schedule'); ?>
    <span>イベント詳細</span>
</div>

<section class="content">

    <?php echo tagImg('/live-schedule/schedule-img.webp', '', 'post-thumbnail'); ?>

    <p class="date">08.01<span>(金)</span></p>

    <h1>HOP STUDIO’s Collection</h1>

    <p class="info">
        OPEN：<span>18:30</span>　<br class="sp-only">START：<span>19:30</span><br><br class="sp-only">
        ADV：<span>3,500円</span>　<br class="sp-only">DOOR：<span>4,000円+1Drink</span>
    </p>

    <h2 class="performer-title">出演：</h2>
    <p class="performer">STAYG/音モダーチ/瀧本りおな/ゆしん</p>

    <p class="note">
        備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示備考があればここに表示
    </p>
    
</section>

<div class="promotion-btn">
    <button>イベントのリンクをコピーする</button>
    <button>Xでシェアする</button>
    <button>Instagramでシェアする</button>
</div>

<div class="back-btn">
    <a href="">スケジュールに戻る</a>
</div>

<?php
get_footer();
