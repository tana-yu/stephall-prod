<?php
get_header();
?>

    <?php get_template_part('parts/page-top-menu'); ?>

    <div class="headline">
        <?php echo tagImg('/about/headline.svg', 'About'); ?>
        <span>StepHALLについて</span>
    </div>

    <ul class="anker-links">
        <li><a href="#hall_rental">HALL Rental</a></li>
        <li><a href="#hall_spec">HALL spec</a></li>
        <li><a href="#floor">Floor</a></li>
        <li><a href="#gear-rental-staff-dispatch">Gear Rental</a></li>
    </ul>

    <section class="leading">
        <div class="images">
            <?php echo tagImg('/about/leading1.webp', ''); ?>
            <?php echo tagImg('/about/leading2.webp', ''); ?>
        </div>
        <p>
            StepHALLは20XX年に旧ミノヤホールから名前を変えたウンタラカンタラ<br>
            ウンタラカンタラウンタラカンタラウンタラカンタラウンタラカンタラウンタラカンタラ<br>ウンタラカンタラウンタラカンタラウンタラカンタラStepHALLは20XX年に旧ミノヤホールから名前を変えたウンタラカンタラ
        </p>
        <dl class="info">
            <div>
                <dt>収容人数</dt>
                <dd>
                    スタンディング：100名<br>
                    着席：55名
                </dd>
            </div>
            <div>
                <dt>面積</dt>
                <dd>
                    フロア：<br>
                    ステージ：
                </dd>
            </div>
            <div>
                <dt>所在地</dt>
                <dd>
                    〒531-0071<br>
                    大阪市北区中津1-2-18ミノヤビル1F
                </dd>
            </div>
            <div>
                <dt>設備</dt>
                <dd>
                    楽屋・トイレ・喫煙スペース
                </dd>
            </div>
            <div>
                <dt>電話番号</dt>
                <dd>
                    <a href="tel:06-6371-2264">06-6371-2264</a> (13:00〜22:00)<br>
                    不在の時やイベント中対応出来ない時など留守番電話に切り替わりますので用件を残して下さい。
                </dd>
            </div>
        </dl>
    </section>

    <section id="hall_rental" class="hall_rental">
        <div class="sub-headline">
            <?php echo tagImg('/about/hall-rental-headline.webp', 'Hall Rental'); ?>
            <span>ホールレンタル</span>
        </div>

        <div class="splide-slider splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide"><?php echo tagImg('/about/hall-rental1.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/hall-rental2.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/hall-rental3.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/hall-rental4.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/hall-rental5.webp', ''); ?></li>
                </ul>
            </div>
        </div>

        <p>
            定期イベント・自主企画・トークショー・お笑いなどイベント大募集中です！<br>
            皆さんの最高の思い出になるライブを一緒に作りませんか？<br>
            小さなことでも、まずご相談ください！<br>
            お問い合わせフォームからご連絡お待ちしております！
        </p>

        <dl class="info">
            <div>
                <dt>利用料</dt>
                <dd>
                    平日：60,000円〜　週末：80,000円〜<br>
                    ※昼夜、祝日、土日により料金が異なります。<br>
                    ※詳細は<button class="inline-pdf">price list</button>から
                </dd>
            </div>
            <div>
                <dt>配信</dt>
                <dd>
                    20,000円〜
                </dd>
            </div>
        </dl>
    </section>

    <section id="hall_spec" class="hall_spec">
        <div class="sub-headline">
            <?php echo tagImg('/about/hall-spec-headline.webp', 'Hall Spec'); ?>
            <span>機材・照明などのリスト</span>
        </div>

        <ul>
            <li>
                <button>
                    <p>Price list</p>
                    <span>料金表</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Agreement</p>
                    <span>誓約書</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Sound System</p>
                    <span>音響機材</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Lighting System</p>
                    <span>照明機材</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Instruments</p>
                    <span>楽器機材</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Lighting Diagram</p>
                    <span>照明回路図</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Fader Layout</p>
                    <span>フェーダー表</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Stage Layout</p>
                    <span>舞台図面</span>
                </button>
            </li>
        </ul>
    </section>

    <section id="gear-rental-staff-dispatch" class="gear-rental-staff-dispatch">
        <div class="sub-headline">
            <?php echo tagImg('/about/gear-rental-staff-dispatch-headline-sp.webp', 'Gear-Rental-Staff-Dispatch', 'sp-only'); ?>
            <?php echo tagImg('/about/gear-rental-staff-dispatch-headline-pc.webp', 'Gear-Rental-Staff-Dispatch', 'pc-only'); ?>
            <span>機材レンタル・人材派遣</span>
        </div>

        <div class="splide-slider splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide"><?php echo tagImg('/about/gear-rental-staff-dispatch1.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/gear-rental-staff-dispatch2.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/gear-rental-staff-dispatch3.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/gear-rental-staff-dispatch4.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/gear-rental-staff-dispatch5.webp', ''); ?></li>
                </ul>
            </div>
        </div>
        
        <p>
            StepHALLでは、イベントの機材レンタル＆スタッフ派遣を行っています。<br>
            ​詳しくはお問い合わせ下さい。出演者の方は、チケットノルマで払う事も可能です。<br>
            ​所持機材の内容に関しては、機材表をご覧ください。
        </p>

        <dl class="info">
            <div>
                <dt>レンタル費(例)</dt>
                <dd>
                    よくある例を載せる<br>
                    ※詳しい料金表は<button class="inline-pdf">コチラ</button>
                </dd>
            </div>
        </dl>

        <ul>
            <li>
                <button>
                    <p>Rental Equipment</p>
                    <span>レンタル機材表</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Rental Instruments</p>
                    <span>楽器機材表</span>
                </button>
            </li>
        </ul>

    </section>

    <section id="floor" class="floor">
        <div class="sub-headline">
            <?php echo tagImg('/about/floor-headline.webp', 'Floor'); ?>
            <span>フロアマップ・座席表</span>
        </div>

        <div class="splide-slider splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide"><?php echo tagImg('/about/floor1.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/floor2.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/floor3.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/floor4.webp', ''); ?></li>
                    <li class="splide__slide"><?php echo tagImg('/about/floor5.webp', ''); ?></li>
                </ul>
            </div>
        </div>

        <?php echo tagImg('/about/drowing.webp', 'StepHALLホール平面図'); ?>
        
        <ul>
            <li>
                <button>
                    <p>Seating Chart</p>
                    <span>座席表</span>
                </button>
            </li>
            <li>
                <button>
                    <p>Stage Layout</p>
                    <span>舞台図面</span>
                </button>
            </li>
        </ul>
    </section>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/about-slider.js"></script>

<?php
get_footer();
