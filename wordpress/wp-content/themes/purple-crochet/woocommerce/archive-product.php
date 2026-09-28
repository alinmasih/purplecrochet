<?php
/**
 * Shop archive (and product category archives)
 */
if ( ! defined('ABSPATH') ) exit;
get_header();
?>
<main class="site-main">
    <?php
    /**
     * Hook: woocommerce_before_main_content
     */
    do_action( 'woocommerce_before_main_content' );
    ?>

    <header class="woocommerce-products-header">
        <h1 class="woocommerce-products-header__title page-title">
            <?php woocommerce_page_title(); ?>
        </h1>
    </header>

    <?php
    if ( woocommerce_product_loop() ) {
        woocommerce_product_loop_start();
        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();
                wc_get_template_part( 'content', 'product' );
            }
        }
        woocommerce_product_loop_end();
        do_action( 'woocommerce_after_shop_loop' );
    } else {
        do_action( 'woocommerce_no_products_found' );
    }

    do_action( 'woocommerce_after_main_content' );
    ?>
</main>
<?php get_footer(); ?>
