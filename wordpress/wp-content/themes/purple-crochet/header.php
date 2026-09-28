<?php
/**
 * Header
 */
if ( ! defined('ABSPATH') ) exit;

$DM = 'https://ig.me/m/purple.crochettt';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#1F0F38">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="siteHeader">
    <div class="container site-header__row">
        <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <span class="dot"></span>
            Purple Crochet
        </a>

        <nav class="site-nav" id="siteNav">
            <ul class="site-nav__links">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => function () {
                        echo '<li><a href="'.esc_url(home_url('/')).'">Home</a></li>';
                        echo '<li><a href="'.esc_url(home_url('/shop/')).'">Shop</a></li>';
                        echo '<li><a href="'.esc_url(home_url('/about/')).'">About</a></li>';
                        echo '<li><a href="'.esc_url(home_url('/care-shipping/')).'">Care</a></li>';
                        echo '<li><a href="'.esc_url(home_url('/contact/')).'">Contact</a></li>';
                    },
                    'walker' => new class extends Walker_Nav_Menu {
                        function start_lvl(&$o, $d=0, $a=null) {}
                        function end_lvl(&$o, $d=0, $a=null) {}
                        function start_el(&$o, $i, $d=0, $a=null, $id=0) {
                            $cur = in_array('current-menu-item', (array) $i->classes, true) ? ' aria-current="page"' : '';
                            $o .= '<li><a href="'.esc_url($i->url).'"'.$cur.'>'.esc_html($i->title).'</a></li>';
                        }
                        function end_el(&$o, $i, $d=0, $a=null) {}
                    },
                ]);
                ?>
            </ul>

            <div class="site-nav__actions">
                <?php if (function_exists('wc_get_cart_url')) : $count = pc_cart_count(); ?>
                    <a class="cart-link" href="<?php echo esc_url(wc_get_cart_url()); ?>" aria-label="Cart, <?php echo (int) $count; ?> items">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 8h14l-1.2 11a2 2 0 0 1-2 1.8H8.2a2 2 0 0 1-2-1.8L5 8z"/>
                            <path d="M9 8V6a3 3 0 0 1 6 0v2"/>
                        </svg>
                        <span class="cart-count<?php echo $count ? ' is-active' : ''; ?>"><?php echo (int) $count; ?></span>
                    </a>
                <?php endif; ?>
                <a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-nav">
                    DM to order
                </a>
            </div>
        </nav>

        <button class="btn-mobile" id="btnMobile" aria-label="Menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
