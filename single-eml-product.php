<?php

/**
 * The template for displaying a single product (eml-product).
 *
 * Redesigned layout — data is pulled from the dashboard (ACF fields).
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

while (have_posts()) :
    the_post();

    $pid    = get_the_ID();
    $assets = get_stylesheet_directory_uri() . '/frontend/assets';
    $perma  = get_permalink($pid);

    // Brand contact details (used in the buttons + quote section).
    $eml_email = 'marketing@egyptian-marble.com';
    $eml_phone = '002-010-01649-770';

    // Palette.
    $accent     = 'rgb(172, 142, 118)';
    $accent_dk  = 'rgb(150, 124, 101)';
    $ink        = 'rgb(32, 36, 44)';
    $muted      = 'rgb(107, 114, 128)';

    // Hero / intro copy.
    $hero_subtitle = eml_pf('product_hero_subtitle', get_the_excerpt());
    $headline      = eml_pf('product_headline', eml_pf('product_name', get_the_title()));

    $material = eml_pf('product_materials', eml_pf('product_type', ''));
    $model    = eml_pf('product_model', eml_pf('product_item_no', ''));
    $eyebrow  = trim(strtoupper(wp_strip_all_tags($material)));
    if ($model) {
        $eyebrow .= ($eyebrow ? ' &middot; ' : '') . 'MODEL ' . esc_html($model);
    }

    // Description (fallback to the post content).
    $description = eml_pf('product_description', '');

    // Feature bullets (one per line).
    $features = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) eml_pf('product_features', ''))));

    // Gallery slides.
    $slides = array();
    for ($i = 1; $i <= 12; $i++) {
        $img = get_field("slide_$i");
        if (!$img) {
            break;
        }
        $slides[] = $img;
    }
    if (empty($slides)) {
        $fid = get_field('product_image');
        if ($fid) {
            $slides[] = $fid;
        } elseif (has_post_thumbnail()) {
            $slides[] = get_post_thumbnail_id();
        }
    }

    // Spec-row renderer: hides empty rows, applies zebra striping by visible index.
    $render_rows = function ($rows) use ($ink, $muted) {
        $i = 0;
        foreach ($rows as $label => $value) {
            if ($value === '' || $value === null || $value === false) {
                continue;
            }
            $bg = ($i % 2 === 1) ? 'rgb(250, 248, 246)' : '#ffffff';
            $i++;
            printf(
                '<tr style="background-color:%1$s;">
                    <td style="padding:0.8rem 1.25rem; font-weight:600; color:%2$s; width:45%%; vertical-align:top;">%3$s</td>
                    <td style="padding:0.8rem 1.25rem; color:%4$s; vertical-align:top;">%5$s</td>
                </tr>',
                $bg,
                $ink,
                esc_html($label),
                $muted,
                esc_html($value)
            );
        }
    };
?>

<main class="eml-product" style="--eml-accent: <?php echo $accent; ?>; --eml-accent-dk: <?php echo $accent_dk; ?>; --eml-ink: <?php echo $ink; ?>;">

    <style>
        .eml-product .eml-serif { font-family: Georgia, 'Times New Roman', serif; }
        .eml-product .eml-gallery__main { position: relative; }
        .eml-product .eml-slide { transition: opacity .5s ease; }
        .eml-product .eml-thumb { border: 2px solid transparent; transition: border-color .2s ease, opacity .2s ease; opacity: .65; }
        .eml-product .eml-thumb.is-active { border-color: var(--eml-accent); opacity: 1; }
        .eml-product .eml-btn-outline:hover { background-color: var(--eml-accent); color: #fff !important; }
        .eml-product .eml-app-card:hover img { transform: scale(1.06); }
        .eml-product .eml-related-card:hover img { transform: scale(1.08); }
        /* Contact Form 7 styling inside the quote card */
        .eml-quote-form .wpcf7 form { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .eml-quote-form .wpcf7 input[type="text"],
        .eml-quote-form .wpcf7 input[type="email"],
        .eml-quote-form .wpcf7 input[type="tel"],
        .eml-quote-form .wpcf7 input[type="number"],
        .eml-quote-form .wpcf7 textarea,
        .eml-quote-form .wpcf7 select {
            width: 100%; padding: .7rem .9rem; border: 1px solid #e2ddd6;
            border-radius: .5rem; background: #fff; font-size: .95rem;
        }
        .eml-quote-form .wpcf7 textarea { min-height: 120px; }
        .eml-quote-form .wpcf7 .eml-full,
        .eml-quote-form .wpcf7 p:has(textarea),
        .eml-quote-form .wpcf7 p:has(input[type="submit"]),
        .eml-quote-form .wpcf7 p:has(button[type="submit"]),
        .eml-quote-form .wpcf7 p:has(.wpcf7-submit) { grid-column: 1 / -1; }
        .eml-quote-form .wpcf7 p { margin: 0; }
        .eml-quote-form .wpcf7 input[type="submit"],
        .eml-quote-form .wpcf7 button[type="submit"],
        .eml-quote-form .wpcf7 .wpcf7-submit {
            width: 100% !important; padding: .85rem 1rem !important; border: 0 !important;
            border-radius: .5rem !important; background-color: var(--eml-accent) !important;
            color: #fff !important; font-weight: 600 !important;
            cursor: pointer; transition: opacity .2s ease;
        }
        .eml-quote-form .wpcf7 input[type="submit"]:hover,
        .eml-quote-form .wpcf7 button[type="submit"]:hover,
        .eml-quote-form .wpcf7 .wpcf7-submit:hover { opacity: .9; }
        @media (max-width: 640px) {
            .eml-quote-form .wpcf7 form { grid-template-columns: 1fr; }
        }
    </style>

    <!-- ============ HERO ============ -->
    <section class="py-16 md:py-20" style="background-color: rgb(245, 240, 235);">
        <div class="ast-container text-center">
            <h1 class="eml-serif text-4xl md:text-6xl font-bold mb-4" style="color: var(--eml-ink);"><?php the_title(); ?></h1>
            <?php if ($hero_subtitle) : ?>
                <p class="text-base md:text-lg max-w-2xl mx-auto mb-6" style="color: <?php echo $muted; ?>;"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>
            <?php if (function_exists('rank_math_the_breadcrumbs') || shortcode_exists('rank_math_breadcrumb')) : ?>
                <div class="eml-breadcrumb flex justify-center"><?php echo do_shortcode('[rank_math_breadcrumb]'); ?></div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ============ PRODUCT MAIN ============ -->
    <section class="py-12 md:py-16 bg-white">
        <div class="ast-container">
            <div class="grid md:grid-cols-2 gap-10 lg:gap-14">

                <!-- Gallery -->
                <div class="eml-gallery">
                    <div class="eml-gallery__main overflow-hidden rounded-xl shadow-lg bg-stone-100 relative group" style="aspect-ratio: 4 / 3;">
                        <?php foreach ($slides as $idx => $sid) :
                            $active = $idx === 0 ? 'opacity-100' : 'opacity-0';
                            echo wp_get_attachment_image($sid, 'large', false, array(
                                'alt' => ( get_post_meta( $sid, '_wp_attachment_image_alt', true ) ?: wp_strip_all_tags( get_the_title() ) . ' – ' . ( $idx + 1 ) ),
                                'class'         => "eml-slide absolute inset-0 w-full h-full object-cover $active",
                                'data-index'    => $idx,
                            ));
                        endforeach; ?>

                        <?php if (count($slides) > 1) : ?>
                            <button type="button" class="eml-prev absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 backdrop-blur flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 transition-opacity p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
                            </button>
                            <button type="button" class="eml-next absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 backdrop-blur flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 transition-opacity p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"></path></svg>
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php if (count($slides) > 1) : ?>
                        <div class="eml-thumbs mt-4" style="display:grid; grid-template-columns: repeat(4, 1fr); gap: .75rem;">
                            <?php foreach ($slides as $idx => $sid) :
                                $active = $idx === 0 ? 'is-active' : '';
                                echo wp_get_attachment_image($sid, 'medium', false, array(
                                    'alt' => ( get_post_meta( $sid, '_wp_attachment_image_alt', true ) ?: wp_strip_all_tags( get_the_title() ) . ' – ' . ( $idx + 1 ) ),
                                    'class'      => "eml-thumb object-cover rounded-lg cursor-pointer $active",
                                    'style'      => 'aspect-ratio: 1 / 1; width: 100%; height: 100%;',
                                    'data-index' => $idx,
                                ));
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Info -->
                <div>
                    <?php if ($eyebrow) : ?>
                        <p class="text-sm font-semibold tracking-wider uppercase mb-3" style="color: var(--eml-accent-dk);"><?php echo wp_kses_post($eyebrow); ?></p>
                    <?php endif; ?>

                    <h2 class="eml-serif text-3xl md:text-4xl font-bold mb-5" style="color: var(--eml-ink);"><?php echo esc_html($headline); ?></h2>

                    <div class="text-base leading-relaxed mb-6" style="color: <?php echo $muted; ?>;">
                        <?php
                        if ($description) {
                            echo wpautop(esc_html($description));
                        } else {
                            // Fallback: short plain-text summary from the post content.
                            echo wpautop(esc_html(wp_trim_words(wp_strip_all_tags(get_the_content()), 60)));
                        }
                        ?>
                    </div>

                    <?php if (!empty($features)) : ?>
                        <ul class="space-y-3 mb-8">
                            <?php foreach ($features as $feature) : ?>
                                <li class="flex items-start gap-3">
                                    <svg class="shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="<?php echo $accent_dk; ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
                                    <span style="color: var(--eml-ink);"><?php echo esc_html($feature); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="#eml-quote" class="inline-flex items-center justify-center px-6 py-3 rounded-lg font-semibold text-white shadow-md hover:opacity-90 transition-opacity" style="background-color: var(--eml-accent);">Request a Quote</a>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $eml_phone)); ?>" class="eml-btn-outline inline-flex items-center gap-2 px-6 py-3 rounded-lg font-semibold transition-colors" style="border:1px solid var(--eml-accent); color: var(--eml-accent-dk);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            Talk to Sales
                        </a>
                        <a href="#eml-specs" class="eml-btn-outline inline-flex items-center gap-2 px-6 py-3 rounded-lg font-semibold transition-colors" style="border:1px solid var(--eml-accent); color: var(--eml-accent-dk);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" x2="12" y1="15" y2="3"></line></svg>
                            Spec Sheet
                        </a>
                    </div>

                    <div class="border-t border-stone-200 pt-5 flex flex-wrap items-center gap-3">
                        <span class="inline-flex items-center gap-2 text-sm font-medium" style="color: <?php echo $muted; ?>;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line></svg>
                            Share:
                        </span>
                        <?php
                        $share_url = rawurlencode($perma);
                        $share = array(
                            'Facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $share_url,
                            'Twitter'  => 'https://twitter.com/intent/tweet?url=' . $share_url,
                            'LinkedIn' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $share_url,
                            'WhatsApp' => 'https://wa.me/?text=' . $share_url,
                        );
                        foreach ($share as $label => $url) :
                        ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="text-sm hover:underline" style="color: var(--eml-accent-dk);"><?php echo esc_html($label); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ TECHNICAL SPECIFICATIONS ============ -->
    <section id="eml-specs" class="py-16" style="background-color: rgb(249, 246, 243);">
        <div class="ast-container">
            <div class="text-center mb-12">
                <h2 class="eml-serif text-3xl md:text-4xl font-bold mb-3" style="color: var(--eml-ink);">Technical Specifications</h2>
                <p style="color: <?php echo $muted; ?>;">Verified data for engineering and architectural specification.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Material Properties -->
                <div class="rounded-xl shadow-md overflow-hidden border border-stone-200 bg-white">
                    <div class="px-6 py-4" style="background-color: var(--eml-accent);">
                        <h3 class="text-white font-bold text-lg">Material Properties</h3>
                    </div>
                    <table class="w-full text-sm mb-0"><tbody>
                        <?php $render_rows(array(
                            'Product Name'         => eml_pf('product_name', get_the_title()),
                            'Model Number'         => eml_pf('product_model', ''),
                            'Origin'               => eml_pf('product_origin', ''),
                            'Material'             => eml_pf('product_materials', ''),
                            'Primary Color'        => eml_pf('product_primary_color', ''),
                            'Finish'               => eml_pf('product_surface', ''),
                            'Density'              => eml_pf('product_density', ''),
                            'Water Absorption'     => eml_pf('product_water_absorption', ''),
                            'Compressive Strength' => eml_pf('product_compressive_strength', ''),
                            'Flexural Strength'    => eml_pf('product_flexural_strength', ''),
                        )); ?>
                    </tbody></table>
                </div>

                <!-- Sizes, Finishes & Supply -->
                <div class="rounded-xl shadow-md overflow-hidden border border-stone-200 bg-white">
                    <div class="px-6 py-4" style="background-color: var(--eml-ink);">
                        <h3 class="text-white font-bold text-lg">Sizes, Finishes &amp; Supply</h3>
                    </div>
                    <table class="w-full text-sm mb-0"><tbody>
                        <?php $render_rows(array(
                            'Slabs'           => eml_pf('product_slab_size_mm', ''),
                            'Tiles'           => eml_pf('product_tile_size_mm', ''),
                            'Pavers'          => eml_pf('product_pavers_size', ''),
                            'Thickness'       => eml_pf('product_thickness_mm', ''),
                            'Surface Finishes' => eml_pf('product_surface_finishes', ''),
                            'Packing'         => eml_pf('product_packing', ''),
                            'FOB Ports'       => eml_pf('product_fob_port', ''),
                        )); ?>
                    </tbody></table>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ APPLICATIONS ============ -->
    <?php
    $applications = array(
        array('title' => 'Outdoor Pavers & Landscaping', 'img' => $assets . '/outdoor-england-CM7n8NBi.png'),
        array('title' => 'Pool Coping & Surrounds',      'img' => $assets . '/pool-coping.jpg'),
        array('title' => 'Facade Cladding',              'img' => $assets . '/exterior-house.jpg'),
        array('title' => 'Walkways & Courtyards',        'img' => $assets . '/steps-copings.jpg'),
    );
    ?>
    <section class="py-16 bg-white">
        <div class="ast-container">
            <div class="text-center mb-12">
                <h2 class="eml-serif text-3xl md:text-4xl font-bold mb-3" style="color: var(--eml-ink);">Applications</h2>
                <p style="color: <?php echo $muted; ?>;"><?php echo esc_html(get_the_title()); ?> performs beautifully wherever durability meets character.</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                <?php foreach ($applications as $app) : ?>
                    <div class="eml-app-card relative rounded-xl overflow-hidden shadow-md" style="aspect-ratio: 3 / 4;">
                        <img src="<?php echo esc_url($app['img']); ?>" alt="<?php echo esc_attr($app['title']); ?>" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(0,0,0,.72), rgba(0,0,0,.1) 55%, transparent);"></div>
                        <span class="absolute bottom-4 left-4 right-4 text-white font-semibold"><?php echo esc_html($app['title']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ GET A QUOTE ============ -->
    <section id="eml-quote" class="py-16" style="background-color: rgb(26, 29, 36);">
        <div class="ast-container">
            <div class="grid md:grid-cols-2 gap-10 items-start">
                <div>
                    <p class="text-sm font-semibold tracking-wider uppercase mb-3" style="color: var(--eml-accent);">Get a Quote</p>
                    <h2 class="eml-serif text-3xl md:text-4xl font-bold mb-5 text-white">Request <?php echo esc_html(get_the_title()); ?> Pricing</h2>
                    <p class="text-white/70 leading-relaxed mb-8">Tell us about your project — sizes, finishes, quantities, and destination port. Our team replies within one business day with availability, factory price, and shipping options.</p>
                    <div class="space-y-4">
                        <a href="mailto:<?php echo esc_attr($eml_email); ?>" class="flex items-center gap-3 text-white/85 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="<?php echo $accent; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                            <?php echo esc_html($eml_email); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $eml_phone)); ?>" class="flex items-center gap-3 text-white/85 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="<?php echo $accent; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <?php echo esc_html($eml_phone); ?>
                        </a>
                    </div>
                </div>
                <div class="eml-quote-form bg-white rounded-xl shadow-xl p-6 md:p-8">
                    <?php echo do_shortcode('[contact-form-7 id="f0324d0" title="Single Product – Inquiry Form"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ RELATED PRODUCTS ============ -->
    <?php
    $related   = array();
    $cat_terms = get_the_terms($pid, 'product_category');
    if ($cat_terms && !is_wp_error($cat_terms)) {
        $related = get_posts(array(
            'post_type'      => 'eml-product',
            'posts_per_page' => 4,
            'post__not_in'   => array($pid),
            'orderby'        => 'rand',
            'no_found_rows'  => true,
            'tax_query'      => array(array(
                'taxonomy' => 'product_category',
                'field'    => 'term_id',
                'terms'    => wp_list_pluck($cat_terms, 'term_id'),
            )),
        ));
    }
    if (!empty($related)) :
    ?>
    <section class="py-16 bg-white">
        <div class="ast-container">
            <div class="text-center mb-12">
                <h2 class="eml-serif text-3xl md:text-4xl font-bold mb-3" style="color: var(--eml-ink);">Related Products</h2>
                <p style="color: <?php echo $muted; ?>;">Explore more finishes from EML's collection.</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($related as $rp) :
                    $rimg = get_the_post_thumbnail_url($rp->ID, 'medium');
                    if (!$rimg) {
                        $rfid = get_field('product_image', $rp->ID);
                        $rimg = $rfid ? wp_get_attachment_image_url($rfid, 'medium') : ($assets . '/no-image-kJ7QXhJl.png');
                    }
                ?>
                    <a href="<?php echo esc_url(get_permalink($rp->ID)); ?>" class="eml-related-card group block rounded-xl overflow-hidden shadow-md border border-stone-200 bg-white">
                        <div class="aspect-square overflow-hidden">
                            <img src="<?php echo esc_url($rimg); ?>" alt="<?php echo esc_attr(get_the_title($rp->ID)); ?>" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                        </div>
                        <div class="p-4 text-center">
                            <p class="eml-serif font-bold mb-1" style="color: var(--eml-ink);"><?php echo esc_html(get_the_title($rp->ID)); ?></p>
                            <span class="text-sm font-medium" style="color: var(--eml-accent-dk);">View Collection &rarr;</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <script>
        document.querySelectorAll('.eml-gallery').forEach(function (gallery) {
            var slides = gallery.querySelectorAll('.eml-slide');
            var thumbs = gallery.querySelectorAll('.eml-thumb');
            var prev   = gallery.querySelector('.eml-prev');
            var next   = gallery.querySelector('.eml-next');
            if (slides.length < 2) return;
            var current = 0;

            function show(index) {
                index = (index + slides.length) % slides.length;
                slides.forEach(function (s, i) {
                    s.classList.toggle('opacity-100', i === index);
                    s.classList.toggle('opacity-0', i !== index);
                });
                thumbs.forEach(function (t, i) {
                    t.classList.toggle('is-active', i === index);
                });
                current = index;
            }

            if (next) next.addEventListener('click', function () { show(current + 1); });
            if (prev) prev.addEventListener('click', function () { show(current - 1); });
            thumbs.forEach(function (t, i) {
                t.addEventListener('click', function () { show(i); });
            });
        });
    </script>

</main>

<?php
endwhile;

get_footer();
