<?php
/**
 * 動画カスタム投稿タイプ + YouTube埋め込み機能
 */

// --------------------------------------------------
// 1. カスタム投稿タイプ「videos」を追加
// --------------------------------------------------
function register_videos_post_type() {
    register_post_type('videos', [
        'labels' => [
            'name'          => '動画',
            'singular_name' => '動画',
            'menu_name'     => 'トイレ動画',
            'add_new'       => '新規追加',
            'add_new_item'  => '動画を追加',
            'edit_item'     => '動画を編集',
            'new_item'      => '新しい動画',
            'view_item'     => '動画を見る',
            'search_items'  => '動画を検索',
            'not_found'     => '動画が見つかりません',
        ],
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => ['slug' => 'videos'],
        'supports'    => ['title'], 
        'menu_icon'   => 'dashicons-video-alt3',
        'show_in_rest'=> true,
    ]);
}
add_action('init', 'register_videos_post_type');


// --------------------------------------------------
// 2. メタボックス追加（YouTube URL + コメント）
// --------------------------------------------------
function add_videos_meta_box() {
    add_meta_box(
        'videos_meta_box',
        '動画情報',
        'render_videos_meta_box',
        'videos',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_videos_meta_box');

function render_videos_meta_box($post) {
    $youtube_url = get_post_meta($post->ID, 'video_url', true);
    $comment     = get_post_meta($post->ID, 'video_comment', true);
    ?>
    <p>
        <label for="video_url"><strong>YouTube URL</strong>（例: https://www.youtube.com/watch?v=xxxxxx または https://youtu.be/xxxxxx）</label><br>
        <input type="url" name="video_url" id="video_url" value="<?php echo esc_attr($youtube_url); ?>" style="width:100%;">
    </p>
    <p>
        <label for="video_comment"><strong>コメント</strong></label><br>
        <textarea name="video_comment" id="video_comment" rows="8" style="width:100%;"><?php echo esc_textarea($comment); ?></textarea>
    </p>
    <?php
}

// 保存処理
function save_videos_meta_box($post_id) {
    if (array_key_exists('video_url', $_POST)) {
        update_post_meta($post_id, 'video_url', esc_url_raw($_POST['video_url']));
    }
    if (array_key_exists('video_comment', $_POST)) {
        update_post_meta($post_id, 'video_comment', sanitize_textarea_field($_POST['video_comment']));
    }
}
add_action('save_post', 'save_videos_meta_box');


// --------------------------------------------------
// 3. YouTube URL → embed URL 変換関数
// --------------------------------------------------
function convert_youtube_url_to_embed($url) {
    // watch?v=xxxxx の形式
    if (preg_match('/watch\?v=([^\&\?\/]+)/', $url, $id)) {
        return 'https://www.youtube.com/embed/' . $id[1];
    }
    // youtu.be/xxxxx の形式
    if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
        return 'https://www.youtube.com/embed/' . $id[1];
    }
    return '';
}
