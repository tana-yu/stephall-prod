<?php

/*
 * functionsフォルダの中身を読み込み
 */
include_once(__DIR__.'/functions/settings.php');
include_once(__DIR__.'/functions/utils.php');
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

// CSS + JS 読み込み（タイムスタンプ付き）
function enqueue_theme_assets() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // CSS
    wp_enqueue_style(
        'layout-style',
        $theme_uri . '/assets/css/layout.css',
        [],
        filemtime($theme_dir . '/assets/css/layout.css')
    );

    wp_enqueue_style(
        'common-style',
        $theme_uri . '/assets/css/common.css',
        [],
        filemtime($theme_dir . '/assets/css/common.css')
    );

    wp_enqueue_style(
        'main-style',
        $theme_uri . '/assets/css/style.css',
        [],
        filemtime($theme_dir . '/assets/css/style.css')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');
