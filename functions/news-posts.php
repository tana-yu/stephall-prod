<?php
/**
 * NEWS
 */

// お知らせ投稿タイプ追加
function create_news_post_type() {
    register_post_type('news', array(
        'labels' => array(
            'name'          => 'お知らせ',
            'singular_name' => 'お知らせ',
            'add_new'       => '新規追加',
            'add_new_item'  => 'お知らせを追加',
            'edit_item'     => 'お知らせを編集',
            'new_item'      => '新しいお知らせ',
            'view_item'     => 'お知らせを表示',
            'search_items'  => 'お知らせを検索',
            'not_found'     => 'お知らせが見つかりません',
            'not_found_in_trash' => 'ゴミ箱にお知らせはありません',
            'all_items'     => 'お知らせ一覧',
            'menu_name'     => 'お知らせ',
        ),
        'public'        => true,
        'has_archive'   => true, // アーカイブON → /news/ で一覧が出る
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-megaphone', // アイコンはお好みで
        'supports'      => array('title','editor','thumbnail'), // タイトル、クラシックエディター、サムネイルのみ
        'rewrite'       => array('slug' => 'news', 'with_front' => false), // /news/ 配下
        'show_in_rest'  => false, // Gutenberg無効
    ));
}
add_action('init', 'create_news_post_type');

// カテゴリ・タグを外す（不要なら）
function remove_news_taxonomies() {
    unregister_taxonomy_for_object_type('category', 'news');
    unregister_taxonomy_for_object_type('post_tag', 'news');
}
add_action('init', 'remove_news_taxonomies');
