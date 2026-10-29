<?php
$eml_articles = new WP_Query([
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
]);
?>
<section class="py-20 bg-background">
    <div class="ast-container">
        <div class="mb-12" style="opacity: 1; transform: none;">
            <p class="text-sm uppercase tracking-widest text-stone-accent mb-2">Insights &amp; Inspiration from the Experts</p>
            <h2 class="font-serif text-3xl md:text-4xl text-foreground">EML Articles</h2>
        </div>

        <?php if ($eml_articles->have_posts()) : ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php while ($eml_articles->have_posts()) : $eml_articles->the_post();
                    $eml_cats     = get_the_category();
                    $eml_cat_name = (!empty($eml_cats) && !is_wp_error($eml_cats)) ? $eml_cats[0]->name : '';
                ?>
                    <a href="<?php the_permalink(); ?>" class="group block" style="opacity: 1; transform: none;">
                        <div class="relative img-zoom rounded-sm overflow-hidden mb-4">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'w-full aspect-[4/3] object-cover',
                                    'alt'   => get_the_title(),
                                ]); ?>
                            <?php else : ?>
                                <img src="https://placehold.co/800x600" alt="<?php the_title_attribute(); ?>" class="w-full aspect-[4/3] object-cover">
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-muted-foreground mb-2">
                            <?php if (!empty($eml_cat_name)) : ?>
                                <span class="text-stone-accent"><?php echo esc_html($eml_cat_name); ?></span>
                                <span>•</span>
                            <?php endif; ?>
                            <span><?php echo esc_html(get_the_date('F j, Y')); ?></span>
                        </div>
                        <h3 class="font-serif text-lg text-foreground group-hover:text-stone-accent transition-colors duration-300 line-clamp-2"><?php the_title(); ?></h3>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="text-center text-muted-foreground">
                No articles are currently available.
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>
