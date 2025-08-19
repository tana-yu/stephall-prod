<?php
get_template_part('parts/head'); // ← 共通 head 読み込み
?>

<header class="bottom-header">
    <a class="logo" href="<?php echo home_url(); ?>" rel="home">
        <?php echo tagImg('main-logo.svg', get_bloginfo('name'), 'logo'); ?>
    </a>
    
    <div class="hamburger-overlay"></div>
    <nav>
        <li>
            <a href="<?php echo home_url('about'); ?>">
                About
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('live-schedule'); ?>">
                Schedule
            </a>
        </li>
        <li>
            <a href="<?php echo home_url(''); ?>">
                HALL Info
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('news'); ?>">
                News
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('movies'); ?>">
                Movies
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('faq'); ?>">
                FAQ
            </a>
        </li>
        <li>
            <a href="<?php echo home_url('/#access'); ?>">
                ACCESS
            </a>
        </li>
        <li class="list-contact">
            <a href="<?php echo home_url('contact'); ?>">
                Contact
            </a>
        </li>
    </nav>

    <a href="<?php echo home_url('contact'); ?>" class="contact">
        Contact
    </a>

    <div class="hamburger-icon" tabindex="0">
        <span class="bar"></span>
    </div>
</header>
