<?php
/**
 * Front page — the marketing home.
 */
if ( ! defined('ABSPATH') ) exit;

$DM = 'https://ig.me/m/purple.crochettt';
$IG = 'https://www.instagram.com/purple.crochettt/';

$reels = [
  ['v' => 'video_3789798629818223666.mp4', 'p' => 'post_3789798629818223666.jpg', 'tag' => 'Recent', 't' => 'Red scarf order',     'meta' => ['1.6K views', '64 likes']],
  ['v' => 'video_3911138402881692180.mp4', 'p' => 'post_3911138402881692180.jpg', 'tag' => 'Studio', 't' => 'Packing day',         'meta' => ['Today', 'Hyderabad']],
  ['v' => 'video_3911111365206993493.mp4', 'p' => 'post_3911111365206993493.jpg', 'tag' => 'New',    't' => 'Tulip flower',        'meta' => ['Made to order']],
  ['v' => 'video_3909847960370099027.mp4', 'p' => 'post_3909847960370099027.jpg', 'tag' => 'Loved',  't' => 'Crochet butterfly',   'meta' => ['Fan favourite']],
];

get_header();
?>

<section class="hero">
    <div class="container">
        <div class="hero__inner">
            <div class="reveal-stagger">
                <div class="hero__eyebrow">
                    <span class="pulse"></span>
                    <span style="font-size:13px;font-weight:500;color:var(--ink-soft);">Taking orders, ships pan-India</span>
                </div>
                <h1 class="display-1 hero__title">
                    Tiny things,<br>
                    made <em>by hand,</em><br>
                    <span class="underline">made with love.</span>
                </h1>
                <p class="lead hero__lead">
                    Crochet, amigurumi and gifts. Hooked one stitch at a time in Hyderabad, then sent to your door anywhere in India.
                </p>
                <div class="hero__ctas">
                    <a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-lg">
                        Order on Instagram <span class="arrow">→</span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-ghost btn-lg">
                        Browse the shop
                    </a>
                </div>
                <div class="hero__meta">
                    <div class="hero__meta-item">
                        <span class="num">240<span style="color:var(--purple);">+</span></span>
                        <span class="lab">Pieces hooked</span>
                    </div>
                    <div class="hero__meta-item">
                        <span class="num">1.8K</span>
                        <span class="lab">On Instagram</span>
                    </div>
                    <div class="hero__meta-item">
                        <span class="num">28</span>
                        <span class="lab">States shipped to</span>
                    </div>
                </div>
            </div>

            <div class="reveal" style="position:relative;">
                <div class="hero__phone">
                    <?php
                    $hv = pc_video_url('video_3789798629818223666.mp4');
                    $hp = pc_image_url('post_3789798629818223666.jpg', 'large');
                    if ($hv) {
                      echo '<video data-reel autoplay muted loop playsinline preload="metadata" poster="'.esc_url($hp).'"><source src="'.esc_url($hv).'" type="video/mp4"></video>';
                    } elseif ($hp) {
                      echo '<img src="'.esc_url($hp).'" alt="Purple Crochet reel">';
                    }
                    ?>
                </div>
                <span class="hero__phone-tag">@purple.crochettt</span>
                <div class="hero__sticker"><span class="heart">♥</span> Made just for you</div>
            </div>
        </div>
    </div>
</section>

<div class="marquee">
    <div class="marquee__track">
        <div class="marquee__item">Handmade in Hyderabad <span class="star">✦</span></div>
        <div class="marquee__item">Custom colours welcome <span class="star">✦</span></div>
        <div class="marquee__item">Pan-India shipping <span class="star">✦</span></div>
        <div class="marquee__item">Made to order, with care <span class="star">✦</span></div>
        <div class="marquee__item">Handmade in Hyderabad <span class="star">✦</span></div>
        <div class="marquee__item">Custom colours welcome <span class="star">✦</span></div>
        <div class="marquee__item">Pan-India shipping <span class="star">✦</span></div>
        <div class="marquee__item">Made to order, with care <span class="star">✦</span></div>
    </div>
</div>

