<?php

/**
 * Remove Flex in Container
 */
add_filter('astra_apply_flex_based_css', '__return_false');

/**
 * Register theme menu locations.
 */
function eml_register_nav_menus()
{
    register_nav_menus([
        'aside_categories'    => __('Aside Categories', 'arqamweb'),
        'footer_quick_links'  => __('Footer Quick Links', 'arqamweb'),
        'footer_products'     => __('Footer Products', 'arqamweb'),
        'footer_stone_types'  => __('Footer Stone Types', 'arqamweb'),
        'footer_help_support' => __('Footer Help & Support', 'arqamweb'),
    ]);
}
add_action('after_setup_theme', 'eml_register_nav_menus');

/**
 * Add Svg To Media Library
 */

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');


/**
 * Shortcode: Contact Info
 */

function eml_contact_info_shortcode($atts)
{
    $atts = shortcode_atts([
        'email' => 'info@egyptian-marble.com',
        'phone' => '002-010-01649-770',
    ], $atts);

    ob_start(); ?>

    <div class="flex items-center gap-6">

        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-3.5 h-3.5 text-stone-accent">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
            </svg>
            <span class="text-sm"><?php echo esc_html($atts['email']); ?></span>
        </div>

        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-3.5 h-3.5 text-stone-accent">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span class="text-sm"><?php echo esc_html($atts['phone']); ?></span>
        </div>

    </div>

<?php
    return ob_get_clean();
}
add_shortcode('contact_info', 'eml_contact_info_shortcode');


/**
 * Catalog PDF URL: one setting for the "View Catalog" button and the Brochure menu item.
 * Appearance > Customize > EML Catalog.
 */
function eml_catalog_customize_register($wp_customize)
{
    $wp_customize->add_section('eml_catalog', [
        'title'    => __('EML Catalog', 'arqamweb'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('eml_catalog_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('eml_catalog_url', [
        'label'       => __('Catalog PDF URL', 'arqamweb'),
        'description' => __('Used by the "View Catalog" button and any menu item with the CSS class eml-catalog.', 'arqamweb'),
        'section'     => 'eml_catalog',
        'type'        => 'url',
    ]);
}
add_action('customize_register', 'eml_catalog_customize_register');

function eml_get_catalog_url()
{
    return (string) get_theme_mod('eml_catalog_url', '');
}

/**
 * Point menu items with the CSS class "eml-catalog" (e.g. Brochure) at the catalog PDF.
 */
function eml_catalog_menu_link($atts, $item)
{
    $url = eml_get_catalog_url();
    if ($url && in_array('eml-catalog', (array) $item->classes, true)) {
        $atts['href']   = esc_url($url);
        $atts['target'] = '_blank';
        $atts['rel']    = 'noopener';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'eml_catalog_menu_link', 10, 2);
