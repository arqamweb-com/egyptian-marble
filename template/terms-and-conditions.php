<?php /* Template Name: Terms & Conditions */ ?>

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


get_header();

$eml_updated = 'October 2026';
$eml_email   = 'info@egyptian-marble.com';

/**
 * Sections are declared once and used for both the table of contents and the
 * body, so the two can never drift apart. Edit the copy here.
 */
$eml_sections = [
    [
        'id'      => 'about-these-terms',
        'title'   => 'About these terms',
        'content' => <<<'HTML'
<p>These terms apply to your use of egyptian-marble.com and to trade enquiries you send us through it. The website is run by EML (Egyptian Marble &amp; Limestone), a natural stone exporter based in Cairo, Egypt. By using the website, you accept these terms.</p>
HTML
    ],
    [
        'id'      => 'information-only',
        'title'   => 'Information only',
        'content' => <<<'HTML'
<p>The website is for general information. Nothing on it is an offer to sell. No contract is formed by browsing the site, sending a form or chatting with us on WhatsApp.</p>
HTML
    ],
    [
        'id'      => 'natural-stone-varies',
        'title'   => 'Natural stone varies',
        'content' => <<<'HTML'
<p>Marble, granite and limestone are natural materials. Colour, veining, pattern and texture change from block to block and from slab to slab. Product photos on the website are indicative, and screens show colours differently. The stone you receive will not match a photo exactly, and this is not a defect.</p>
HTML
    ],
    [
        'id'      => 'samples',
        'title'   => 'Samples',
        'content' => <<<'HTML'
<p>Samples show the general type, colour range and finish of a stone. They are for reference only. A delivered order can differ from a sample within the normal range for that material.</p>
HTML
    ],
    [
        'id'      => 'prices-and-availability',
        'title'   => 'Prices and availability',
        'content' => <<<'HTML'
<p>Prices, stock and lead times can change at any time. They are confirmed only in a written quotation from EML, and each quotation states how long it is valid.</p>
HTML
    ],
    [
        'id'      => 'orders-payment-and-shipping',
        'title'   => 'Orders, payment and shipping',
        'content' => <<<'HTML'
<p>Each order, its payment terms and its shipping terms (EXW, FOB or CIF under Incoterms) are agreed in the quotation or pro-forma invoice for that order. Those documents take priority over anything on the website.</p>
HTML
    ],
    [
        'id'      => 'claims',
        'title'   => 'Claims',
        'content' => <<<'HTML'
<p>If there is a problem with the goods, tell us in writing within a reasonable period after delivery. Include your order number, a description of the problem and clear photos. Please keep the goods as they arrived until we have reviewed the claim.</p>
HTML
    ],
    [
        'id'      => 'website-content',
        'title'   => 'Website content',
        'content' => <<<'HTML'
<p>The text, photos, logos and design of this website belong to EML. You may not copy, reuse or publish them without our written permission.</p>
HTML
    ],
    [
        'id'      => 'governing-law',
        'title'   => 'Governing law',
        'content' => <<<'HTML'
<p>These terms are governed by the laws of the Arab Republic of Egypt.</p>
HTML
    ],
    [
        'id'      => 'changes',
        'title'   => 'Changes to these terms',
        'content' => <<<'HTML'
<p>If we change these terms, we will publish the new version on this page and update the date at the top.</p>
HTML
    ],
];
?>

<div>
    <main class="min-h-screen bg-background">

        <section class="py-16" style="background-color: rgb(245, 240, 235);">
            <div class="ast-container">
                <div class="max-w-4xl mx-auto text-center">
                    <p class="text-sm uppercase tracking-wider mb-2" style="color: rgb(150, 124, 101);">EML Co.</p>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Terms and Conditions</h1>
                    <p class="text-muted-foreground mb-0">Last updated: <?php echo esc_html($eml_updated); ?></p>
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="ast-container">
                <div class="max-w-4xl mx-auto eml-legal">

                    <nav class="eml-legal-toc" aria-label="On this page">
                        <h2>On This Page</h2>
                        <ol>
                            <?php foreach ($eml_sections as $eml_i => $eml_section) : ?>
                                <li>
                                    <a href="#<?php echo esc_attr($eml_section['id']); ?>"><?php echo ($eml_i + 1) . '. ' . $eml_section['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>

                    <p class="eml-legal-lead">These terms explain how you can use this website and how our export sales work.</p>

                    <?php foreach ($eml_sections as $eml_i => $eml_section) : ?>
                        <section class="eml-legal-section" id="<?php echo esc_attr($eml_section['id']); ?>">
                            <h2><?php echo ($eml_i + 1) . '. ' . $eml_section['title']; ?></h2>
                            <?php echo $eml_section['content']; ?>
                        </section>
                    <?php endforeach; ?>

                    <div class="eml-legal-contact">
                        <h2>Contact Us</h2>
                        <p>If you have a question about this page, please get in touch:</p>
                        <p><strong>EML (Egyptian Marble &amp; Limestone)</strong></p>
                        <p>Email: <a href="mailto:<?php echo esc_attr($eml_email); ?>"><?php echo esc_html($eml_email); ?></a></p>
                        <p>Phone and WhatsApp: <a href="tel:+201001649770">+20 100 164 9770</a></p>
                    </div>

                </div>
            </div>
        </section>

    </main>
</div><!-- #primary -->

<?php get_footer(); ?>
