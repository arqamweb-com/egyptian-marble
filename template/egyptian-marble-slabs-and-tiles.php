<?php /* Template Name: Egyptian Marble Slabs and Tiles */ ?>

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
                        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-foreground" style="font-family: Georgia, serif;">Egyptian Marble Slabs &amp; Tiles</h1>
                        <div class="rounded-lg p-6 mb-10" style="background-color: rgb(150, 124, 101);">
                            <p class="text-white leading-relaxed">We have been involved in many Design Service projects
                                in USA, England, Cyprus, Turkey, Dubai, Palestine, Malta, Australia, Ireland, Bulgaria,
                                Ukraine, Kenya, Spain and Mexico. And gained a lot of experiences and great reputation
                                from our customer.</p>
                        </div>

                        <?php

                        set_query_var('products_category', 'egyptian-marble');

                        get_template_part('template/products/custom-loop-products')

                        ?>

                        <div class="eml-category-intro">
                            <h2 class="text-2xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">About Egyptian Marble</h2>
                            <p class="text-muted-foreground leading-relaxed mb-4">EML supplies Egyptian marble slabs and tiles to clients abroad from our base in Cairo. Marble is a metamorphic stone formed when limestone recrystallises under heat and pressure. That process gives it the veining, colour shifts and soft lustre people look for in floors and walls, and it also means no two slabs from the same block are quite alike.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">The Egyptian varieties we work with most often are Galala, a cream marble with a calm, even background; Sunny, in warm beige tones with fine veins; Silvia, a lighter beige with a gentle grey movement; Samaha, a pale cream stone used widely in large residential projects; and Khatmia, which has a darker, more varied pattern.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">Each stone can be finished to suit how the space will be used. A polished surface reflects light and suits interior walls and formal floors. Honed marble has a matt face that shows less wear. Brushed and tumbled finishes soften the surface and edges for a more aged look, sandblasting gives extra grip, and split face suits feature walls where texture matters more than shine.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">We supply marble as full slabs for kitchens, vanities and large surfaces, as standard tiles for floors and walls, and cut to size from your drawings for stairs, sills, skirting and borders. Clients use Egyptian marble for floors, walls, façades, kitchens and bathrooms, and in outdoor areas such as patios and pool surrounds when a suitable finish is chosen.</p>
                            <p class="text-muted-foreground leading-relaxed mb-4">If you are unsure which variety or finish fits your project, send us the stone, finish, thickness and approximate quantity through the <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="underline">quote form</a>, and we will reply with options. You can also <a href="<?php echo esc_url(home_url('/request-free-sample/')); ?>" class="underline">request a free sample</a> to check the colour and surface before you order.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div><!-- #primary -->


<?php get_footer(); ?>