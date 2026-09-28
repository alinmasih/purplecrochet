<?php
/**
 * Purple Crochet — theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ---------------- theme setup ---------------- */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('responsive-embeds');
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ]);
});

/* ---------------- enqueue ---------------- */
add_action('wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get('Version');
    wp_enqueue_style('pc-style', get_stylesheet_uri(), [], $ver);

    // Google Fonts: Cormorant Garamond + Inter
    wp_enqueue_style('pc-fonts',
      'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap',
      [], null
    );

    wp_enqueue_script('pc-app', get_template_directory_uri() . '/assets/app.js', [], $ver, true);
});

/* ---------------- media helpers ---------------- */
/**
 * Look up an attachment ID by its original filename (e.g. video_xxx.mp4).
 * Caches results in a single option so we only query once per filename.
 */
function pc_media_id($filename) {
    static $cache = null;
    if ($cache === null) {
        $cache = get_option('pc_media_cache', []);
        if (!is_array($cache)) $cache = [];
    }
    if (isset($cache[$filename])) return (int) $cache[$filename];

    global $wpdb;
    $like = '%' . $wpdb->esc_like($filename);
    $id = $wpdb->get_var( $wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
        $like
    ));
    $id = (int) $id;
    if ($id) {
        $cache[$filename] = $id;
        update_option('pc_media_cache', $cache, false);
    }
    return $id;
}

function pc_image_url($filename, $size = 'large') {
    $id = pc_media_id($filename);
    if (!$id) return '';
    $src = wp_get_attachment_image_src($id, $size);
    return $src ? $src[0] : wp_get_attachment_url($id);
}

function pc_image($filename, $size = 'large', $attrs = []) {
    $id = pc_media_id($filename);
    if (!$id) return '';
    return wp_get_attachment_image($id, $size, false, $attrs);
}

function pc_video_url($filename) {
    $id = pc_media_id($filename);
    return $id ? wp_get_attachment_url($id) : '';
}

/* ---------------- Woo: header isn't double counted ---------------- */
function pc_cart_count() {
    if (function_exists('WC') && WC()->cart) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/* AJAX-refresh of the cart count fragment */
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $count = pc_cart_count();
    ob_start(); ?>
    <span class="cart-count<?php echo $count ? ' is-active' : ''; ?>"><?php echo (int) $count; ?></span>
    <?php
    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
});

/* ---------------- Woo template wrappers (use our header/footer cleanly) ---------------- */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', function () {
    echo '<main class="site-main woo-main"><div class="container">';
}, 10);
add_action('woocommerce_after_main_content', function () {
    echo '</div></main>';
}, 10);

/* sidebars off everywhere */
add_filter('woocommerce_show_page_title', '__return_true');
add_filter('woocommerce_sidebar_enabled', '__return_false');
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/* shop columns */
add_filter('loop_shop_columns', function () { return 4; });
add_filter('loop_shop_per_page', function () { return 12; });

/* hide "Shop" breadcrumb root noise */
add_filter('woocommerce_breadcrumb_defaults', function ($d) {
    $d['delimiter'] = ' / ';
    $d['wrap_before'] = '<nav class="woo-crumbs container">';
    $d['wrap_after']  = '</nav>';
    return $d;
});

/* ---------------- Woo product loop tweaks ---------------- */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/* ---------------- shortcodes for templates ---------------- */
add_shortcode('pc_dm_url', function () {
    return esc_url('https://ig.me/m/purple.crochettt');
});

/* ---------------- excerpt length ---------------- */
add_filter('excerpt_length', function () { return 22; });
add_filter('excerpt_more',   function () { return '…'; });

/* ---------------- body classes ---------------- */
add_filter('body_class', function ($c) {
    if (is_front_page()) $c[] = 'home-page';
    return $c;
});

/* ---------------- bypass any "coming soon" ---------------- */
add_action('init', function () {
    if (get_option('woocommerce_coming_soon') === 'yes') {
        update_option('woocommerce_coming_soon', 'no');
    }
});

/* ---------------- get featured products helper ---------------- */
function pc_get_products($limit = 8) {
    $q = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    return $q->posts;
}

function pc_product_card($post, $size = 'medium_large', $cls = '') {
    $product = function_exists('wc_get_product') ? wc_get_product($post->ID) : null;
    $price   = $product ? $product->get_price_html() : '';
    $url     = get_permalink($post->ID);
    $thumb   = get_post_thumbnail_id($post->ID);
    $img     = $thumb ? wp_get_attachment_image_src($thumb, $size) : null;
    $alt     = $thumb ? get_post_meta($thumb, '_wp_attachment_image_alt', true) : '';
    if (!$alt) $alt = get_the_title($post->ID);
    ?>
    <a class="product-card <?php echo esc_attr($cls); ?>" href="<?php echo esc_url($url); ?>">
        <div class="product-card__img">
            <?php if ($img) : ?>
                <img src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy" />
            <?php endif; ?>
            <span class="product-card__quick">View piece</span>
        </div>
        <h3 class="product-card__title"><?php echo esc_html(get_the_title($post->ID)); ?></h3>
        <div class="product-card__price"><?php echo wp_kses_post($price); ?></div>
    </a>
    <?php
}