<section class="featured">
    <div class="container">
        <div class="sec-head reveal">
            <div>
                <span class="h-eyebrow">Loved pieces</span>
                <h2 class="display-3 sec-head__title">Pick a piece <em class="h-italic">for someone you love.</em></h2>
            </div>
            <p class="sec-head__lead">Each one is hooked to order in your colours. Tap a piece to see the details, or message us for a custom shape.</p>
        </div>

        <?php
        $featured_pairs = [
            // [product slug fallback, hero image filename]
            ['crochet-mini-kitty-pouch',     'post_3901375958918309344.jpg'],
            ['crochet-butterfly-keychain',   'post_3909847960370099027.jpg'],
            ['crochet-tulip-flower',         'post_3911111365206993493.jpg'],
            ['crochet-daisy-cardigan',       'post_3583031019896589526.jpg'],
            ['crochet-keychain-set',         'post_3901080575504838179.jpg'],
        ];
        ?>

        <div class="featured__grid reveal-stagger">
            <?php foreach ($featured_pairs as $pair) :
                $slug = $pair[0]; $img = $pair[1];
                $p = get_page_by_path($slug, OBJECT, 'product');
                if (!$p) continue;
                $product = wc_get_product($p->ID);
                $url = get_permalink($p->ID);
                $img_url = pc_image_url($img, 'large');
                $title = get_the_title($p->ID);
                ?>
                <a href="<?php echo esc_url($url); ?>">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                    <div class="meta">
                        <h3><?php echo esc_html($title); ?></h3>
                        <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="reels">
    <div class="container">
        <div class="sec-head reveal">
            <div>
                <span class="h-eyebrow">From the studio</span>
                <h2 class="display-3 sec-head__title">Reels from the <em class="h-italic">workbench.</em></h2>
            </div>
            <p class="sec-head__lead">Real footage from the studio. The way each piece comes together, in colour, in motion, in a few seconds.</p>
        </div>

        <div class="reels__row reveal">
            <?php foreach ($reels as $r) :
                $vu = pc_video_url($r['v']);
                $pu = pc_image_url($r['p'], 'medium_large');
                if (!$vu) continue;
                ?>
                <div class="reel">
                    <video data-reel autoplay muted loop playsinline preload="metadata" poster="<?php echo esc_url($pu); ?>">
                        <source src="<?php echo esc_url($vu); ?>" type="video/mp4">
                    </video>
                    <span class="reel__badge"><?php echo esc_html($r['tag']); ?></span>
                    <div class="reel__caption">
                        <div class="t"><?php echo esc_html($r['t']); ?></div>
                        <div class="meta">
                            <?php foreach ($r['meta'] as $m) echo '<span>'.esc_html($m).'</span>'; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;margin-top:48px;" class="reveal">
            <a href="<?php echo esc_url($IG); ?>" target="_blank" rel="noopener" class="btn btn-light">
                Follow on Instagram <span class="arrow">→</span>
            </a>
        </div>
    </div>
</section>

<section class="story">
    <div class="container">
        <div class="story__grid">
            <div class="story__img reveal">
                <?php
                $story_img = pc_image_url('post_3911138402881692180.jpg', 'large');
                if ($story_img) echo '<img src="'.esc_url($story_img).'" alt="Packing a Purple Crochet order in Hyderabad">';
                ?>
            </div>
            <div class="story__body reveal">
                <span class="h-eyebrow">The maker</span>
                <h2 class="story__quote">
                    "Every piece is hooked at my desk, in colours someone asked for, with the kind of care that only fits in something small."
                </h2>
                <p>Purple Crochet started the way most small things start, with one ball of yarn and a free afternoon. A few keychains turned into a few orders, and the orders turned into a tiny brand with people across India waiting on something handmade.</p>
                <p>I make every piece personally. Cardigans, scarves, kitty pouches, butterflies on bags. Each order takes time because each one is made just for you, in the colours you ask for.</p>
                <div class="story__sig">— The maker, Hyderabad</div>
                <div style="margin-top:32px;">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn-ghost">Read the full story</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="steps">
    <div class="container">
        <div class="sec-head reveal" style="margin-bottom:40px;">
            <div>
                <span class="h-eyebrow">How an order works</span>
                <h2 class="display-3 sec-head__title">Three steps, <em class="h-italic">no fuss.</em></h2>
            </div>
            <p class="sec-head__lead">From DM to delivery. Most orders ship in 3 to 4 weeks because each piece is hooked just for you.</p>
        </div>
        <div class="steps__row reveal-stagger">
            <div class="step">
                <span class="step__num">01</span>
                <h3>Pick your piece</h3>
                <p>Browse the shop or DM what you have in mind. Tell us your colours.</p>
            </div>
            <div class="step">
                <span class="step__num">02</span>
                <h3>Place a prepaid order</h3>
                <p>Pay online to confirm. Standard shipping ₹60 anywhere in India.</p>
            </div>
            <div class="step">
                <span class="step__num">03</span>
                <h3>We hook it for you</h3>
                <p>Made by hand in 3 to 4 weeks, then sent to your door, packed with care.</p>
            </div>
        </div>
    </div>
</section>

