<?php
get_header();
?>

<main role="main">

    <section class="top">
        <video class="pc-only" playsinline autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video-pc.mp4"></video>
        <video class="sp-only" playsinline autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video-sp.mp4"></video>
        <?php echo tagImg('home/top-logo.svg', get_bloginfo('name'), 'logo'); ?>
        <div class="scroll">
            SCROLL
        </div>
    </section>

    <section class="today">
        <?php echo tagImg('/home/today.svg', 'TODAY'); ?>

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

        <a class="schedule-list" href="">
            <div class="head">
                <div class="event-date">
                    <span class="month">08/</span>
                    <span class="date">01</span>
                    <span class="day-of-the-week">Wednesday</span>
                    <span class="night-icon">夜</span>
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

    </section>

    <section class="this-month">
        <?php echo tagImg('/home/this-month.svg', 'THIS MONTH'); ?>

        <div class="schedule">
            <div class="scroll-bar">
                <span>SCROLL</span>
                <div class="bar"></div>
            </div>

            <ul class="list-link-cards">

                <?php for ($i = 0; $i < 10; $i++): ?>
                    <li>
                        <a href="" class="card">
                            <?php echo tagImg('/home/schedule-img.webp', ''); ?>
                            <div class="text-area">
                                <div class="date-info">
                                    <div>
                                        <span class="month">08/</span>
                                        <span class="day-of-the-week">WED</span>
                                    </div>
                                    <span class="date">23</span>
                                </div>
                                <p>クリックして詳細を見る</p>
                            </div>
                        </a>
                    </li>
                <?php endfor; ?>

            </ul>

            <div class="line-btn">
                <a href="">View More</a>
            </div>
        </div>
    </section>


    <section class="news">
        <?php echo tagImg('/home/step-news.svg', 'THIS MONTH'); ?>

        <div class="schedule">
            <div class="scroll-bar">
                <span>SCROLL</span>
                <div class="bar"></div>
            </div>

            <ul class="list-link-cards">

                <?php for ($i = 0; $i < 10; $i++): ?>
                    <li>
                        <a href="" class="card">
                            <?php echo tagImg('/home/news-thumbnail.webp', ''); ?>
                            <div class="text-area">
                                <div class="date-info">
                                    <div>
                                        <span class="month">08</span>
                                        <span class="day-of-the-week">WED</span>
                                    </div>
                                    <span class="date">23</span>
                                </div>
                                <p>クリックして詳細を見る</p>
                            </div>
                        </a>
                    </li>
                <?php endfor; ?>

            </ul>
        </div>

        <div class="line-btn">
            <a href="">View More</a>
        </div>
    </section>

    <section class="page-links">
        <ul>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-about.svg', 'StepHALLについて'); ?>
                    </div>
                    <div class="text">
                        <span>About</span>
                        <span class="leading-text">StepHALLについて</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-schedule.svg', '開催予定イベント'); ?>
                    </div>
                    <div class="text">
                        <span>Schedule</span>
                        <span class="leading-text">開催予定イベント</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-hall-rental.svg', 'レンタルの料金・資料など'); ?>
                    </div>
                    <div class="text">
                        <span>HALL Rental</span>
                        <span class="leading-text">レンタルの料金・資料など</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-hall-spec.svg', '機材・照明などのリスト'); ?>
                    </div>
                    <div class="text">
                        <span>HALL spec</span>
                        <span class="leading-text">機材・照明などのリスト</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-floor.svg', 'フロアマップ・座席表'); ?>
                    </div>
                    <div class="text">
                        <span>Floor</span>
                        <span class="leading-text">フロアマップ・座席表</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-gear-rental-staff-dispatch.svg', '機材レンタル・人材派遣に関して'); ?>
                    </div>
                    <div class="text">
                        <span>Gear Rental<br>Staff Dispatch</span>
                        <span class="leading-text">機材レンタル・人材派遣に関して</span>
                    </div>
                </a>
            </li>

            <li>
                <a class="online-shop" href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-online-shop.svg', 'オフィシャルグッズ販売サイト'); ?>
                    </div>
                    <div class="text">
                        <span>Online Shop</span>
                        <span class="leading-text">オフィシャルグッズ販売サイト</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-faq.svg', 'よくある質問'); ?>
                    </div>
                    <div class="text">
                        <span>FAQ</span>
                        <span class="leading-text">よくある質問</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-movie.svg', 'StepHALLについて'); ?>
                    </div>
                    <div class="text">
                        <span>Movie</span>
                        <span class="leading-text">StepHALLについて</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-access.svg', 'StepHALLの場所について'); ?>
                    </div>
                    <div class="text">
                        <span>Access</span>
                        <span class="leading-text">StepHALLの場所について</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="">
                    <div class="image">
                        <?php echo tagImg('/home/links-contact.svg', 'お問い合わせフォーム'); ?>
                    </div>
                    <div class="text">
                        <span>Contact</span>
                        <span class="leading-text">お問い合わせフォーム</span>
                    </div>
                </a>
            </li>

        </ul>
    </section>

    <section class="hall-rental">
        <?php echo tagImg('/home/hall-rental-headline-sp.svg', 'あなたが思い描くイベントを作りませんか？', 'sp-only'); ?>
        <?php echo tagImg('/home/hall-rental-headline-pc.svg', 'あなたが思い描くイベントを作りませんか？', 'pc-only'); ?>
        <div class="sub-headline">
            <p>
                定期イベント・自主企画・トークショー・お笑いなどイベント大募集中です！<br>
                皆さんの最高の思い出になるライブを一緒に作りませんか？<br>
                小さなことでも、まずご相談ください！<br>
                <a href="<?php echo home_url('contact'); ?>">お問い合わせフォーム</a>からご連絡お待ちしております！
            </p>
            <a href="" class="line-btn">ホールレンタルについて</a>
        </div>

        <div id="splide-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><?php echo tagImg('/home/hall-rental1.webp', ''); ?></li>
                        <li class="splide__slide"><?php echo tagImg('/home/hall-rental2.webp', ''); ?></li>
                        <li class="splide__slide"><?php echo tagImg('/home/hall-rental3.webp', ''); ?></li>
                        <li class="splide__slide"><?php echo tagImg('/home/hall-rental4.webp', ''); ?></li>
                        <li class="splide__slide"><?php echo tagImg('/home/hall-rental5.webp', ''); ?></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section class="access" id="access">

        <div class="text-area">
            <?php echo tagImg('/black-logo.svg', 'StepHALL'); ?>
            
            <article class="address">
                <h2>ACCESS　<a href="https://maps.app.goo.gl/qoPd8sGxWuF4TyUd8" target="_blank">Google Map</a></h2>
                <p>
                    〒531-0071  大阪市北区中津1-2-18ミノヤビル1F(2F事務所)
                    <span class="station">
                        地下鉄中津駅5番出口より徒歩2分<br>
                        阪急中津駅○番出口より徒歩○○分<br>
                        阪急梅田駅○番出口より徒歩○○分<br>
                        地下鉄梅田駅(ヨドバシカメラ横出口)より徒歩10分
                    </span>
                </p>
            </article>

            <article class="tel">
                <h2>TEL</h2>
                <p>
                    <a href="tel:06-6371-2264">06-6371-2264 </a>(13:00〜22:00)
                    <span>
                        不在の時やイベント中対応出来ない時など<br>留守番電話に切り替わりますので用件を残して下さい。
                    </span>
                </p>
            </article>

            <article class="mail">
                <h2>Mail</h2>
                <p>info@stephall.jp </p>
            </article>

            <article class="sns">
                <h2>SNS</h2>

                <ul>
                    <li>
                        <a href="https://www.facebook.com/StepHALLexMINOYAHALL/" target="_blank">
                            <?php echo tagImg('/home/facebook.svg', ''); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/StepHALL2nd" target="_blank">
                            <?php echo tagImg('/home/x.svg', ''); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCQaP3-6dn4qNCMXsifbYrVA" target="_blank">
                            <?php echo tagImg('/home/youtube.svg', ''); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/stephallexminoyahall/?hl=ja" target="_blank">
                            <?php echo tagImg('/home/instagram.svg', ''); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@stephall0408?is_from_webapp=1&sender_device=pc" target="_blank">
                            <?php echo tagImg('/home/tiktok.svg', ''); ?>
                        </a>
                    </li>
                </ul>
            </article>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6559.974909421162!2d135.49212239494668!3d34.70549636281107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f20!3m3!1m2!1s0x6000e760b8fbbc11%3A0x233e4cd90207abba!2z5aSn6Ziq44O75qKF55Sw44O75Lit5rSlU3RlcCBIQUxMKOODqeOCpOODluODj-OCpuOCuSk!5e0!3m2!1sja!2sjp!4v1754917473633!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</main>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/home-slider.js"></script>

<?php
get_footer();
