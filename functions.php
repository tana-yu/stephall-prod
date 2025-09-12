<?php

/*
 * functionsフォルダの中身を読み込み
 */
include_once(__DIR__.'/functions/settings.php');
include_once(__DIR__.'/functions/utils.php');
include_once(__DIR__.'/functions/live-schedule.php');
include_once(__DIR__.'/functions/live-schedule-bulk-create.php');
include_once(__DIR__.'/functions/news-posts.php');
include_once(__DIR__.'/functions/movies-posts.php');
include_once(__DIR__.'/functions/pdf-posts.php');

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

    wp_enqueue_script(
        'hamburger-menu',
        $theme_uri . '/assets/js/hamburger-menu.js',
        [],
        filemtime($theme_dir . '/assets/js/hamburger-menu.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// スライダー
function enqueue_splide_assets() {
    // Splide 本体の CSS・JS
    wp_enqueue_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css');
    wp_enqueue_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', [], null, true);

    // AutoScroll 拡張（※splide-jsの後に読み込む）
    wp_enqueue_script('splide-autoscroll', 'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.1/dist/js/splide-extension-auto-scroll.min.js', ['splide-js'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_splide_assets');
