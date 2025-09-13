<?php
get_header();
?>

 <main role="main"> 

    <?php get_template_part('parts/page-top-menu'); ?>

    <h1 class="headline">
        <?php echo tagImg('/movies/headline.svg', 'MOVIE'); ?>
        <span>StepHALLの動画</span>
    </h1>

    <section class="content">

        <div class="content-headline">
            <?php echo tagImg('/movies/toilet-headline.webp', 'StepHALLトイレ案内動画 '); ?>
        </div>

        <p>
            StepHALLのあのわかりにくい問題を、<br class="pc-only">
            アーティストの方々に分かりやすく説明してもらう「トイレ案内動画」。<br class="pc-only">
            トイレを案内してもらいながら、アーティストのことも分かる！！<br class="pc-only">
            StepHALLの名物になるまで続けますよ！<br class="pc-only">
            皆さん楽しみにトイレに行きましょう！<br><br>

            見にくい場合は、<a href="https://www.youtube.com/channel/UCQaP3-6dn4qNCMXsifbYrVA" target=_brank>youtubeチャンネル</a>よりお楽しみ下さい。<br class="pc-only">
            チャンネル登録してもらえると、きっと良いことがありますよ！
        </p>

        <ul>
            <?php
            $videos_query = new WP_Query([
                'post_type'      => 'videos', // カスタム投稿タイプ
                'posts_per_page' => 10,       // 表示件数（必要に応じて調整）
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($videos_query->have_posts()) :
                while ($videos_query->have_posts()) : $videos_query->the_post();

                    // メタ情報を取得
                    $youtube_url = get_post_meta(get_the_ID(), 'video_url', true);
                    $embed_url   = convert_youtube_url_to_embed($youtube_url); // 前回作った関数
                    $comment     = get_post_meta(get_the_ID(), 'video_comment', true);
            ?>
                <li>
                    <div class="video-wrap">
                        <?php if ($embed_url): ?>
                            <iframe width="560" height="315" 
                                src="<?php echo esc_url($embed_url); ?>" 
                                title="<?php the_title_attribute(); ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        <?php endif; ?>
                    </div>

                    <div class="title">
                        <h2><?php the_title(); ?></h2>
                    </div>

                    <div class="comment-btn">
                        コメントを表示する
                        <div class="accordion-icon">
                            <span></span>
                        </div>
                    </div>

                    <?php if ($comment): ?>
                        <p class="comment">
                            <?php echo nl2br(esc_html($comment)); ?>
                        </p>
                    <?php endif; ?>
                </li>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<li>動画がまだ投稿されていません。</li>';
            endif;
            ?>
        </ul>


    </section>

    <div class="back-btn">
        <a href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/movies-accordion.js"></script>

</main>

<?php
get_footer();
