<?php
get_header();
?>

<main role="main">

    <section class="top">
        <video class="pc-only" playsinline autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video-pc.mp4"></video>
        <video class="sp-only" playsinline autoplay muted loop src="<?php echo get_template_directory_uri(); ?>/assets/images/home/main-video-sp.mp4"></video>
        <!-- <?php echo tagImg('home/top-logo-white-line.svg', get_bloginfo('name'), 'logo'); ?> -->
        <?php echo tagImg('home/top-logo.svg', get_bloginfo('name'), 'logo'); ?>
        <div class="scroll">
            SCROLL
        </div>
    </section>

    <section class="today">
        <?php echo tagImg('/home/today.svg', 'TODAY'); ?>

        <?php
        $today    = current_time('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));

        $args = [
            'post_type'      => 'live-schedule',
            'posts_per_page' => -1,
            'meta_query'     => [
                'relation' => 'AND',
                [
                    'key'     => 'schedule_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type'    => 'DATE'
                ],
                [
                    'key'     => 'schedule_date',
                    'value'   => $tomorrow,
                    'compare' => '<',
                    'type'    => 'DATE'
                ]
            ],
            'meta_key'       => 'day_or_night',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
        ];


        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $schedule_date = get_post_meta(get_the_ID(), 'schedule_date', true);
                $performers    = get_post_meta(get_the_ID(), 'performers', true);
                $open_time     = get_post_meta(get_the_ID(), 'open_time', true);
                $start_time    = get_post_meta(get_the_ID(), 'start_time', true);
                $adv_price     = get_post_meta(get_the_ID(), 'adv_price', true);
                $door_price    = get_post_meta(get_the_ID(), 'door_price', true);
                $day_or_night  = get_post_meta(get_the_ID(), 'day_or_night', true);
                $weekday = date('l', strtotime($schedule_date));
                ?>
                <a class="schedule-list" href="<?php the_permalink(); ?>">
                    <div class="head">
                        <div class="event-date">
                            <span class="month"><?php echo date_i18n('m/', strtotime($schedule_date)); ?></span>
                            <span class="date"><?php echo date_i18n('d', strtotime($schedule_date)); ?></span>
                            <span class="day-of-the-week"><?php echo esc_html($weekday); ?></span>
                            <?php if ($day_or_night === 'day') : ?>
                                <span class="day-icon">昼</span>
                            <?php elseif ($day_or_night === 'night') : ?>
                                <span class="night-icon">夜</span>
                            <?php endif; ?>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="text">
                        <h2 class="title"><?php the_title(); ?></h2>
                        <p class="performer"><?php echo nl2br(esc_html($performers)); ?></p>
                        <p class="info">
                            <?php if ($open_time) : ?>OPEN：<span><?php echo esc_html($open_time); ?></span><?php endif; ?>
                            <?php if ($start_time) : ?>　START：<span><?php echo esc_html($start_time); ?></span><?php endif; ?><br>
                            <?php if ($adv_price) : ?>ADV：<span><?php echo esc_html($adv_price); ?></span><?php endif; ?>
                            <?php if ($door_price) : ?>　DOOR：<span><?php echo esc_html($door_price); ?></span><?php endif; ?>
                        </p>
                    </div>
                    <div class="leading-btn">
                        詳細はコチラ
                    </div>
                </a>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </section>

    <section class="this-month">
        <?php echo tagImg('/home/this-month.svg', 'THIS MONTH'); ?>

        <div class="schedule">
            <div class="scroll-bar">
                <span>SCROLL</span>
                <div class="bar"></div>
            </div>

            <ul class="list-link-cards">
                <?php
                // 今月の初日と末日
                $start_of_month = date('Y-m-01');
                $end_of_month   = date('Y-m-t');

                $args = [
                    'post_type'      => 'live-schedule',
                    'posts_per_page' => -1,
                    'meta_query'     => [
                        'relation' => 'AND',
                        [
                            'key'     => 'schedule_date',
                            'value'   => $start_of_month,
                            'compare' => '>=',
                            'type'    => 'DATE'
                        ],
                        [
                            'key'     => 'schedule_date',
                            'value'   => $end_of_month,
                            'compare' => '<=',
                            'type'    => 'DATE'
                        ]
                    ],
                    // 昼夜順の前に日付順を優先
                    'orderby' => [
                        'schedule_date_clause' => 'ASC',
                        'day_or_night_clause'  => 'ASC',
                    ],
                    'meta_query' => [
                        'relation' => 'AND',
                        'schedule_date_clause' => [
                            'key'     => 'schedule_date',
                            'value'   => [$start_of_month, $end_of_month],
                            'compare' => 'BETWEEN',
                            'type'    => 'DATE',
                        ],
                        'day_or_night_clause' => [
                            'key'   => 'day_or_night',
                            'type'  => 'CHAR',
                        ],
                    ]
                ];

                $month_query = new WP_Query($args);

                if ($month_query->have_posts()) :
                    while ($month_query->have_posts()) : $month_query->the_post();
                        $schedule_date = get_post_meta(get_the_ID(), 'schedule_date', true);
                        $day_or_night  = get_post_meta(get_the_ID(), 'day_or_night', true);
                        $weekday       = date('D', strtotime($schedule_date)); // 英語略称
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.webp" alt="No image" />
                            <?php endif; ?>
                            <div class="text-area">
                                <div class="date-info">
                                    <div>
                                        <span class="month"><?php echo date('m/', strtotime($schedule_date)); ?></span>
                                        <span class="day-of-the-week"><?php echo esc_html($weekday); ?></span>
                                    </div>
                                    <span class="date"><?php echo date('d', strtotime($schedule_date)); ?></span>
                                </div>
                                <p><?php the_title(); ?></p>
                            </div>
                        </a>
                    </li>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </ul>

            <div class="line-btn">
                <a href="<?php echo home_url('/live-schedule'); ?>">View More</a>
            </div>
        </div>
    </section>

    <section class="news">
        <?php echo tagImg('/home/step-news.svg', 'NEWS'); ?>

        <div class="schedule">
            <div class="scroll-bar">
                <span>SCROLL</span>
                <div class="bar"></div>
            </div>

            <ul class="list-link-cards">
                <?php
                $news_query = new WP_Query([
                    'post_type'      => 'news',
                    'posts_per_page' => 5,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ($news_query->have_posts()) :
                    $no_image = get_template_directory_uri() . '/assets/images/no-image.webp';

                    while ($news_query->have_posts()) : $news_query->the_post();
                        $post_id   = get_the_ID();
                        $permalink = get_permalink($post_id);
                        $title     = get_the_title();

                        // サムネイル
                        if (has_post_thumbnail()) {
                            $thumb_html = get_the_post_thumbnail($post_id, 'medium', ['loading' => 'lazy']);
                        } else {
                            $thumb_html = '<img src="' . esc_url($no_image) . '" alt="No image">';
                        }

                        $month = get_the_date('m');
                        $day   = get_the_date('d');
                        $week  = date('D', strtotime(get_the_date('Y-m-d')));

                        ?>
                        <li>
                            <a href="<?php echo esc_url($permalink); ?>" class="card">
                                <?php echo $thumb_html; ?>
                                <div class="text-area">
                                    <div class="date-info">
                                        <div>
                                            <span class="month"><?php echo esc_html($month . '/'); ?></span>
                                            <span class="day-of-the-week"><?php echo esc_html($week); ?></span>
                                        </div>
                                        <span class="date"><?php echo esc_html($day); ?></span>
                                    </div>
                                    <p><?php echo esc_html($title); ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <li>
                        <div class="news-list no-items">
                            <div class="text">
                                <p>現在、公開されているお知らせはありません。</p>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="line-btn">
            <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">View More</a>
        </div>
    </section>


    <section class="page-links">
        <ul>

            <li>
                <a href="about">
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
                <a href="live-schedule">
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
                <a class="online-shop" href="https://stephall.thebase.in/" target=”_blank>
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
                <a href="faq">
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
                <a href="movie">
                    <div class="image">
                        <?php echo tagImg('/home/links-movie.svg', 'StepHALLの動画'); ?>
                    </div>
                    <div class="text">
                        <span>Movies</span>
                        <span class="leading-text">StepHALLの動画</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#access">
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
                <a href="contact">
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
