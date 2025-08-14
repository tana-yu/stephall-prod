<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<div class="headline">
    <?php echo tagImg('/live-schedule/headline.svg', 'Schedule'); ?>
    <span>開催予定イベント</span>
</div>

<section class="content">

    <div class="tab-menu">
        <div class="month tab-active">
            <span>10月</span>
        </div>
        <div class="month">
            <span>11月</span>
        </div>
        <div class="month">
            <span>12月</span>
        </div>
    </div>

    <ul class="list-link-cards">

        <?php for ($i = 0; $i < 10; $i++): ?>
            <li>
                <a class="schedule-list" href="">
                    <div class="head">
                        <div class="event-date">
                            <span class="month">08/</span>
                            <span class="date">01</span>
                            <span class="day-of-the-week">Wednesday</span>
                            <span class="day-icon">昼</span>
                        </div>
                        <?php echo tagImg('/home/schedule-img.webp', ''); ?>
                    </div>
                    <div class="text">
                        <h2 class="title">HOP STUDIO’s Collection sssssalsalsalsalsalsal</h2>
                        <p class="performer">STAYG/音モダーチ/瀧本りおな/ゆしん</p>
                        <p class="info">
                            OPEN：<span>18:30</span>　START：<span>19:30</span><br>
                            ADV：<span>3,500円</span>　DOOR：<span>4,000円+1Drink</span>
                        </p>
                    </div>
                    <div class="leading-btn">
                        詳細はコチラ
                    </div>
                </a>
            </li>
        <?php endfor; ?>

    </ul>
</section>

<div class="back-btn">
    <a href="">トップに戻る</a>
</div>

<?php
get_footer();
