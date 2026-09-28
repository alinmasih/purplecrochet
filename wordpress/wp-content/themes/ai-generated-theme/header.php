<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Purple Crochet 🎀</a>
        </div>
        <nav class="nav-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => false
            ) );
            ?>
            <a href="/shop">Shop</a>
        </nav>
    </header>
