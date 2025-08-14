<?php
// ==================================================
// カスタム投稿タイプ：live-schedule（ライブスケジュール）
// ==================================================

/**
 * 投稿タイプ登録
 */
function register_live_schedule_post_type() {
    register_post_type('live-schedule', [
        'labels' => [
            'name' => 'ライブスケジュール',
            'singular_name' => 'ライブスケジュール',
            'add_new_item' => '新しいスケジュールを追加',
            'edit_item' => 'スケジュールを編集',
            'new_item' => '新しいスケジュール',
            'view_item' => 'スケジュールを見る',
            'search_items' => 'スケジュールを検索',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title', 'editor', 'thumbnail'], // editor を備考欄として利用
        'rewrite' => ['slug' => 'live-schedule'],
        'show_in_rest' => false, // Gutenberg無効化
    ]);
}
add_action('init', 'register_live_schedule_post_type');


/**
 * live-schedule 投稿タイプだけクラシックエディターにする
 */
add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
    if ($post_type === 'live-schedule') return false;
    return $use_block_editor;
}, 10, 2);


/**
 * メタボックス追加
 */
function add_live_schedule_meta_boxes() {
    add_meta_box(
        'live_schedule_meta',
        'ライブ詳細情報',
        'render_live_schedule_meta_box',
        'live-schedule',
        'normal', // normalコンテキストで登録
        'high'    // 優先度高
    );
}
add_action('add_meta_boxes', 'add_live_schedule_meta_boxes');


/**
 * メタボックス内容
 */
function render_live_schedule_meta_box($post) {
    $schedule_date = esc_attr(get_post_meta($post->ID, 'schedule_date', true));
    $performers    = esc_textarea(get_post_meta($post->ID, 'performers', true));
    $open_time     = esc_attr(get_post_meta($post->ID, 'open_time', true));
    $start_time    = esc_attr(get_post_meta($post->ID, 'start_time', true));
    $adv_price     = esc_attr(get_post_meta($post->ID, 'adv_price', true));
    $door_price    = esc_attr(get_post_meta($post->ID, 'door_price', true));
    $day_or_night  = get_post_meta($post->ID, 'day_or_night', true);
    $no_event      = get_post_meta($post->ID, 'no_event', true);
    ?>

    <p>
        <label><strong>日付</strong><br>
            <input type="date" name="schedule_date" value="<?= $schedule_date ?>" style="width:250px;" />
        </label>
    </p>

    <p>
        <label><strong>時間帯（昼 or 夜）</strong><br>
            <label><input type="radio" name="day_or_night" value="day" <?= $day_or_night === 'day' ? 'checked' : '' ?>> 昼</label>
            <label style="padding-left:20px;"><input type="radio" name="day_or_night" value="night" <?= $day_or_night === 'night' ? 'checked' : '' ?>> 夜</label>
        </label>
    </p>

    <p>
        <label><strong>OPEN</strong><br>
            <input type="text" name="open_time" value="<?= $open_time ?>" style="width:100%;" />
        </label>
    </p>

    <p>
        <label><strong>START</strong><br>
            <input type="text" name="start_time" value="<?= $start_time ?>" style="width:100%;" />
        </label>
    </p>

    <p>
        <label><strong>前売り価格</strong><br>
            <input type="text" name="adv_price" value="<?= $adv_price ?>" style="width:100%;" />
        </label>
    </p>

    <p>
        <label><strong>当日価格</strong><br>
            <input type="text" name="door_price" value="<?= $door_price ?>" style="width:100%;" />
        </label>
    </p>

    <p>
        <label><strong>出演者</strong><br>
            <textarea name="performers" rows="3" style="width:100%;"><?= $performers ?></textarea>
        </label>
    </p>

    <p>
        <label>
            <input type="checkbox" name="no_event" value="1" <?= $no_event ? 'checked' : '' ?>>
            この投稿を「No Event」にする
        </label>
    </p>

    <?php
}


/**
 * メタボックスを本文の上に移動
 */
function move_live_schedule_meta_box_above_editor() {
    global $post, $wp_meta_boxes;

    if ($post && $post->post_type === 'live-schedule' && isset($wp_meta_boxes['live-schedule']['normal']['high']['live_schedule_meta'])) {
        $meta_box = $wp_meta_boxes['live-schedule']['normal']['high']['live_schedule_meta'];
        unset($wp_meta_boxes['live-schedule']['normal']['high']['live_schedule_meta']);

        add_action('edit_form_after_title', function() use ($meta_box) {
            echo '<div id="live-schedule-meta-box" class="postbox">';
            echo '<h2 class="hndle"><span>' . esc_html($meta_box['title']) . '</span></h2>';
            echo '<div class="inside">';
            call_user_func($meta_box['callback'], get_post());
            echo '</div>';
            echo '</div>';
        });
    }
}
add_action('edit_form_after_title', 'move_live_schedule_meta_box_above_editor', 0);


/**
 * 保存処理
 */
function save_live_schedule_meta_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $fields = [
        'schedule_date',
        'performers',
        'open_time',
        'start_time',
        'adv_price',
        'door_price',
        'day_or_night',
        'no_event',
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        } else {
            delete_post_meta($post_id, $field);
        }
    }

    // 曜日自動設定
    if (!empty($_POST['schedule_date'])) {
        $weekday = date_i18n('l', strtotime($_POST['schedule_date']));
        update_post_meta($post_id, 'schedule_weekday', $weekday);
    } else {
        delete_post_meta($post_id, 'schedule_weekday');
    }
}


/**
 * 本文エリアのラベルを「備考」に変更
 */
function change_editor_label_to_note() {
    global $post_type;
    if ($post_type === 'live-schedule') {
        echo '<script>
            jQuery(document).ready(function($) {
                $("#postdivrich h2").text("備考");
            });
        </script>';
    }
}
add_action('admin_footer', 'change_editor_label_to_note');
