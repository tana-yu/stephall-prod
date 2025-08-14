<?php

// ==================================================
// live-schedule一括生成機能
// ==================================================


// No Event 一括作成メニュー追加
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=live-schedule',
        'No Event一括作成',
        'No Event一括作成',
        'manage_options',
        'no-event-bulk-create',
        'render_no_event_bulk_page'
    );
});

// ページ内容
function render_no_event_bulk_page() {
    if (isset($_POST['year'], $_POST['month'])) {
        $year  = (int) $_POST['year'];
        $month = (int) $_POST['month'];
        $count = create_no_event_posts_for_month($year, $month);
        echo '<div class="updated"><p>' . esc_html($count) . ' 件の投稿を作成しました。</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>No Event 一括作成</h1>
        <form method="post">
            <label>年: <input type="number" name="year" value="<?php echo date('Y'); ?>" required></label>
            <label>月: <input type="number" name="month" min="1" max="12" value="<?php echo date('n'); ?>" required></label>
            <p><input type="submit" class="button button-primary" value="作成する"></p>
        </form>
    </div>
    <?php
}

// 投稿作成処理
function create_no_event_posts_for_month($year, $month) {
    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $created_count = 0;

    for ($day = 1; $day <= $days_in_month; $day++) {
        $date_str = sprintf('%04d-%02d-%02d', $year, $month, $day);

        // 重複チェック
        $exists = get_posts([
            'post_type'  => 'live-schedule',
            'meta_key'   => 'schedule_date',
            'meta_value' => $date_str,
            'post_status'=> 'any',
            'fields'     => 'ids',
        ]);
        if ($exists) continue;

        // 投稿作成
        $post_id = wp_insert_post([
            'post_title'  => 'No Event',
            'post_type'   => 'live-schedule',
            'post_status' => 'publish',
        ]);

        if ($post_id) {
            update_post_meta($post_id, 'schedule_date', $date_str);
            update_post_meta($post_id, 'no_event', 1);
            update_post_meta($post_id, 'day_or_night', '');
            update_post_meta($post_id, 'performers', '');
            update_post_meta($post_id, 'open_time', '');
            update_post_meta($post_id, 'start_time', '');
            update_post_meta($post_id, 'adv_price', '');
            update_post_meta($post_id, 'door_price', '');
            update_post_meta($post_id, 'schedule_weekday', date('l', strtotime($date_str)));

            $created_count++;
        }
    }
    return $created_count;
}

// 管理画面のライブスケジュール一覧をデフォルトで日付順に
add_action('pre_get_posts', function($query) {
    // 管理画面のメインクエリかつ投稿タイプが live-schedule の場合のみ
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'live-schedule') {
        // 並び替え指定がない場合は schedule_date 昇順にする
        if (!$query->get('orderby')) {
            $query->set('meta_key', 'schedule_date');
            $query->set('orderby', 'meta_value');
            $query->set('meta_type', 'DATE');
            $query->set('order', 'ASC');
        }
    }
});
