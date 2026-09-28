<?php get_header(); ?>
<main class="container">
    <div class="hero">
        <h1>Handmade Crochet with Love ✨</h1>
        <p>Discover our beautiful collection of crochet cardigans, plushies, keychains, and accessories.</p>
        <a href="/shop" class="button">Shop the Collection</a>
    </div>

    <h2 style="text-align: center; margin-top: 60px;">Latest Arrivals</h2>
    <div class="products-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
        ?>
    </div>
</main>
<?php get_footer(); ?>
