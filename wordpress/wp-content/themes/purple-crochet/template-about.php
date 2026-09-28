<?php
/**
 * Template Name: About
 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>

<main class="site-main">
    <section class="page-hero">
        <div class="container">
            <span class="h-eyebrow">The maker</span>
            <h1 class="display-1 page-hero__title" style="margin-top:18px;">A little<br><em class="h-italic" style="color:var(--purple);">about us.</em></h1>
            <p class="lead" style="margin-top:24px;max-width:540px;">Hooked one stitch at a time, in Hyderabad, by hands that love the craft.</p>
        </div>
    </section>

    <section style="padding:60px 0 100px;">
        <div class="container">
            <div class="story__grid">
                <div class="story__img reveal">
                    <?php
                    $img = pc_image_url('post_3911138402881692180.jpg', 'large');
                    if ($img) echo '<img src="'.esc_url($img).'" alt="Packing day at Purple Crochet">';
                    ?>
                </div>
                <div class="story__body reveal">
                    <p>Purple Crochet started the way most small things start. One ball of yarn and a free afternoon. A few keychains turned into a few orders, and the orders turned into a small brand with people across India waiting on something handmade.</p>
                    <p>I make every piece personally. Cardigans, scarves, kitty pouches, butterflies on bags, four-leaf clovers tucked into greeting cards. Each order takes time because each one is made just for you, in the colours you ask for, with the kind of care a real person puts into a thing they will not see again.</p>
                    <p>Most orders come through Instagram DM. The shop on this site has the regulars. If you have something in mind that is not here, message me, that is how the best pieces tend to start.</p>
                    <div class="story__sig">— The maker, Hyderabad</div>
                </div>
            </div>
        </div>
    </section>

    <section style="background:var(--cream-warm);padding:100px 0;">
        <div class="container">
            <div class="sec-head reveal">
                <div>
                    <span class="h-eyebrow">How we work</span>
                    <h2 class="display-3 sec-head__title">A small studio with <em class="h-italic">a few simple rules.</em></h2>
                </div>
            </div>
            <div class="steps__row reveal-stagger">
                <div class="step"><span class="step__num">①</span><h3>Made by hand</h3><p>One piece at a time, by these hands. No factory runs, no shortcuts.</p></div>
                <div class="step"><span class="step__num">②</span><h3>Your colours</h3><p>Custom colour requests welcome on every piece. Just ask.</p></div>
                <div class="step"><span class="step__num">③</span><h3>Prepaid only</h3><p>Confirms each order so we only start work on real ones.</p></div>
                <div class="step"><span class="step__num">④</span><h3>Pan-India shipping</h3><p>Standard shipping ₹60. Packed with bubble wrap and a note.</p></div>
                <div class="step"><span class="step__num">⑤</span><h3>3 to 4 weeks</h3><p>Most orders take that long because they are hooked just for you.</p></div>
                <div class="step"><span class="step__num">⑥</span><h3>From Hyderabad</h3><p>Made and shipped from Hyderabad, India.</p></div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta__inner reveal">
                <h2 class="display-2">Want something <em class="h-italic">just for you?</em></h2>
                <p>DM with the shape, the colours, the timeline. We take it from there.</p>
                <a href="https://ig.me/m/purple.crochettt" target="_blank" rel="noopener" class="btn btn-light btn-lg">Open Instagram DM <span class="arrow">→</span></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
