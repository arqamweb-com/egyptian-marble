<?php /* Template Name: Egyptian Granite Slabs and Tiles */ ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

    <div>

        <main class="flex-1">
            <div class="ast-container py-10">
                <div class="flex flex-col lg:flex-row gap-10">
                    <aside class="lg:w-72 flex-shrink-0">
                        <div class="rounded-lg border border-solid border-border p-5 sticky top-4">
                            <h3 class="text-lg font-bold mb-4 text-foreground">Categories</h3>
                            

                            <?php get_template_part('template/components/sections/aside_categories'); ?>
                        </div>
                    </aside>
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-foreground" style="font-family: Georgia, serif;">Egyptian Granite Slabs &amp; Tiles</h1>
                        <div class="rounded-lg p-6 mb-10" style="background-color: rgb(150, 124, 101);">
                            <p class="text-white leading-relaxed">
                                We have been involved in many Design Service projects
                                in USA, England, Cyprus, Turkey, Dubai, Palestine, Malta, Australia, Ireland, Bulgaria,
                                Ukraine, Kenya, Spain and Mexico. And gained a lot of experiences and great reputation
                                from our customer.</p>
                        </div>


                        <?php

                        set_query_var('products_category', 'egyptian-granite');

                        get_template_part('template/products/custom-loop-products')

                        ?>

                        <div class="eml-category-intro">
                            <h2 class="text-2xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">About Egyptian Granite</h2>
                            <p class="text-muted-foreground leading-relaxed mb-4">EML exports Egyptian granite slabs and tiles from Cairo to projects outside Egypt. Granite is an igneous rock made mostly of quartz and feldspar. It is hard and dense, which is why it is chosen for surfaces that take heavy use: kitchen worktops, busy floors and exterior paving.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">The Egyptian granites in our range include Halayeb, a grey stone with a fine, regular grain; New Halayeb, a lighter grey from the same region; Red Aswan, a red and pink granite from the Aswan area; and Gandola, a grey granite with a larger, more open crystal pattern.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">Granite takes several finishes. Polished granite has a deep shine and is easy to wipe clean, so it is common in kitchens and reception areas. Honed and brushed finishes give a softer, low-sheen face. Sandblasted and split face granite add texture and slip resistance for outdoor steps, paving, pool surrounds and façades.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">We supply granite as slabs for worktops, vanities and large wall panels, as tiles for floors and cladding, and cut to size for stairs, kerbs, window sills and other project-specific pieces. Typical applications include floors, walls, façades, kitchens, bathrooms, patios and pools. Because granite resists scratches and frost well, it is often the stone specified for exterior areas and commercial spaces where foot traffic is heavy and maintenance time is limited.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">To get a price, tell us the granite type, finish, thickness and quantity through the <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="underline">quote form</a>. If you want to see the stone first, <a href="<?php echo esc_url(home_url('/request-free-sample/')); ?>" class="underline">request a free sample</a> and we will send one before you commit to an order.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div><!-- #primary -->


<?php get_footer(); ?>