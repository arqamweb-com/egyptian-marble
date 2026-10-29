<?php /* Template Name: Egyptian Limestone Slabs and Tiles */ ?>

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
                        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-foreground" style="font-family: Georgia, serif;">Egyptian Limestone Slabs &amp; Tiles</h1>
                        <div class="rounded-lg p-6 mb-10" style="background-color: rgb(150, 124, 101);">
                            <p class="text-white leading-relaxed">We have been involved in many Design Service projects
                                in USA, England, Cyprus, Turkey, Dubai, Palestine, Malta, Australia, Ireland, Bulgaria,
                                Ukraine, Kenya, Spain and Mexico. And gained a lot of experiences and great reputation
                                from our customer.
							</p>
                        </div>



                        <?php

                        set_query_var('products_category', 'egyptian-limestone');

                        get_template_part('template/products/custom-loop-products')

                        ?>


                        <div class="eml-category-intro">
                            <h2 class="text-2xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">About Egyptian Limestone</h2>
                            <p class="text-muted-foreground leading-relaxed mb-4">EML supplies Egyptian limestone slabs and tiles from Cairo for export. Limestone is a sedimentary rock built up over time from mineral and shell deposits. It usually has a quieter, more uniform look than marble, and in many Egyptian varieties you can still see small fossils and shell marks in the surface.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">The varieties we supply include Sinai Pearl, a beige limestone with a light, even tone; Galala, a cream stone used for both interiors and cladding; Dijon, in soft beige; Triesta, which is often used in tumbled form; Filetto, a beige stone with fine lines running through it; and Nile Grey, for projects that need a cooler colour.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">Limestone works with a wide range of finishes. Polished and honed surfaces suit interior floors and walls. Brushed and tumbled finishes give the stone a worn, natural feel that fits traditional and rustic designs. Sandblasting adds grip for outdoor use, and split face limestone is a common choice for feature walls and façades.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">We supply limestone as slabs, as tiles in standard sizes, and cut to size for steps, copings, sills, columns and mouldings. It is used for floors, walls, exterior façades, bathrooms, kitchens, patios and pool surrounds. Limestone is softer and more porous than granite, so we recommend sealing it in kitchens, bathrooms and outdoor areas, and choosing a textured finish where floors may get wet.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">Tell us which limestone, finish and quantity you need through the <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="underline">quote form</a> and we will come back to you with options. You can also <a href="<?php echo esc_url(home_url('/request-free-sample/')); ?>" class="underline">request a free sample</a> to check the colour and texture against your design.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div><!-- #primary -->


<?php get_footer(); ?>