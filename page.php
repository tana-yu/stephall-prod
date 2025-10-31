<?php
get_header();
?>

<main role="main" class="custom-page">

    <?php get_template_part('parts/page-top-menu'); ?>

    <div class="inner">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>

                <article <?php post_class(); ?>>
                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <div class="page-content">
                        <?php the_content(); // ← グーテンバーグ編集内容を反映 ?>
                    </div>
                </article>

            <?php endwhile;
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
?>
