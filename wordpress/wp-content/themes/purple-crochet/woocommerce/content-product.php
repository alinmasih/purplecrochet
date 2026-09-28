<?php
/**
 * The Loop file in WooCommerce → leave default behaviour but inside our card spec
 */
if ( ! defined('ABSPATH') ) exit;

global $product;
if ( empty( $product ) || ! $product->is_visible() ) return;
?>
<li <?php wc_product_class( '', $product ); ?>>
    <a href="<?php the_permalink(); ?>" class="product-card">
        <div class="product-card__img">
            <?php
            if ($product->is_on_sale()) echo '<span class="onsale">Loved</span>';
            echo woocommerce_get_product_thumbnail('medium_large');
            ?>
            <span class="product-card__quick">View piece</span>
        </div>
        <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
        <span class="price"><?php echo $product->get_price_html(); ?></span>
    </a>
</li>
