<?php
/**
 * Template Name: Contact
 */
if ( ! defined('ABSPATH') ) exit;
get_header();
$DM = 'https://ig.me/m/purple.crochettt';
$IG = 'https://www.instagram.com/purple.crochettt/';
$cf7 = get_posts(['post_type'=>'wpcf7_contact_form','numberposts'=>1,'fields'=>'ids']);
$cf7_id = $cf7 ? $cf7[0] : 0;
?>

<main class="site-main">
    <section class="page-hero">
        <div class="container">
            <span class="h-eyebrow">Say hello</span>
            <h1 class="display-1 page-hero__title" style="margin-top:18px;">Let's <em class="h-italic" style="color:var(--purple);">talk yarn.</em></h1>
            <p class="lead" style="margin-top:24px;max-width:540px;">DM is the fastest way to get a reply. Or send a note here, we will write back within a day.</p>
        </div>
    </section>

    <div class="container">
        <div class="contact-grid reveal-stagger">
            <div class="contact-info">
                <h3 class="serif">Find us here</h3>
                <dl>
                    <dt>Instagram</dt>
                    <dd><a href="<?php echo esc_url($IG); ?>" target="_blank" rel="noopener">@purple.crochettt</a></dd>
                    <dt>Where we ship</dt>
                    <dd>Pan-India. Standard shipping ₹60.</dd>
                    <dt>Where we are</dt>
                    <dd>Hyderabad, Telangana, India</dd>
                    <dt>DM hours</dt>
                    <dd>Mon to Sat, usually within a few hours</dd>
                    <dt>Bulk and gifting</dt>
                    <dd>Yes, please. Tell us how many and by when.</dd>
                </dl>
                <a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener" class="btn btn-primary">Open Instagram DM <span class="arrow">→</span></a>
            </div>

            <div class="contact-form">
                <h3 class="serif" style="margin-bottom:18px;">Or write to us</h3>
                <p class="muted" style="margin-bottom:24px;font-size:15px;">Name, what you have in mind, and roughly when you need it. We will write back.</p>
                <?php if ($cf7_id) echo do_shortcode('[contact-form-7 id="'.$cf7_id.'" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
