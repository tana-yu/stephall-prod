<?php
/**
 * 管理画面に「PDF投稿」専用メニューを追加
 * 一覧・タイトルなし、PDFアップロード欄だけ
 */

/**
 * メニュー追加
 */
add_action('admin_menu', function () {
    add_menu_page(
        'PDF投稿',                // ページタイトル
        'PDF投稿',                // メニュータイトル
        'manage_options',         // 権限
        'pdf_upload_page',        // スラッグ
        'render_pdf_upload_page', // コールバック
        'dashicons-media-document', // アイコン
        5                         // メニュー位置
    );
});

/**
 * アップロード画面の描画
 */
function render_pdf_upload_page() {
    // 保存処理
    if (isset($_POST['pdf_upload_nonce']) && wp_verify_nonce($_POST['pdf_upload_nonce'], 'save_pdf_uploads')) {
        $fields = get_pdf_fields();
        foreach ($fields as $key => $label) {
            if (isset($_POST[$key])) {
                update_option($key, esc_url_raw($_POST[$key]));
            }
        }
        echo '<div class="updated"><p>PDFファイルを更新しました。</p></div>';
    }

    $fields = get_pdf_fields();
    ?>
    <div class="wrap">
        <h1>PDFアップロード</h1>
        <form method="post">
            <?php wp_nonce_field('save_pdf_uploads', 'pdf_upload_nonce'); ?>
            <table class="form-table">
                <tbody>
                <?php foreach ($fields as $key => $label): 
                    $value = get_option($key, '');
                ?>
                    <tr>
                        <th scope="row"><?php echo esc_html($label); ?></th>
                        <td>
                            <input type="text" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo esc_attr($value); ?>" size="60">
                            <button class="button upload-pdf-button" data-target="<?php echo $key; ?>">ファイルを選択</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php submit_button('保存'); ?>
        </form>
    </div>
    <?php
}

/**
 * フィールド一覧
 */
function get_pdf_fields() {
    return [
        'price_list'        => '料金表',
        'agreement'         => '誓約書',
        'sound_system'      => '音響機材',
        'lighting_system'   => '照明機材',
        'instruments'       => '楽器機材',
        'lighting_diagram'  => '照明回路図',
        'fader_layout'      => 'フェーダー表',
        'stage_layout'      => '舞台図面',
        'rental_equipment'  => 'レンタル機材表',
        'rental_instruments'=> '楽器機材表',
        'seating_chart'     => '座席表',
    ];
}

/**
 * 管理画面用JSの読み込み
 */
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'toplevel_page_pdf_upload_page') {
        wp_enqueue_media();
        wp_enqueue_script('pdf-upload', get_template_directory_uri() . '/assets/js/pdf-upload.js', ['jquery'], null, true);
    }
});
