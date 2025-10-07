<?php
get_header();
?>

<main role="main"> 

    <?php get_template_part('parts/page-top-menu'); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
    // メタデータ取得（functions.php のキー名に合わせる）
    $post_id = get_the_ID();
    $schedule_date      = get_post_meta($post_id, 'schedule_date', true);
    $open_time          = get_post_meta($post_id, 'open_time', true);
    $start_time         = get_post_meta($post_id, 'start_time', true);
    $adv_price          = get_post_meta($post_id, 'adv_price', true);
    $door_price         = get_post_meta($post_id, 'door_price', true);
    $performers         = get_post_meta($post_id, 'performers', true);

    // 日付のフォーマット
    $date_display = '';
    $day_display  = '';
    if ( ! empty($schedule_date) ) {
        $timestamp    = strtotime($schedule_date);
        $date_display = date_i18n('m.d', $timestamp);
        $day_display  = '(' . date_i18n('D', $timestamp) . ')';
    }
    ?>

    <h1 class="headline">
        <?php echo tagImg('/live-schedule/headline.svg', 'Schedule'); ?>
        <span>イベント詳細</span>
    </h1>

    <section class="content">

        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('large', ['class' => 'post-thumbnail']); ?>
        <?php endif; ?>

        <?php if ( $date_display ) : ?>
            <p class="date"><?php echo esc_html($date_display); ?><span><?php echo esc_html($day_display); ?></span></p>
        <?php endif; ?>

        <h1><?php the_title(); ?></h1>

        <p class="info">
            <?php if ( $open_time ) : ?>OPEN：<span><?php echo esc_html($open_time); ?></span><?php endif; ?>
            <?php if ( $start_time ) : ?><br>START：<span><?php echo esc_html($start_time); ?></span><?php endif; ?>
            <br><br>
            <?php if ( $adv_price ) : ?>ADV：<span><?php echo esc_html($adv_price); ?></span><?php endif; ?>
            <?php if ( $door_price ) : ?><br>DOOR：<span><?php echo esc_html($door_price); ?></span><?php endif; ?>
        </p>

        <?php if ( $performers ) : ?>
            <h2 class="performer-title">出演：</h2>
            <p class="performer"><?php echo nl2br(esc_html($performers)); ?></p>
        <?php endif; ?>

        <?php if ( get_the_content() ) : ?>
            <div class="note">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
        
    </section>

    <div class="promotion-btn">
        <button 
            onclick="navigator.clipboard.writeText('<?php echo esc_url(get_permalink()); ?>')
                .then(() => {
                    alert('リンクのコピーに成功しました');
                })
                .catch(err => {
                    alert('コピーに失敗しました: ' + err);
                })">
            イベントのリンクをコピーする
        </button>
        <button onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>', '_blank')">Xでシェアする</button>
        <button onclick="window.open('https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>', '_blank')">Instagramでシェアする</button>
    </div>

    <div class="back-btn">
        <a href="<?php echo esc_url(get_post_type_archive_link('live-schedule')); ?>">スケジュールに戻る</a>
    </div>

    <?php endwhile; endif; ?>

</main> 

<?php
get_footer();
