<?php /* Template Name: Designer Team */ ?>

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
        <section class="py-16" style="background-color: rgb(245, 240, 235);">
            <div class="ast-container text-center">
                <div class="max-w-xs mx-auto mb-6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/no-image-kJ7QXhJl.png" alt="Eng. Ahmed Sabry" class="w-48 h-48 object-cover rounded-full mx-auto shadow-lg"></div>
                <h1 class="text-3xl font-bold text-foreground mb-1" style="font-family: Georgia, serif;">Eng. Ahmed Sabry</h1>
                <p class="text-lg mb-10" style="color: rgb(150, 124, 101);">CEO &amp; Founder</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-work-1-BGFrQ95s.png" alt="Project 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-work-2-BMoVy4Px.png" alt="Project 2" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-work-3-CgTH06Er.png" alt="Project 3" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-work-5-C_7bQEM8.png" alt="Project 4" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-gallery-1-UH_oIEVI.webp" alt="Gallery 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-gallery-2-D_cf7Psx.webp" alt="Gallery 2" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-gallery-3-BV8X95Rm.webp" alt="Gallery 3" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/team-gallery-4-ZMmu6XVk.webp" alt="Gallery 4" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                </div>
            </div>
        </section>
        <section class="py-16">
            <div class="ast-container">
                <h2 class="text-3xl font-bold text-center mb-12" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Designer Team</h2>
                <div class="flex flex-col md:flex-row items-start gap-10 mb-10">
                    <div class="md:w-1/3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/abd-elrahman-JQ3sMKj6.png" alt="Eng Abd ElRahman Mukhtar" class="w-full rounded-lg shadow-lg"></div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-bold text-foreground mb-1">Eng Abd ElRahman Mukhtar</h3>
                        <p class="text-sm mb-4" style="color: rgb(150, 124, 101);">Installations and supplies manager</p>
                        <p class="text-muted-foreground leading-relaxed mb-6">One of the most important departments in the company is at the head of this department, Engineer Abdul Rahman, who is supervising the implementation of many projects within the Republic due to his experience in this field with the presence of the best assistant technicians.</p>
                        <h4 class="font-bold text-foreground mb-2">Projects</h4>
                        <ul class="text-muted-foreground space-y-1 text-sm">
                            <li>• Soma Bey Residential Villas</li>
                            <li>• El Sallab Building, Fifth Settlement</li>
                            <li>• Mazloum building in the assembly and the sixth of October</li>
                        </ul>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/mazloum-home2-CceNzgtx.png" alt="Engineer project 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/project-2-2-CRFznAET.png" alt="Engineer project 2" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/villa-soma-bay-DeA11s6O.png" alt="Engineer project 3" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                    <div class="overflow-hidden rounded-lg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/mazloum-home-eng-CJCcAhm1.png" alt="Engineer project 4" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"></div>
                </div>
            </div>
        </section>
    </main>

</div><!-- #primary -->


<?php get_footer(); ?>