<?php
/**
 * 404
 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>

<main class="site-main">
    <section class="page-hero" style="text-align:center;padding:200px 0 100px;">
        <div class="container-narrow">
            <span class="h-eyebrow">Lost stitch</span>
            <h1 class="display-1" style="margin:18px 0;">404</h1>
            <p class="lead" style="margin-bottom:36px;">This page slipped off the hook. Try the shop or head back home.</p>
            <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Back home</a>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-ghost">Browse the shop</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
