<?php
/**
 * Single product page wrapper
 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>
<main class="site-main">
    <div class="container" style="padding-top:120px;">
        <?php while (have_posts()) : the_post(); wc_get_template_part('content', 'single-product'); endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
