<?php
get_header();
?>

 <main role="main"> 

<?php get_template_part('parts/page-top-menu'); ?>

    <div class="headline">
        <?php echo tagImg('/faq/headline.svg', 'FAQ'); ?>
        <span>よくある質問</span>
    </div>

    <section class="for-customer">
        <h2>来場者様からのご質問</h2>

        <dl>
            <div>
                <dt>
                    お手洗いはどこにありますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    地下駐車場にあります。一旦外に出て頂き、駐車場スロープを下りてもらった突き当たり右です。エレベーターで駐車場には下りれません。ビルの他の階のトイレを使うことは出来ません。
                    詳しくは、アーティストの皆さんからの、<a href="<?php echo home_url('movies'); ?>">トイレ案内動画</a>をご覧ください。
                </dd>
            </div>
            
            <div>
                <dt>
                    クローク、ロッカーはありますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    当ホールにはございません。駅構内のロッカーなどをご利用下さい。
                    イベントによっては、クロークを行う公演もあります。
                </dd>
            </div>

            <div>
                <dt>
                    別途ドリンクは幾らですか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    1stドリンクは一律で600円頂いております。
                </dd>
            </div>

            <div>
                <dt>
                    駅から何分ですか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    地下鉄梅田駅(ヨドバシカメラ横出口)より、徒歩10分。地下鉄中津駅5番出口より徒歩2分です。<a href="<?php echo home_url('/#access'); ?>">→ACCESS</a>
                </dd>
            </div>
            
            <div>
                <dt>
                    撮影は出来ますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    ホールとしては禁止はしておりませんが、アーティストさんのルールに従ってください。
                </dd>
            </div>

            <div>
                <dt>
                    チケットの予約は出来ますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    はい。基本的には電話、メールでお受けできますが、一部取り扱いの無いチケットもあります。
                </dd>
            </div>

            <div>
                <dt>
                    近くに買い物できる所はありますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    徒歩10分圏内に、茶屋町がありますので、様々お店があります。
                </dd>
            </div>
        </dl>
    </section>

    <section class="for-user">
        <h2>ご利用者様からのご質問</h2>

        <dl>
            <div>
                <dt>
                    キャパシティーは何人ですか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    着席で60名、スタンディングで100名です。
                </dd>
            </div>

            <div>
                <dt>
                    どんな機材がありますか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    <a href="">HALL spec</a>に、各種機材表があります。ご参照下さい。
                </dd>
            </div>

            <div>
                <dt>
                    ドリンク販売は必ず必要ですか？
                    <div class="accordion-icon">
                        <span></span>
                    </div>
                </dt>
                <dd>
                    ドリンク販売はつけさせていただいております。
                    ドリンク販売をせず公演を行われたい場合は、ドリンク保証をいただいております。
                    ドリンク保証を払って頂いたとしても、利用者様のドリンク販売はお断りしております。
                </dd>
            </div>
        </dl>

    </section>

    <div class="back-btn">
        <a href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/faq-accordion.js"></script>

</main>

<?php
get_footer();
