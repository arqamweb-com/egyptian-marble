<?php
$eml_best_sellers = new WP_Query([
    'post_type'           => 'eml-product',
    'posts_per_page'      => 4,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
    'tax_query'           => [
        [
            'taxonomy' => 'product_category',
            'field'    => 'slug',
            'terms'    => 'best-seller-collection',
        ],
    ],
]);

$eml_best_seller_term = get_term_by('slug', 'best-seller-collection', 'product_category');
$eml_best_seller_link = ($eml_best_seller_term && !is_wp_error($eml_best_seller_term))
    ? get_term_link($eml_best_seller_term)
    : '#';
?>
<section class="py-20 bg-background">
    <div class="ast-container">
        <div class="mb-12" style="opacity: 1; transform: none;">
            <h2 class="font-serif text-3xl md:text-4xl text-foreground mb-2">EML Best Seller Collection</h2>
            <p class="text-muted-foreground">Premium Egyptian stones from EML Co.</p>
        </div>

        <?php if ($eml_best_sellers->have_posts()) : ?>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php while ($eml_best_sellers->have_posts()) : $eml_best_sellers->the_post();
                    $eml_subtitle = function_exists('get_field') ? get_field('product_origin') : '';
                    if (empty($eml_subtitle)) {
                        $eml_terms = get_the_terms(get_the_ID(), 'product_category');
                        $eml_subtitle = (!empty($eml_terms) && !is_wp_error($eml_terms)) ? $eml_terms[0]->name : '';
                    }
                ?>
                    <a href="<?php the_permalink(); ?>" class="group block" style="opacity: 1; transform: none;">
                        <div class="relative aspect-square img-zoom rounded-sm overflow-hidden mb-4 border border-solid border-border">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'w-full h-full object-cover',
                                    'alt'   => get_the_title(),
                                ]); ?>
                            <?php else : ?>
                                <img src="https://placehold.co/600x600" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                            <?php endif; ?>
                        </div>
                        <h3 class="font-sans text-sm text-foreground group-hover:text-stone-accent transition-colors duration-300 mb-1"><?php the_title(); ?></h3>
                        <?php if (!empty($eml_subtitle)) : ?>
                            <p class="text-muted-foreground text-sm"><?php echo esc_html($eml_subtitle); ?></p>
                        <?php endif; ?>
                    </a>
                <?php endwhile; ?>
            </div>

            <div class="mt-10 text-center" style="opacity: 1; transform: none;">
                <a href="<?php echo esc_url($eml_best_seller_link); ?>" class="btn-primary">View All Tiles</a>
            </div>
        <?php else : ?>
            <div class="text-center text-muted-foreground">
                No products are currently available.
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>
