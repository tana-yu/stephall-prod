<?php
get_header();
?>

<main role="main">

    <section class="top">
        <video autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video.mp4"></video>
        <?php echo tagImg('home/top-logo.svg', get_bloginfo('name'), 'logo'); ?>
    </section>

    <section class="today">
        <?php echo tagImg('/home/today.svg', 'TODAY'); ?>

        <a class="schedule-list" href="">
            <div class="">
                <div class="event-date">
                    <span class="month">08/</span>
                    <span class="date">01</span>
                    <span class="day-of-the-week">Wednesday</span>
                </div>
                <?php echo tagImg('/schedule-img.svg', ''); ?>
            </div>
            <div class="text">
                <h2 class="title">HOP STUDIO’s Collection</h2>
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

    </section>

</main>

<?php
get_footer();
