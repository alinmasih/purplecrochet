<?php
/**
 * Generic page template
 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>

<main class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <section class="page-hero">
            <div class="container">
                <span class="h-eyebrow"><?php echo esc_html(get_post_meta(get_the_ID(), '_pc_eyebrow', true) ?: 'Purple Crochet'); ?></span>
                <h1 class="display-1 page-hero__title" style="margin-top:18px;"><?php the_title(); ?></h1>
                <?php if (get_post_meta(get_the_ID(), '_pc_lead', true)) : ?>
                    <p class="lead"><?php echo esc_html(get_post_meta(get_the_ID(), '_pc_lead', true)); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <article class="prose">
            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
