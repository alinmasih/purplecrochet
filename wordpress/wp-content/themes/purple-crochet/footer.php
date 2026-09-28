<?php
/**
 * Footer
 */
if ( ! defined('ABSPATH') ) exit;
$DM = 'https://ig.me/m/purple.crochettt';
$IG = 'https://www.instagram.com/purple.crochettt/';
$YT = 'https://www.youtube.com/@Winter.co__';
?>
<footer class="site-footer">
    <div class="container">
        <div class="site-footer__grid">
            <div>
                <span class="brand-name">Purple Crochet</span>
                <p class="brand-tag">Handmade crochet, amigurumi and gifts. Hooked one stitch at a time in Hyderabad, India.</p>
                <div class="socials">
                    <a href="<?php echo esc_url($IG); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".7" fill="currentColor"/></svg>
                    </a>
                    <a href="<?php echo esc_url($YT); ?>" target="_blank" rel="noopener" aria-label="YouTube">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.4 3.5 12 3.5 12 3.5s-7.4 0-9.4.6A3 3 0 0 0 .5 6.2 31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c2 .6 9.4.6 9.4.6s7.4 0 9.4-.6a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>
                    </a>
                    <a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener" aria-label="DM us">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.4 7.6L3 21l1.9-5.6A8.5 8.5 0 1 1 21 11.5z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <h4>Shop</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">All pieces</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/keychains/')); ?>">Keychains</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/wearables/')); ?>">Wearables</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/flowers/')); ?>">Flowers</a></li>
                    <li><a href="<?php echo esc_url(home_url('/product-category/pouches/')); ?>">Pouches</a></li>
                </ul>
            </div>
            <div>
                <h4>About</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Our story</a></li>
                    <li><a href="<?php echo esc_url(home_url('/care-shipping/')); ?>">Care &amp; shipping</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                    <?php if (function_exists('wc_get_account_endpoint_url')) : ?>
                    <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>">My account</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <h4>Talk to us</h4>
                <ul>
                    <li><a href="<?php echo esc_url($DM); ?>" target="_blank" rel="noopener">Instagram DM</a></li>
                    <li>Hyderabad, India</li>
                    <li>Mon to Sat</li>
                </ul>
            </div>
        </div>
        <div class="site-footer__bottom">
            <span>© <?php echo (int) date('Y'); ?> Purple Crochet. Handmade with love in Hyderabad.</span>
            <span>Made by <a href="https://alinmasih.free.nf" target="_blank" rel="noopener">Alin 💜</a></span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
