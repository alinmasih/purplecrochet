<?php
function purple_crochet_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'purple-crochet' ),
    ) );
}
add_action( 'after_setup_theme', 'purple_crochet_setup' );

function purple_crochet_scripts() {
    wp_enqueue_style( 'purple-crochet-style', get_stylesheet_uri() );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@400;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'purple_crochet_scripts' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main" class="container">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}
