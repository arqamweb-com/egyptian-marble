<section class="py-20 bg-stone-beige">
    <div class="ast-container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div style="opacity: 1; transform: none;">
                <div class="relative img-zoom rounded-sm overflow-hidden">
                    <img src="https://egyptian-marble.com/wp-content/uploads/2026/08/12.jpg"
                         alt="EML Showroom" class="w-full h-auto" loading="lazy">
                </div>
            </div>
            <div style="opacity: 1; transform: none;">
                <p class="text-sm uppercase tracking-widest text-stone-accent mb-2">Experience Stone in Person</p>
                <h2 class="font-serif text-3xl md:text-4xl text-foreground mb-6">Get a Free Sample</h2>
                <p class="text-muted-foreground mb-6 leading-relaxed">See and feel the quality of our natural stone
                    before you order. Request a free sample and we'll send it directly to you, so you can check the
                    color, texture, and finish for your project.</p>
                <ul class="text-foreground mb-8 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-stone-accent rounded-full"></span>Free
                        samples shipped worldwide
                    </li>
                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-stone-accent rounded-full"></span>Matched
                        to your exact project needs
                    </li>
                </ul>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(get_page_link_by_slug('request-free-sample')); ?>" class="btn-primary">Request a Free Sample</a>
                    <?php if ($catalog_url = eml_get_catalog_url()) : ?>
                        <a href="<?php echo esc_url($catalog_url); ?>" class="btn-outline" target="_blank" rel="noopener">View Catalog</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>