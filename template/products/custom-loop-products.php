<?php
$per_paged = get_query_var('per_paged') ?: -1;
$products_cat   = get_query_var('products_category');

$args = [
    'post_type'      => 'eml-product',
    'posts_per_page' => $per_paged,
    'orderby'        => 'date',
    'order'          => 'ASC',
];

if (!empty($products_cat)) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'product_category',
            'field'    => 'slug',
            'terms'    => $products_cat,
        ]
    ];
}

$q = new WP_Query($args);
?>

<?php if ($q->have_posts()) : $i = 0; ?>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

        <?php while ($q->have_posts()) : $q->the_post();
            $i++; ?>


            <a class="group relative overflow-hidden rounded-lg shadow-lg" href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', [
                        'class' => 'w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500',
                        'title' => get_the_title(),
                        'alt'   => get_the_title(),
                    ]); ?>
                <?php else : ?>
                    <img
                        src="https://placehold.co/480x288"
                        alt="<?php the_title_attribute(); ?>"
                        class="w-full h-72 object-cover">
                <?php endif; ?>

                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end justify-center pb-6">
                    <h3 class="text-xl font-serif font-semibold text-primary-foreground text-center"><?php the_title(); ?></h3>
                </div>
            </a>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    </div>

<?php else : ?>
    <div class="col-span-full text-center text-muted-foreground mb-4">
        No products are currently available.
    </div>
<?php endif; ?>