<?php
// "Direct from our quarries in Egypt" slide, hidden by default (client decision, 20 Oct).
$eml_show_quarries_slide = apply_filters('eml_show_quarries_slide', false);
$eml_hero_slide_count    = $eml_show_quarries_slide ? 2 : 1;
?>
<section class="hero-slider relative min-h-[70vh] md:min-h-[80vh] flex items-center overflow-hidden">
    <style>
        .slide {
            opacity: 0;
            transform: scale(1.1);
            transition: opacity 1s ease, transform 1s ease;
        }

        .slide.is-active {
            opacity: 1;
            transform: scale(1);
        }

        .slide-content {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
            position: absolute;
        }

        .slide-content.is-active {
            opacity: 1;
            transform: translateY(0);
            position: relative;
        }
    </style>


    <!-- Slides -->
    <div class="slides absolute inset-0">

        <?php if ($eml_show_quarries_slide) : ?>
        <!-- Slide 1 -->
        <div class="slide is-active absolute inset-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/hero-quarry.jpg"
                class="w-full h-full object-cover" />
            <div class="hero-overlay absolute inset-0"></div>
        </div>
        <?php endif; ?>

        <!-- Slide 2 -->
        <div class="slide<?php echo $eml_show_quarries_slide ? '' : ' is-active'; ?> absolute inset-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/interior-luxury.jpg"
                class="w-full h-full object-cover" />
            <div class="hero-overlay absolute inset-0"></div>
        </div>

    </div>

    <!-- Content -->
    <div class="relative z-10 w-full px-6 md:px-12 lg:px-20 py-20">
        <?php if ($eml_show_quarries_slide) : ?>
        <div class="slide-content is-active max-w-2xl text-stone-cream">
            <p class="subtitle text-sm font-sans uppercase tracking-widest mb-4 text-stone-accent-light">Direct From Our Quarries in Egypt</p>
            <h1 class="title text-4xl md:text-5xl lg:text-6xl font-medium leading-tight mb-6 whitespace-pre-line text-stone-cream">Premium Egyptian Marble,<br>Limestone &amp; Granite</h1>
            <p class="description text-lg md:text-xl font-light mb-8 max-w-xl text-stone-cream/90">Quarried, processed, and exported worldwide from our own facilities. Slabs, tiles, and custom stonework crafted to architectural specification.</p>
            <div class="flex flex-wrap gap-4"><a href="<?php echo esc_url(home_url('/products')); ?>" class="btn-primary">Explore Collection</a><a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-outline-light">Request a Quote</a></div>
        </div>
        <?php endif; ?>

        <?php // The first visible slide carries the page's single H1. ?>
        <?php $eml_slide2_tag = $eml_show_quarries_slide ? 'h2' : 'h1'; ?>
        <div class="slide-content<?php echo $eml_show_quarries_slide ? '' : ' is-active'; ?> max-w-2xl text-stone-cream">
            <p class="subtitle text-sm font-sans uppercase tracking-widest mb-4 text-stone-accent-light">Timeless Natural Stone</p>
            <<?php echo $eml_slide2_tag; ?> class="title text-4xl md:text-5xl lg:text-6xl font-medium leading-tight mb-6 whitespace-pre-line text-stone-cream">Elegance That Elevates<br>Every Space</<?php echo $eml_slide2_tag; ?>>
            <p class="description text-lg md:text-xl font-light mb-8 max-w-xl text-stone-cream/90">
                From luxury interiors to grand facades &mdash; trusted by architects and contractors for consistent quality, reliable supply, and global shipping.
            </p>
            <div class="flex flex-wrap gap-4"><a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn-primary">View Our Projects</a><a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-outline-light">Contact Us</a></div>
        </div>
    </div>

    <?php if ($eml_hero_slide_count > 1) : ?>
    <!-- Arrows -->
    <button class="prev p-4 absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left w-6 h-6 text-white">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
    </button>
    <button class="next p-4 absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-6 h-6 text-white">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </button>

    <!-- Dots -->
    <div class="dots absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        <button class="dot p-0 w-8 h-3 rounded-full transition-all duration-300 is-active" style="background-color: rgb(255 255 255 / 0.7);"></button>
        <button class="dot p-0 w-3 h-3 rounded-full transition-all duration-300 bg-white/50 hover:bg-white/70"></button>
    </div>


    <script>
        const slides = document.querySelectorAll('.slide');
        const contents = document.querySelectorAll('.slide-content');
        const dots = document.querySelectorAll('.dot');

        let current = 0;
        const total = slides.length;

        function showSlide(index) {
            slides.forEach((s) => s.classList.remove('is-active'));
            contents.forEach((c) => c.classList.remove('is-active'));
            dots.forEach((d) => {
                d.classList.remove('is-active', 'w-8');
                d.style.backgroundColor = '';
                d.classList.add('w-3', 'bg-white/50', 'hover:bg-white/70');
            });

            slides[index].classList.add('is-active');
            contents[index].classList.add('is-active');
            dots[index].classList.remove('w-3', 'bg-white/50', 'hover:bg-white/70');
            dots[index].classList.add('is-active', 'w-8');
            dots[index].style.backgroundColor = 'rgb(255 255 255 / 0.7)';

            current = index;
        }

        document.querySelector('.next').addEventListener('click', () => {
            showSlide((current + 1) % total);
        });

        document.querySelector('.prev').addEventListener('click', () => {
            showSlide((current - 1 + total) % total);
        });

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => showSlide(i));
        });

        setInterval(() => {
            showSlide((current + 1) % total);
        }, 6000);
    </script>
    <?php endif; ?>
</section>
