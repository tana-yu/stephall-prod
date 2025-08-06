<?php
get_header();
?>

<main role="main">

    <section class="top">
        <video playsinline autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video.mp4"></video>
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

    <section class="this-month">
        <?php echo tagImg('/home/this-month.svg', 'THIS MONTH'); ?>

        <div class="schedule">
            <div class="scroll-bar">
                <span>SCROLL</span>
                <div class="bar"></div>
            </div>
            <div class="list-link-cards">

                <a href="" class="card">
                    <?php echo tagImg('/home/live-thumbnail.svg', ''); ?>
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

            </div>
            <a href="" class="line-btn">View More</a>
        </div>
    </section>


    <section class="news">
        <div class="scroll-bar">
            <span>SCROLL</span>
            <div class="bar"></div>
        </div>
        <div class="list-link-cards">

            <a href="" class="card">
                <?php echo tagImg('/home/news-thumbnail.svg', ''); ?>
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

        </div>
        <a href="" class="line-btn">View More</a>
    </section>

    <section class="page-links">
        <ul>

            <li>
                <a href="">
                    <span>About</span>
                    <span class="leading-text">StepHALLについて</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Schedule</span>
                    <span class="leading-text">開催予定イベント</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>HALL Rental</span>
                    <span class="leading-text">レンタルの料金・資料など</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>HALL spec</span>
                    <span class="leading-text">機材・照明などのリスト</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Floor</span>
                    <span class="leading-text">フロアマップ・座席表</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Gear Rental<br>Staff Dispatch</span>
                    <span class="leading-text">機材レンタル・人材派遣に関して</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Online Shop</span>
                    <span class="leading-text">オフィシャルグッズ販売サイト</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>FAQ</span>
                    <span class="leading-text">よくある質問</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Movie</span>
                    <span class="leading-text">StepHALLについて</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Access</span>
                    <span class="leading-text">StepHALLの場所について</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Contact</span>
                    <span class="leading-text">お問い合わせフォーム</span>
                </a>
            </li>

        </ul>
    </section>

    <section class="hall-rental">
        <?php echo tagImg('/home/hall-rental-headline.svg', 'あなたが思い描くイベントを作りませんか？'); ?>
        <div class="sub-headline">
            <p>
                定期イベント・自主企画・トークショー・お笑いなどイベント大募集中です！<br class="pc-only">
                皆さんの最高の思い出になるライブを一緒に作りませんか？<br class="pc-only">
                小さなことでも、まずご相談ください！<br class="pc-only">
                お問い合わせフォームからご連絡お待ちしております！
            </p>
            <a href="" class="line-btn">ホールレンタルについて</a>
        </div>

        <div id="top-slider-pc" class="splide">
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
            <?php echo tagImg('/home/black-logo.svg', 'StepHALL'); ?>
            
            <article class="adress">
                <h2>ACCESS　<a href="">Google Map</a></h2>
                <p>
                    〒531-0071  大阪市北区中津1-2-18ミノヤビル1F<br>(2F事務所)
                </p>
                <p class="station">
                    地下鉄中津駅5番出口より徒歩2分<br>
                    阪急中津駅○番出口より徒歩○○分<br>
                    阪急梅田駅○番出口より徒歩○○分<br>
                    地下鉄梅田駅(ヨドバシカメラ横出口)より徒歩10分
                </p>
            </article>

            <article class="tel">
                <h2>TEL</h2>
                <p><a href="">06-6371-2264 </a>(13:00〜22:00)</p>
                <p>
                    不在の時やイベント中対応出来ない時など<br>留守番電話に切り替わりますので用件を残して下さい。
                </p>
            </article>

            <article class="mail">
                <h2>Mail</h2>
                <p>info@stephall.jp </p>
            </article>

            <article class="sns">
                <a href="">
                    <?php echo tagImg('/facebook.svg', ''); ?>
                </a>
                <a href="">
                    <?php echo tagImg('/x.svg', ''); ?>
                </a>
                <a href="">
                    <?php echo tagImg('/youtube.svg', ''); ?>
                </a>
                <a href="">
                    <?php echo tagImg('/instagram.svg', ''); ?>
                </a>
                <a href="">
                    <?php echo tagImg('/tiktok.svg', ''); ?>
                </a>
            </article>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.8176502172273!2d135.49343657529005!3d34.70977898272643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e760b8fbbc11%3A0x233e4cd90207abba!2z5aSn6Ziq44O75qKF55Sw44O75Lit5rSlU3RlcCBIQUxMKOODqeOCpOODluODj-OCpuOCuSk!5e0!3m2!1sja!2sjp!4v1754400171855!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</main>

<?php
get_footer();
