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
                        <h1 class="text-3xl md:text-4xl font-bold mb-6 text-foreground" style="font-family: Georgia, serif;">Design Service</h1>
                        <div class="rounded-lg p-6 mb-10" style="background-color: rgb(150, 124, 101);">
                            <p class="text-white leading-relaxed">We have been involved in many Design Service projects
                                in USA, England, Cyprus, Turkey, Dubai, Palestine, Malta, Australia, Ireland, Bulgaria,
                                Ukraine, Kenya, Spain and Mexico. And gained a lot of experiences and great reputation
                                from our customer.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                            <div class="bg-background rounded-lg overflow-hidden border border-solid border-border hover:shadow-lg transition-shadow">
                                <div class="aspect-[4/3] overflow-hidden">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/mazloum-store-BoLf_eKl.png"
                                         alt="Mazloum Home" class="w-full h-full object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-foreground mb-2">Mazloum Home</h3>
                                    <p class="text-xs text-muted-foreground line-clamp-4">
                                        Home Mazloum Home Mazloum Home Down Town – EML Egyptian Marble. Categories:
                                        Design service. Brand: EML -Stone &amp; Building. Art style: Italian style.
                                        Material: Cream Marvel &amp; Spanish Black. FOB port: Alexandria and Ain Sokhna.
                                        Design: Customized.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-background rounded-lg overflow-hidden border border-solid border-border hover:shadow-lg transition-shadow">
                                <div class="aspect-[4/3] overflow-hidden"><img
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/varna-hotel3-yfu7WQo4.png"
                                            alt="International Hotel Casino &amp; Tower Suites"
                                            class="w-full h-full object-cover"></div>
                                <div class="p-4">
                                    <h3 class="font-bold text-foreground mb-2">International Hotel Casino &amp; Tower
                                        Suites</h3>
                                    <p class="text-xs text-muted-foreground line-clamp-4">Categories: Design service.
                                        Brand: EML -Stone &amp; Building. Art style: Europe style. Material: Filleto
                                        catrina imbrador light. FOB port: Alexandria.</p>
                                </div>
                            </div>
                            <div class="bg-background rounded-lg overflow-hidden border border-solid border-border hover:shadow-lg transition-shadow">
                                <div class="aspect-[4/3] overflow-hidden"><img
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/assets/czech-spa-3-D0-AvDMA.png"
                                            alt="Czech Project" class="w-full h-full object-cover"></div>
                                <div class="p-4">
                                    <h3 class="font-bold text-foreground mb-2">Czech Project</h3>
                                    <p class="text-xs text-muted-foreground line-clamp-4">Categories: Design service.
                                        Brand: EML -Stone &amp; Building. Art style: Europe style. Type: Czech Project
                                        SPA. Material: Egyptian Sunny. FOB port: Alexandria and Ain Sokhna. Design:
                                        Customized.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold mb-6"
                                style="color: rgb(150, 124, 101); font-family: Georgia, serif;">The Art and Impact of
                                Design Services</h2>
                            <p class="text-muted-foreground leading-relaxed mb-6">Design services, a dynamic and
                                transformative force in the realms of architecture and interior spaces, are more than
                                just a service; they are the orchestrators of visual narratives, shaping environments
                                and experiences.</p>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">The Essence of Design Services</h3>
                                <p class="text-muted-foreground leading-relaxed">At its core, design encapsulate a
                                    collaborative journey between designers and clients, where creative visions are
                                    translated into tangible, aesthetic realities. Whether it's crafting the interiors
                                    of a residence, envisioning a commercial space, or conceptualizing landscapes,
                                    design are the conduits through which ideas are breathed into existence.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Beyond Aesthetics</h3>
                                <p class="text-muted-foreground leading-relaxed">While aesthetics play a pivotal role,
                                    design extend beyond the mere embellishment of spaces. They are intricate
                                    problem-solvers, addressing functional needs, optimizing spatial layouts, and
                                    enhancing the overall usability of a space. From the flow of natural light to the
                                    ergonomics of furniture, every detail is meticulously considered to create spaces
                                    that seamlessly blend form and function.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Tailoring Experiences</h3>
                                <p class="text-muted-foreground leading-relaxed">Design services are architects of
                                    experiences. They recognize that each space has a unique identity, and through
                                    thoughtful curation, they bring out the character that resonates with the intended
                                    purpose.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Collaboration and Communication</h3>
                                <p class="text-muted-foreground leading-relaxed">A hallmark of effective design is the
                                    art of collaboration. Designers work closely with clients, understanding their
                                    preferences, aspirations, and the practical needs of the space. Through clear
                                    communication and iterative processes, a shared vision emerges.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Innovation in Materials and
                                    Technology</h3>
                                <p class="text-muted-foreground leading-relaxed">Design are at the forefront of
                                    innovation, constantly exploring new materials, technologies, and sustainable
                                    practices. From smart home integration to the use of recycled and eco-friendly
                                    materials, designers leverage advancements to create spaces that are not only
                                    aesthetically pleasing but also technologically savvy and environmentally
                                    conscious.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Spatial Planning and
                                    Optimization</h3>
                                <p class="text-muted-foreground leading-relaxed">One of the core competencies of design
                                    is spatial planning. Designers analyze and optimize layouts to enhance
                                    functionality, improve traffic flow, and maximize the efficient use of space.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Cultural and Contextual
                                    Sensitivity</h3>
                                <p class="text-muted-foreground leading-relaxed">Great design embrace cultural and
                                    contextual sensitivity. They recognize that design is not a one-size-fits-all
                                    endeavor. A well-designed space should harmonize with its surroundings, paying
                                    homage to local culture, architectural traditions, and the natural environment.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">The Impact on Well-Being</h3>
                                <p class="text-muted-foreground leading-relaxed">Design services wield a profound
                                    influence on human well-being. Thoughtfully designed spaces have the power to
                                    enhance mood, improve productivity, and contribute to a sense of well-being.</p>
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-bold text-foreground mb-2">Conclusion</h3>
                                <p class="text-muted-foreground leading-relaxed">In the grand tapestry of the built
                                    environment, design services emerge as masterful weavers, crafting narratives that
                                    transcend the visual and engage the senses. Their impact is not confined to the
                                    surfaces of walls and floors; it resonates in the way we experience and interact
                                    with our surroundings. As we navigate the ever-evolving landscapes of architecture
                                    and interior design, design services remain not only a service but a vital catalyst
                                    for innovation, beauty, and the creation of spaces that inspire and uplift the human
                                    spirit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div><!-- #primary -->


<?php get_footer(); ?>