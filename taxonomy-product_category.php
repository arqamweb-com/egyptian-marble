<?php /* Template Name: Design Service */ ?>

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
                        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-foreground" style="font-family: Georgia, serif;"><?php single_term_title(); ?></h1>
                        <div class="rounded-lg p-6 mb-10" style="background-color: rgb(150, 124, 101);">
                            <p class="text-white leading-relaxed">We have been involved in many Design Service projects
                                in USA, England, Cyprus, Turkey, Dubai, Palestine, Malta, Australia, Ireland, Bulgaria,
                                Ukraine, Kenya, Spain and Mexico. And gained a lot of experiences and great reputation
                                from our customer.
                            </p>
                        </div>
                        <?php
                        $eml_term = get_queried_object();
                        $eml_products = ($eml_term && !is_wp_error($eml_term)) ? new WP_Query(array(
                            'post_type'      => 'eml-product',
                            'posts_per_page' => 12,
                            'no_found_rows'  => true,
                            'tax_query'      => array(array(
                                'taxonomy' => $eml_term->taxonomy,
                                'field'    => 'term_id',
                                'terms'    => $eml_term->term_id,
                            )),
                        )) : null;
                        ?>
                        <?php if ($eml_products && $eml_products->have_posts()) : ?>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                            <?php while ($eml_products->have_posts()) : $eml_products->the_post();
                                $eml_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                if (!$eml_img) {
                                    $eml_fid = function_exists('get_field') ? get_field('product_image') : 0;
                                    $eml_img = $eml_fid ? wp_get_attachment_image_url($eml_fid, 'large') : (get_stylesheet_directory_uri() . '/frontend/assets/no-image-kJ7QXhJl.png');
                                }
                            ?>
                            <a href="<?php the_permalink(); ?>" class="group block bg-background rounded-lg overflow-hidden border border-solid border-border hover:shadow-lg transition-shadow">
                                <div class="overflow-hidden" style="aspect-ratio: 4 / 3;">
                                    <img src="<?php echo esc_url($eml_img); ?>" alt="<?php the_title_attribute(); ?>"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-foreground mb-2 group-hover:text-stone-accent transition-colors"><?php the_title(); ?></h3>
                                    <p class="text-xs text-muted-foreground line-clamp-4"><?php echo esc_html(wp_trim_words(wp_strip_all_tags(get_the_excerpt()), 35)); ?></p>
                                </div>
                            </a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <?php else : ?>
                        <div class="mb-16 text-muted-foreground">No products are currently available in this category.</div>
                        <?php endif; ?>
                        <?php $eml_desc = term_description(); if ($eml_desc) : ?>
                        <div class="eml-category-intro text-muted-foreground leading-relaxed"><?php echo wp_kses_post($eml_desc); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

    </div><!-- #primary -->


<?php get_footer(); ?>