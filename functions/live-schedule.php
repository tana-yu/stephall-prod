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
            'name'          => 'ライブスケジュール',
            'singular_name' => 'ライブスケジュール',
            'add_new_item'  => '新しいスケジュールを追加',
            'edit_item'     => 'スケジュールを編集',
            'new_item'      => '新しいスケジュール',
            'view_item'     => 'スケジュールを見る',
            'search_items'  => 'スケジュールを検索',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => ['title', 'editor', 'thumbnail'], // editor を備考欄として利用
        'rewrite'       => ['slug' => 'live-schedule'],
        'show_in_rest'  => false, // Gutenberg無効化
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
        'normal',
        'high'
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
            <input type="date" name="schedule_date" value="<?= $schedule_date ?>" style="width:250px;" required />
        </label>
    </p>
    <p>
        <label><strong>時間帯（昼 or 夜）</strong><br>
            <label><input type="radio" name="day_or_night" value="" <?= $day_or_night === '' ? 'checked' : '' ?>> 選択しない</label>
            <label style="padding-left:20px;"><input type="radio" name="day_or_night" value="day" <?= $day_or_night === 'day' ? 'checked' : '' ?>> 昼</label>
            <label style="padding-left:20px;"><input type="radio" name="day_or_night" value="night" <?= $day_or_night === 'night' ? 'checked' : '' ?>> 夜</label>
        </label>
    </p>
    <p>
        <label><strong>OPEN</strong><br>
            <input type="text" name="open_time" value="<?= $open_time ?>" style="width:100%;" required />
        </label>
    </p>
    <p>
        <label><strong>START</strong><br>
            <input type="text" name="start_time" value="<?= $start_time ?>" style="width:100%;" required />
        </label>
    </p>
    <p>
        <label><strong>前売り価格</strong><br>
            <input type="text" name="adv_price" value="<?= $adv_price ?>" style="width:100%;" required />
        </label>
    </p>
    <p>
        <label><strong>当日価格</strong><br>
            <input type="text" name="door_price" value="<?= $door_price ?>" style="width:100%;" required />
        </label>
    </p>
    <p>
        <label><strong>出演者</strong><br>
            <textarea name="performers" rows="3" style="width:100%;" required><?= $performers ?></textarea>
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

    // 曜日自動設定（フルスペル英語表記）
    if (!empty($_POST['schedule_date'])) {
        $weekday = date('l', strtotime($_POST['schedule_date'])); // Monday, Tuesday...
        update_post_meta($post_id, 'schedule_weekday', $weekday);
    } else {
        delete_post_meta($post_id, 'schedule_weekday');
    }
}
add_action('save_post', 'save_live_schedule_meta_fields');

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

/**
 * サムネイル未設定時のno-image画像
 */
function live_schedule_thumbnail_with_default($post_id = null, $size = 'thumbnail') {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail($post_id, $size);
    } else {
        return '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/no-image.webp') . '" alt="No image" class="no-image" />';
    }
}

/**
 * View側の昼/夜アイコン出力
 */
function live_schedule_day_night_icon($post_id) {
    $day_or_night = get_post_meta($post_id, 'day_or_night', true);
    if ($day_or_night === 'day') {
        echo '<span class="day-icon">昼</span>';
    } elseif ($day_or_night === 'night') {
        echo '<span class="night-icon">夜</span>';
    }
}

/**
 * No Event チェック時に時間帯を「選択しない」に変更（管理画面用）
 */
function live_schedule_admin_js() {
    global $post_type;
    if ($post_type === 'live-schedule') {
        ?>
        <script>
        jQuery(document).ready(function($) {
            var $noEventCheckbox = $('input[name="no_event"]');
            var $dayOrNightRadios = $('input[name="day_or_night"]');

            $noEventCheckbox.on('change', function() {
                if ($(this).is(':checked')) {
                    // 「選択しない」にチェック
                    $dayOrNightRadios.filter('[value=""]').prop('checked', true);
                }
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'live_schedule_admin_js');


// 管理画面一覧にカスタム列を追加
add_filter('manage_edit-live-schedule_columns', function($columns) {
    $new_columns = [];
    foreach ($columns as $key => $label) {
        $new_columns[$key] = $label;
        if ($key === 'title') {
            $new_columns['schedule_date'] = '日付';
        }
    }
    return $new_columns;
});

// カスタム列に schedule_date を表示
add_action('manage_live-schedule_posts_custom_column', function($column_name, $post_id) {
    if ($column_name === 'schedule_date') {
        $schedule_date = get_post_meta($post_id, 'schedule_date', true);
        if (!empty($schedule_date)) {
            echo esc_html(date_i18n('Y年n月j日', strtotime($schedule_date)));
        } else {
            echo '—';
        }
    }
}, 10, 2);

// 並び替え可能にする
add_filter('manage_edit-live-schedule_sortable_columns', function($columns) {
    $columns['schedule_date'] = 'schedule_date';
    return $columns;
});

// 並び替えのクエリ調整
add_action('pre_get_posts', function($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->get('orderby') === 'schedule_date') {
        $query->set('meta_key', 'schedule_date');
        $query->set('orderby', 'meta_value');
        $query->set('meta_type', 'DATE');
    }
});
