<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />


    <meta name="description" content="大阪・中津のライブハウス StepHALL。音楽と人がつながる場所。出演者募集中・ブッキング・レンタル受付中。">
    <meta name="keywords" content="StepHALL, ステップホール, ライブハウス, 大阪, 中津, バンド, ライブ, 音楽, イベント">
    <meta name="author" content="StepHALL">

    <meta name="theme-color" content="#D90000">

    <meta http-equiv="X-Content-Type-Options" content="nosniff">

    <!-- OGP -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="StepHALL | 中津のライブハウス">
    <meta property="og:description" content="大阪・中津のライブハウス StepHALL の公式サイトです。イベント情報や出演アーティスト情報はこちら。">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp.png">
    <meta property="og:site_name" content="StepHALL">
    <meta property="og:locale" content="ja_JP">

    <!-- Twitter（LINEも参照） -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="StepHALL | 中津のライブハウス">
    <meta name="twitter:description" content="大阪・中津のライブハウス StepHALL の公式サイトです。">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp.png">

    <!-- 推奨: キャッシュ更新・LINE対策用 -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=League+Script&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
     
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
