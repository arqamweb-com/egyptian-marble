<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('eml_footer_nav_menu')) {
    function eml_footer_nav_menu($location, $fallback_names = [])
    {
        $locations = get_nav_menu_locations();
        $menu_id = isset($locations[$location]) ? (int)$locations[$location] : 0;

        foreach ($fallback_names as $fallback_name) {
            if ($menu_id) {
                break;
            }

            $fallback_menu = wp_get_nav_menu_object($fallback_name);
            $menu_id = $fallback_menu ? (int)$fallback_menu->term_id : 0;
        }

        $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id, [
                'update_post_term_cache' => false,
        ]) : [];

        if (empty($menu_items) || is_wp_error($menu_items)) {
            return;
        }
        ?>
        <ul class="space-y-2">
            <?php foreach ($menu_items as $menu_item) : ?>
                <?php if ((int)$menu_item->menu_item_parent !== 0) : ?>
                    <?php continue; ?>
                <?php endif; ?>
                <li>
                    <a href="<?php echo esc_url($menu_item->url); ?>"
                       class="text-sm text-stone-cream/70 hover:text-stone-accent transition-colors duration-300">
                        <?php echo esc_html($menu_item->title); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->
<footer class="bg-charcoal text-stone-cream">
    <div class="ast-container py-16">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            <div class="col-span-2">
                <h3 class="font-serif text-2xl font-medium mb-6 text-stone-cream">Egyptian Marble &amp; Limestone</h3>
                <div class="space-y-3 text-sm text-stone-cream/70">
                    <p>Egyptian Marble &amp; Limestone</p>
                    <p class="text-stone-accent">Phone &amp; WhatsApp: <a href="https://wa.me/201001649770" target="_blank" rel="noopener">+20 100 164 9770</a></p>
                    <p><a href="mailto:info@egyptian-marble.com">info@egyptian-marble.com</a></p>
                </div>
                <div class="flex gap-4 mt-6">
                    <a href="https://web.facebook.com/emlmarble" target="_blank"
                       class="w-9 h-9 border border-solid border-stone-cream/30 text-stone-cream/30 rounded-sm flex items-center justify-center hover:bg-stone-accent hover:border-stone-accent transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-facebook w-4 h-4">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/emlmarble/" target="_blank"
                       class="w-9 h-9 border border-solid border-stone-cream/30 text-stone-cream/30 rounded-sm flex items-center justify-center hover:bg-stone-accent hover:border-stone-accent transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-instagram w-4 h-4">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://www.pinterest.com/emlmarble/"
                       class="w-9 h-9 border border-solid border-stone-cream/30 text-stone-cream/30 rounded-sm flex items-center justify-center hover:bg-stone-accent hover:border-stone-accent transition-all duration-300">
                        <!-- svg pinterest -->
                        <svg fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.292 5C10.536 5 7.48 8.866 7.48 13.077c0 1.955 1.039 4.392 2.707 5.168.253.118.387.064.443-.18.047-.185.273-1.089.373-1.511a.402.402 0 0 0-.095-.386c-.55-.667-.988-1.896-.988-3.041 0-2.942 2.228-5.787 6.021-5.787 3.28 0 5.571 2.23 5.571 5.426 0 3.61-1.82 6.108-4.191 6.108-1.309 0-2.291-1.081-1.978-2.413.378-1.584 1.106-3.298 1.106-4.438 0-1.026-.552-1.883-1.685-1.883-1.341 0-2.415 1.385-2.415 3.241 0 1.182.4 1.978.4 1.978s-1.323 5.593-1.563 6.634c-.413 1.765.051 4.625.094 4.876.021.134.172.18.252.066.129-.175 1.725-2.565 2.174-4.292l.828-3.171c.439.829 1.707 1.531 3.061 1.531 4.021 0 6.923-3.703 6.923-8.299C24.52 8.301 20.92 5 16.292 5z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="font-medium text-sm uppercase tracking-wider mb-4 text-white">Quick Links</h4>
                <?php eml_footer_nav_menu('footer_quick_links', ['footer_quick_links', 'Footer Quick Links', 'Quick Links']); ?>
            </div>
            <div>
                <h4 class="font-medium text-sm uppercase tracking-wider mb-4 text-white">Products</h4>
                <?php eml_footer_nav_menu('footer_products', ['footer_products', 'Footer Products', 'Products']); ?>
            </div>
            <div>
                <h4 class="font-medium text-sm uppercase tracking-wider mb-4 text-white">Stone Types</h4>
                <?php eml_footer_nav_menu('footer_stone_types', ['footer_stone_types', 'Footer Stone Types', 'Stone Types']); ?>
            </div>
            <div>
                <h4 class="font-medium text-sm uppercase tracking-wider mb-4 text-white">Help &amp; Support</h4>
                <?php eml_footer_nav_menu('footer_help_support', ['footer_help_support', 'Footer Help & Support', 'Help & Support']); ?>
            </div>
        </div>
    </div>
    <div class="border-t border-stone-cream/10 text-sm" style="border-top-style: solid;">
        <div class="ast-container py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="site-credit text-stone-cream/50">
                    &copy;
                    <span id="y"><?php echo esc_html(wp_date('Y')); ?></span> <?php echo esc_html(__( bloginfo('name') .'. All rights reserved.', 'arqamweb')) ?>
                    <span aria-hidden="true"> · </span>
                    <?php echo esc_html(__('Designed and Developed by', 'arqamweb')) ?>
                    <a href="https://www.arqamweb.com"
                       class="arqam-credit"><?php echo esc_html(__('Arqam Web', 'arqamweb')) ?>
                    </a>
    
                    <style>
                        .arqam-credit {
                            color: white;
                            text-decoration: none;
                        }
    
                        .arqam-credit:hover {
                            color: hsl(var(--accent));
                        }
    
                        .arqam-credit:focus-visible {
                            outline: 2px solid gold;
                            outline-offset: 3px;
                        }
                    </style>
                </div>
                <div class="flex items-center gap-6">
                    <a href="<?php echo esc_url(get_page_link_by_slug('privacy-policy')); ?>"
                                                        class="text-sm text-stone-cream/50 hover:text-stone-cream transition-colors">
                        Privacy Policy</a>
                        <a href="<?php echo esc_url(get_page_link_by_slug('terms-and-conditions')); ?>"
                                     class="text-sm text-stone-cream/50 hover:text-stone-cream transition-colors">
                            Terms
                        &amp; Conditions</a>
                        </div>
            </div>
        </div>
    </div>
</footer>
<?php
astra_content_after();

astra_footer_before();

astra_footer();

astra_footer_after();
?>
</div><!-- #page -->
<a href="https://wa.me/201001649770" class="eml-wa-float" target="_blank" rel="noopener" aria-label="Chat with EML on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30" height="30" aria-hidden="true" focusable="false"><path fill="currentColor" d="M16.04 3C9.4 3 4 8.33 4 14.9c0 2.3.67 4.45 1.83 6.27L4 29l8.07-1.78a12.2 12.2 0 0 0 3.97.66c6.64 0 12.04-5.33 12.04-11.9S22.68 3 16.04 3Zm0 21.8c-1.24 0-2.45-.2-3.6-.6l-.26-.09-4.79 1.06 1.08-4.56-.18-.28A9.72 9.72 0 0 1 6.3 14.9c0-5.3 4.37-9.6 9.74-9.6s9.74 4.3 9.74 9.6-4.37 9.9-9.74 9.9Zm5.34-7.2c-.29-.15-1.73-.85-2-.94-.27-.1-.46-.15-.66.14-.2.29-.76.94-.93 1.13-.17.2-.34.22-.63.07-.29-.14-1.23-.45-2.34-1.43-.86-.77-1.45-1.71-1.62-2-.17-.29-.02-.44.13-.59.13-.13.29-.34.44-.5.15-.17.2-.29.29-.49.1-.19.05-.36-.02-.5-.07-.15-.66-1.58-.9-2.16-.24-.57-.48-.49-.66-.5h-.56a1.08 1.08 0 0 0-.78.36c-.27.29-1.02 1-1.02 2.42 0 1.43 1.05 2.81 1.2 3 .14.2 2.06 3.12 4.99 4.38.7.3 1.24.48 1.67.61.7.22 1.34.19 1.84.12.56-.08 1.73-.7 1.97-1.38.25-.68.25-1.26.17-1.38-.07-.12-.26-.2-.55-.34Z"/></svg>
</a>
<style>
.eml-wa-float{position:fixed;right:20px;bottom:20px;z-index:9999;width:56px;height:56px;border-radius:50%;background:#25D366;color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 14px rgba(0,0,0,.25);transition:transform .2s ease}
.eml-wa-float:hover,.eml-wa-float:focus-visible{transform:scale(1.08);color:#fff}
.eml-wa-float:focus-visible{outline:2px solid #fff;outline-offset:3px}
@media (max-width:544px){.eml-wa-float{right:14px;bottom:14px;width:52px;height:52px}}
footer{padding-bottom:64px}
</style>
<?php
astra_body_bottom();
wp_footer();
?>
</body>

</html>
