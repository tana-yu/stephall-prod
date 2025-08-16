<?php
get_header();
?>

<?php get_template_part('parts/page-top-menu'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="headline">
    <?php echo tagImg('/news/headline.svg', 'News'); ?>
    <span>お知らせ</span>
</div>

<section class="content">

    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('large', ['class' => 'post-thumbnail']); ?>
    <?php endif; ?>


    <div class="event-date-box">
        <?php
        // 投稿日を取得
        $date_display = get_the_date('m.d');
        // 曜日を取得
        $weekday = get_the_date('w'); 
        $weekdays = array('日', '月', '火', '水', '木', '金', '土');
        ?>
        <p class="date">
            <?php echo esc_html($date_display); ?>
            <span>(<?php echo $weekdays[$weekday]; ?>)</span>
        </p>

        <h1 class="event-title">
            <?php 
            if ( get_the_title() ) {
                the_title();
            } else {
                echo 'No Event';
            }
            ?>
        </h1>
    </div>

    <div class="note">
        <?php the_content(); ?>
    </div>
    
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
        記事のリンクをコピーする
    </button>
    <button onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>', '_blank')">Xでシェアする</button>
    <button onclick="window.open('https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>', '_blank')">Instagramでシェアする</button>
</div>

<div class="back-btn">
    <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">一覧に戻る</a>
</div>

<?php endwhile; endif; ?>

<?php
get_footer();
