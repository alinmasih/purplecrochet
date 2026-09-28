<?php
/**
 * Default index — list view
 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>

<main class="site-main">
    <section class="page-hero">
        <div class="container">
            <span class="h-eyebrow">Journal</span>
            <h1 class="display-2 page-hero__title" style="margin-top:12px;">From the studio.</h1>
        </div>
    </section>

    <div class="container" style="padding-bottom:100px;">
        <?php if (have_posts()) : ?>
            <div class="shop-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <a class="product-card" href="<?php the_permalink(); ?>">
                        <div class="product-card__img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['loading' => 'lazy']); ?>
                            <?php endif; ?>
                        </div>
                        <h3 class="product-card__title"><?php the_title(); ?></h3>
                        <div class="product-card__price"><?php echo get_the_date(); ?></div>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="lead">Nothing here yet.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
