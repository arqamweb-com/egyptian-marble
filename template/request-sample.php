<?php /* Template Name: Request Sample */ ?>

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

/**
 * Resolve the Contact Form 7 form by title so the page keeps working
 * if the form is re-created with a different ID.
 */
$eml_sample_form_title = 'Request Free Samples';
$eml_sample_form_id    = 0;

if (defined('WPCF7_VERSION')) {
    $eml_sample_forms = get_posts(array(
        'post_type'        => 'wpcf7_contact_form',
        'title'            => $eml_sample_form_title,
        'post_status'      => 'publish',
        'posts_per_page'   => 1,
        'fields'           => 'ids',
        'suppress_filters' => false,
    ));

    if (!empty($eml_sample_forms)) {
        $eml_sample_form_id = (int) $eml_sample_forms[0];
    }
}

get_header(); ?>

<div>

    <main class="flex-1">

        <!-- Hero -->
        <section class="py-16" style="background-color: rgb(245, 240, 235);">
            <div class="ast-container max-w-4xl text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Request Your Free Stone Samples</h1>
                <p class="text-lg text-muted-foreground leading-relaxed mb-4">Nothing replaces holding the stone in your hand. Order complimentary samples of our Egyptian marble, limestone, granite and onyx and judge the colour, veining and finish for yourself before you commit to a full order.</p>
                <p class="text-muted-foreground leading-relaxed font-semibold mb-0">Free samples &middot; Worldwide shipping &middot; Dispatched within 48 hours</p>
            </div>
        </section>

        <!-- Why request samples -->
        <section class="py-16">
            <div class="ast-container">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-16" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Why Request Samples?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-background p-6 rounded-lg shadow-sm hover:shadow-lg transition-shadow text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center" style="background-color: rgb(150, 124, 101);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-7 h-7 text-white">
                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                <path d="M12 22V12"></path>
                                <path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7"></path>
                                <path d="m7.5 4.27 9 5.15"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Physical Inspection</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">See and feel the real texture, colour variation and finish of the stone before placing an order.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg shadow-sm hover:shadow-lg transition-shadow text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center" style="background-color: rgb(150, 124, 101);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-palette w-7 h-7 text-white">
                                <circle cx="13.5" cy="6.5" r=".5"></circle>
                                <circle cx="17.5" cy="10.5" r=".5"></circle>
                                <circle cx="8.5" cy="7.5" r=".5"></circle>
                                <circle cx="6.5" cy="12.5" r=".5"></circle>
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Colour Matching</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Match the stone against your design boards, existing materials and site lighting with confidence.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg shadow-sm hover:shadow-lg transition-shadow text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center" style="background-color: rgb(150, 124, 101);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe w-7 h-7 text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Worldwide Shipping</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">We ship samples to clients in Europe, the Gulf, Africa, the Americas and Asia &mdash; wherever your project is.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg shadow-sm hover:shadow-lg transition-shadow text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center" style="background-color: rgb(150, 124, 101);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-7 h-7 text-white">
                                <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                <path d="M15 18H9"></path>
                                <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                                <circle cx="17" cy="18" r="2"></circle>
                                <circle cx="7" cy="18" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Fast Dispatch</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Samples are typically prepared and dispatched within 48 hours of confirming your request.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Request form -->
        <section class="py-16" style="background-color: rgb(249, 246, 243);">
            <div class="ast-container">
                <div class="grid md:grid-cols-2 gap-12">

                    <div id="request-sample-form">
                        <h2 class="text-2xl md:text-3xl font-bold mb-3" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Request Your Samples</h2>
                        <p class="text-muted-foreground mb-8">Fill in your details and our export team will get back to you with sample and shipping confirmation.</p>

                        <style>
                            #request-sample-form .wpcf7 form > p,
                            #request-sample-form .wpcf7 form > label {
                                margin-bottom: 1.1rem;
                            }

                            #request-sample-form .cf7-row {
                                margin-bottom: 0;
                            }

                            @media (min-width: 768px) {
                                #request-sample-form .cf7-row {
                                    display: flex;
                                    gap: 1rem;
                                }

                                #request-sample-form .cf7-row p,
                                #request-sample-form .cf7-row label {
                                    flex: 1;
                                }
                            }

                            #request-sample-form .wpcf7 .wpcf7-submit {
                                width: 100%;
                                height: 3rem;
                                font-size: 1rem;
                                font-weight: 600;
                                background: rgb(150, 124, 101);
                                border-color: rgb(150, 124, 101);
                                color: #fff;
                            }
                        </style>

                        <div class="bg-background p-6 md:p-8 rounded-lg border border-solid border-border shadow-sm">
                            <?php if ($eml_sample_form_id) : ?>
                                <?php echo do_shortcode('[contact-form-7 id="' . $eml_sample_form_id . '" title="' . esc_attr($eml_sample_form_title) . '"]'); ?>
                            <?php else : ?>
                                <p class="text-muted-foreground mb-0">
                                    <?php
                                    printf(
                                        /* translators: %s: Contact Form 7 form title. */
                                        esc_html__('The "%s" contact form was not found. Please create it in Contact &rarr; Contact Forms.', 'arqamweb'),
                                        esc_html($eml_sample_form_title)
                                    );
                                    ?>
                                </p>
                            <?php endif; ?>

                            <p class="text-xs text-muted-foreground mt-4 mb-0">By submitting this form you agree to our privacy policy. We never share your information with third parties.</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">What You Receive</h3>
                        <div class="space-y-4 mb-10">
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-5 h-5 mt-1 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">Sample tiles of the stones you select, cut from current production blocks.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-5 h-5 mt-1 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">The surface finish you ask for: polished, honed, brushed, tumbled, bush hammered or sandblasted.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-5 h-5 mt-1 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">A technical sheet with available sizes, thicknesses and quarry information.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-5 h-5 mt-1 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">An FOB quotation for Alexandria or Ain Sokhna port based on your quantities.</p>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Prefer To Talk?</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">002-230-54321</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smartphone w-5 h-5 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect>
                                    <path d="M12 18h.01"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">002-010-01649-770</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-5 h-5 flex-shrink-0" style="color: rgb(150, 124, 101);">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </svg>
                                <p class="text-muted-foreground mb-0">marketing@egyptian-marble.com</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- How it works -->
        <section class="py-16">
            <div class="ast-container">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-16" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-background p-6 rounded-lg border border-solid border-border text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full flex items-center justify-center text-white text-lg font-bold" style="background-color: rgb(150, 124, 101);">1</div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Send Your Request</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Tell us which stones you are interested in, the finish you need and where the samples should be shipped.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-solid border-border text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full flex items-center justify-center text-white text-lg font-bold" style="background-color: rgb(150, 124, 101);">2</div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">We Confirm &amp; Prepare</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Our export team confirms availability, prepares the samples and shares the courier details with you.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-solid border-border text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full flex items-center justify-center text-white text-lg font-bold" style="background-color: rgb(150, 124, 101);">3</div>
                        <h3 class="text-lg font-bold mb-3 text-foreground">Samples At Your Door</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">Inspect the stone on site, then come back to us with quantities and we will issue your full quotation.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Closing note -->
        <section class="py-16" style="background-color: rgb(245, 240, 235);">
            <div class="ast-container max-w-4xl text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-6" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Not Sure Which Stone To Choose?</h2>
                <p class="text-muted-foreground leading-relaxed mb-8">Share your project details &mdash; application, climate, traffic and budget &mdash; and our team will recommend the Egyptian marble, limestone or granite that fits best, then send those samples to you.</p>
                <a href="<?php echo esc_url(get_page_link_by_slug('contact')); ?>" class="inline-flex items-center justify-center gap-2 rounded-md px-6 h-12 text-base font-semibold text-white transition-colors" style="background-color: rgb(150, 124, 101);">Talk To Our Team</a>
            </div>
        </section>

    </main>

</div><!-- #primary -->

<?php get_footer(); ?>
