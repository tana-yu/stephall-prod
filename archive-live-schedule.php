<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<h1 class="headline">
    <?php echo tagImg('/live-schedule/headline.svg', 'Schedule'); ?>
    <span>開催予定イベント</span>
</h1>

<section class="content">

    <div class="tab-menu">
        <?php
        $current_month = current_time('n'); // 現在月 (1〜12)
        $current_year  = current_time('Y'); // 現在年

        for ($i = 0; $i < 3; $i++) {
            // 月と年を計算
            $month_num   = ($current_month + $i - 1) % 12 + 1;
            $year_offset = floor(($current_month + $i - 1) / 12);
            $year_num    = $current_year + $year_offset;

            // 表示用
            $month_label = date_i18n('n月', mktime(0, 0, 0, $month_num, 1, $year_num));
            $month_attr  = sprintf('%04d-%02d', $year_num, $month_num); // 例: 2025-08

            // 今月ならアクティブクラス付与
            $active_class = ($i === 0) ? ' tab-active' : '';
            ?>
            <div class="month<?php echo esc_attr($active_class); ?>" data-month="<?php echo esc_attr($month_attr); ?>">
                <span><?php echo esc_html($month_label); ?></span>
            </div>
        <?php } ?>
    </div>

    <ul class="list-link-cards">

        <?php
        // ===== 取得条件 =====
        $paged = get_query_var('paged') ? (int)get_query_var('paged') : 1;

        $args = [
            'post_type'      => 'live-schedule',
            'posts_per_page' => -1, // 全件取得（JSで月ごとに絞るため）
            'paged'          => $paged,
            'meta_key'       => 'schedule_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
        ];

        $q = new WP_Query($args);

        if ($q->have_posts()) :
            $no_image = get_template_directory_uri() . '/assets/images/no-image.webp';

            while ($q->have_posts()) : $q->the_post();
                $post_id       = get_the_ID();
                $no_event      = get_post_meta($post_id, 'no_event', true);
                $schedule_date = get_post_meta($post_id, 'schedule_date', true);
                $weekday       = get_post_meta($post_id, 'schedule_weekday', true);
                $performers    = get_post_meta($post_id, 'performers', true);
                $open_time     = get_post_meta($post_id, 'open_time', true);
                $start_time    = get_post_meta($post_id, 'start_time', true);
                $adv_price     = get_post_meta($post_id, 'adv_price', true);
                $door_price    = get_post_meta($post_id, 'door_price', true);
                $day_or_night  = get_post_meta($post_id, 'day_or_night', true);

                // 日付の分解（表示用）
                $month = '';
                $date  = '';
                $month_attr = '';
                if ($schedule_date) {
                    $ts         = strtotime($schedule_date);
                    $month      = $ts ? date_i18n('m', $ts) : '';
                    $date       = $ts ? date_i18n('d', $ts) : '';
                    $month_attr = date('Y-m', $ts);
                }

                // タイトル & サムネイル
                $title = $no_event ? 'No Event' : get_the_title();

                if ($no_event) {
                    $thumb_html = '<img src="' . esc_url($no_image) . '" alt="">';
                } else {
                    if (has_post_thumbnail()) {
                        $thumb_html = get_the_post_thumbnail($post_id, 'large', ['loading' => 'lazy']);
                    } else {
                        $thumb_html = '<img src="' . esc_url($no_image) . '" alt="">';
                    }
                }

                $permalink = get_permalink($post_id);
                ?>

                <li data-month="<?php echo esc_attr($month_attr); ?>">
                    <a class="schedule-list" href="<?php echo esc_url($permalink); ?>">
                        <div class="head">
                            <div class="event-date">
                                <span class="month"><?php echo esc_html($month ? $month . '/' : ''); ?></span>
                                <span class="date"><?php echo esc_html($date); ?></span>
                                <?php if ($weekday): ?>
                                    <span class="day-of-the-week"><?php echo esc_html($weekday); ?></span>
                                <?php endif; ?>
                                <?php if ($day_or_night === 'day' || $day_or_night === 'night'): ?>
                                    <span class="<?php echo $day_or_night === 'day' ? 'day-icon' : 'night-icon'; ?>">
                                        <?php echo $day_or_night === 'day' ? '昼' : '夜'; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php echo $thumb_html; ?>
                        </div>

                        <div class="text">
                            <h2 class="title"><?php echo esc_html($title); ?></h2>

                            <?php if (!$no_event): ?>
                                <?php if (!empty($performers)): ?>
                                    <p class="performer"><?php echo nl2br(esc_html($performers)); ?></p>
                                <?php endif; ?>

                                <?php if ($open_time || $start_time || $adv_price || $door_price): ?>
                                    <p class="info">
                                        <?php if ($open_time): ?>OPEN：<span><?php echo esc_html($open_time); ?></span><?php endif; ?>
                                        <?php if ($open_time && $start_time) echo '　'; ?>
                                        <?php if ($start_time): ?>START：<span><?php echo esc_html($start_time); ?></span><?php endif; ?>
                                        <?php if (($open_time || $start_time) && ($adv_price || $door_price)) echo '<br>'; ?>
                                        <?php if ($adv_price): ?>ADV：<span><?php echo esc_html($adv_price); ?></span><?php endif; ?>
                                        <?php if ($adv_price && $door_price) echo '　'; ?>
                                        <?php if ($door_price): ?>DOOR：<span><?php echo esc_html($door_price); ?></span><?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="leading-btn">詳細はコチラ</div>
                    </a>
                </li>

            <?php endwhile; wp_reset_postdata(); ?>

        <?php else: ?>
            <li>
                <div class="schedule-list no-items">
                    <div class="text">
                        <p>現在、公開されているスケジュールはありません。</p>
                    </div>
                </div>
            </li>
        <?php endif; ?>

    </ul>

</section>

<div class="back-btn">
    <a href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/schedule-tab-menu.js"></script>

<?php
get_footer();
