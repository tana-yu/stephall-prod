<?php


function my_setup()
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_setup' );

// デフォルトの「投稿」を管理画面から非表示にする
add_action('admin_menu', function() {
    remove_menu_page('edit.php'); // 投稿メニューを削除
});

// 「新規追加」や「投稿一覧」など個別のサブメニューも削除したい場合
add_action('admin_menu', function() {
    remove_submenu_page('edit.php', 'edit.php');          // 投稿一覧
    remove_submenu_page('edit.php', 'post-new.php');      // 新規追加
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // カテゴリー
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // タグ
});