<section class="featured" style="background:var(--cream-warm);">
    <div class="container">
        <div class="sec-head reveal">
            <div>
                <span class="h-eyebrow">The shop</span>
                <h2 class="display-3 sec-head__title">All the <em class="h-italic">little things.</em></h2>
            </div>
            <p class="sec-head__lead">Eight pieces in stock, plus custom orders by DM. Pick a colour, pick a size, we hook it for you.</p>
        </div>

        <div class="shop-grid reveal-stagger">
            <?php
            foreach (pc_get_products(8) as $p) {
                pc_product_card($p);
            }
            ?>
        </div>

        <div style="text-align:center;margin-top:56px;" class="reveal">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-ghost">View all pieces <span class="arrow">→</span></a>
        </div>
    </div>
</section>

<section class="gallery">
    <div class="container">
        <div class="sec-head reveal">
            <div>
                <span class="h-eyebrow">Recently shipped</span>
                <h2 class="display-3 sec-head__title">Bits and pieces from <em class="h-italic">the studio.</em></h2>
            </div>
            <p class="sec-head__lead">Snapshots of recent pieces, packed orders, and behind-the-scenes hours at the desk. Follow on Instagram to see more.</p>
        </div>

        <?php
        $gallery_imgs = [
          ['post_3901375958918305344.jpg', 'wide'], // wide first
          ['post_3911138402881692180.jpg', 'tall'],
          ['post_3909847960370099027.jpg', 'med'],
          ['post_3789798629818223666.jpg', 'med'],
          ['post_3911111365206993493.jpg', 'sml'],
          ['post_3907090215950711773.jpg', 'sml'],
          ['post_3901080575504838179.jpg', 'wide'],
          ['post_3901972354043238158.jpg', 'med'],
          ['post_3908313468572590167.jpg', 'med'],
          ['post_3583031019896589526.jpg', 'tall'],
          ['post_3901061065642844125.jpg', 'sml'],
        ];
        // first item slug had a typo on purpose; real one:
        $gallery_imgs[0][0] = 'post_3901375958918309344.jpg';
        ?>

        <div class="gallery__grid reveal-stagger">
            <?php foreach ($gallery_imgs as $g) :
                $url = pc_image_url($g[0], 'large');
                if (!$url) continue;
                ?>
                <div class="gallery__item <?php echo esc_attr($g[1]); ?>">
                    <img src="<?php echo esc_url($url); ?>" alt="Crochet by Purple Crochet" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <div class="sec-head reveal" style="grid-template-columns:1fr;text-align:center;">
            <div>
                <span class="h-eyebrow">Good to know</span>
                <h2 class="display-3 sec-head__title" style="max-width:none;margin:12px auto 0;">Questions, answered.</h2>
            </div>
        </div>

        <div class="faq__list reveal">
            <details class="faq__item" open>
                <summary><h3>How long until my piece is ready?</h3><span class="icn">+</span></summary>
                <div class="body">Each item is made by hand to order. Allow 3 to 4 weeks for most pieces, 1 to 2 weeks for smaller items like keychains and flowers. We share a small update photo before we ship.</div>
            </details>
            <details class="faq__item">
                <summary><h3>Do you take cash on delivery?</h3><span class="icn">+</span></summary>
                <div class="body">Not at this time. All orders are prepaid by UPI, card or net banking. This helps us only start work when an order is confirmed.</div>
            </details>
            <details class="faq__item">
                <summary><h3>How much is shipping?</h3><span class="icn">+</span></summary>
                <div class="body">Standard shipping is ₹60 anywhere in India. We pack each piece carefully with bubble wrap and a hand written note.</div>
            </details>
            <details class="faq__item">
                <summary><h3>Can I ask for custom colours?</h3><span class="icn">+</span></summary>
                <div class="body">Yes, please. Most of our favourite pieces started as a custom colour ask on DM. Send us a colour you love and we will hook to match.</div>
            </details>
            <details class="faq__item">
                <summary><h3>Do you take bulk and gifting orders?</h3><span class="icn">+</span></summary>
                <div class="body">Yes. Return gifts, hampers, brand favours, all welcome. DM us with how many pieces and the timeline and we will quote you.</div>
            </details>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <div class="cta__inner reveal">
            <span class="h-eyebrow" style="color:var(--lavender);">Last word</span>
            <h2 class="display-2" style="margin-top:18px;">Ready to order <em class="h-italic">something soft?</em></h2>
            <p>Send a DM with the colours and shape you have in mind. We reply within a day, usually a lot sooner.</p>
            <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener" class="btn btn-light btn-lg">DM Purple Crochet <span class="arrow">→</span></a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-lg" style="background:transparent;color:#fff;border:1.5px solid rgba(255,255,255,0.4);">Or send a note</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
