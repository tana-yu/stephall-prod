<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<div class="headline">
    <?php echo tagImg('/news/headline.svg', 'News'); ?>
    <span>お知らせ一覧</span>
</div>

<section class="content">

    <ul class="list-link-cards">
        <?php
        $paged = get_query_var('paged') ? (int)get_query_var('paged') : 1;

        $args = [
            'post_type'      => 'news',
            'posts_per_page' => 10, // 1ページに表示する件数
            'paged'          => $paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        $q = new WP_Query($args);

        if ($q->have_posts()) :
            $no_image = get_template_directory_uri() . '/assets/images/no-image.webp';

            while ($q->have_posts()) : $q->the_post();
                $post_id   = get_the_ID();
                $title     = get_the_title();
                $permalink = get_permalink($post_id);

                if (has_post_thumbnail()) {
                    $thumb_html = get_the_post_thumbnail($post_id, 'medium', ['loading' => 'lazy']);
                } else {
                    $thumb_html = '<img src="' . esc_url($no_image) . '" alt="">';
                }

                // 日付（例: 08/01 Wednesday）
                $month = get_the_date('m');
                $day   = get_the_date('d');
                $week  = date('l', get_post_time('U'));
                ?>
                <li>
                    <a class="schedule-list" href="<?php echo esc_url($permalink); ?>">
                        <div class="head">
                            <div class="event-date">
                                <span class="month"><?php echo esc_html($month . '/'); ?></span>
                                <span class="date"><?php echo esc_html($day); ?></span>
                                <span class="day-of-the-week"><?php echo esc_html($week); ?></span>
                            </div>
                            <?php echo $thumb_html; ?>
                        </div>

                        <div class="text">
                            <h2 class="title"><?php echo esc_html($title); ?></h2>
                        </div>

                        <div class="leading-btn">詳細はコチラ</div>
                    </a>
                </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <li>
                <div class="schedule-list no-items">
                    <div class="text">
                        <p>現在、公開されているお知らせはありません。</p>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </ul>

    <div class="pagination">
        <?php
        echo paginate_links([
            'total'     => $q->max_num_pages,
            'current'   => $paged,
            'prev_text' => '<',
            'next_text' => '>',
        ]);
        ?>
    </div>

</section>

<div class="back-btn">
    <a href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
</div>

<?php
get_footer();
