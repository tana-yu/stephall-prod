<?php

/*
 * functionsフォルダの中身を読み込み
 */
// include_once(__DIR__.'/functions/settings.php');
// include_once(__DIR__.'/functions/utils.php');
// include_once(__DIR__.'/functions/reform-works-posts.php');
// include_once(__DIR__.'/functions/mid-career-recruitment-posts.php');
// include_once(__DIR__.'/functions/new-graduates-recruitment-posts.php');

// コンタクトフォームで不要な自動生成タグ削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

// bodyタグにスラッグのクラス名付与
add_filter( 'body_class', 'my_class_names' );

function my_class_names( $classes ) {
    global $post;
    if ($post && preg_match("/^[a-zA-Z0-9_-]+$/", $post->post_name))
    {
        $classes[] = $post->post_name;
    }
    return $classes;
}
