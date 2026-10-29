<?php /* Template Name: Privacy Policy */ ?>

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
        'id'      => 'who-we-are',
        'title'   => 'Who we are',
        'content' => <<<'HTML'
<p>This website is run by EML (Egyptian Marble &amp; Limestone), a natural stone exporter based in Cairo, Egypt. We sell Egyptian marble, granite and limestone slabs and tiles to trade buyers around the world.</p>
<p>This policy explains what personal data we collect through egyptian-marble.com, why we collect it and what you can ask us to do with it.</p>
HTML
    ],
    [
        'id'      => 'what-we-collect',
        'title'   => 'What we collect',
        'content' => <<<'HTML'
<p>We only collect personal data through our quote, contact and free-sample forms. When you send one of these forms, we receive the details you type in:</p>
<ul>
<li>your name</li>
<li>your email address</li>
<li>your company name</li>
<li>your country</li>
<li>your phone number</li>
<li>your message, including any product, size or quantity details</li>
</ul>
<p>We do not ask for payment details on this website.</p>
HTML
    ],
    [
        'id'      => 'why-we-use-it',
        'title'   => 'Why we use it',
        'content' => <<<'HTML'
<p>We use your details to:</p>
<ul>
<li>reply to your enquiry</li>
<li>prepare and send you a quotation</li>
<li>arrange and send the samples you ask for</li>
<li>follow up on that quotation or sample request</li>
</ul>
<p>If you place an order, we also use your details to arrange the sale, shipping and export paperwork.</p>
HTML
    ],
    [
        'id'      => 'how-long-we-keep-it',
        'title'   => 'How long we keep it',
        'content' => <<<'HTML'
<p>If an enquiry does not lead to an order, we delete your details within 24 months of our last contact with you. If you become a customer, we keep order and invoice records for as long as Egyptian tax and accounting rules require.</p>
HTML
    ],
    [
        'id'      => 'we-never-sell-your-data',
        'title'   => 'We never sell your data',
        'content' => <<<'HTML'
<p>We do not sell your personal data, and we do not rent or trade it to anyone. We only share it when that is needed to handle your request, for example with the courier who delivers your samples.</p>
HTML
    ],
    [
        'id'      => 'analytics-cookies',
        'title'   => 'Analytics cookies',
        'content' => <<<'HTML'
<p>Cookies are small files saved by your browser. We use analytics cookies to see how visitors find and use the site, such as which pages are viewed, the type of device and the approximate location. This helps us improve the site. It does not tell us who you are.</p>
<p>You can block or delete cookies in your browser settings. The site will still work if you do.</p>
HTML
    ],
    [
        'id'      => 'whatsapp',
        'title'   => 'WhatsApp',
        'content' => <<<'HTML'
<p>Our WhatsApp button opens a chat with our sales team. Once you start a chat, your messages are handled by WhatsApp under its own privacy policy. We use what you send us only to answer you.</p>
HTML
    ],
    [
        'id'      => 'your-rights',
        'title'   => 'Your rights',
        'content' => <<<'HTML'
<p>You can ask us at any time to:</p>
<ul>
<li>tell you what personal data we hold about you</li>
<li>correct details that are wrong or out of date</li>
<li>delete your data, unless we need to keep it for a legal reason</li>
</ul>
<p>Send your request to <a href="mailto:info@egyptian-marble.com">info@egyptian-marble.com</a>. We reply within one month.</p>
HTML
    ],
    [
        'id'      => 'changes',
        'title'   => 'Changes to this policy',
        'content' => <<<'HTML'
<p>If we change this policy, we will publish the new version on this page and update the date at the top.</p>
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
                    <h1 class="text-3xl md:text-4xl font-bold mb-4" style="color: rgb(150, 124, 101); font-family: Georgia, serif;">Privacy Policy</h1>
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

                    <p class="eml-legal-lead">This policy explains how EML handles the personal data you share with us through this website.</p>

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
                        <p>9 Omar Ibn ElKhattab St., branched from El Nasr Road, Ramo Buildings, 9th floor, Office #904, Nasr City, Cairo, Egypt</p>
                        <p>Email: <a href="mailto:<?php echo esc_attr($eml_email); ?>"><?php echo esc_html($eml_email); ?></a></p>
                        <p>Phone and WhatsApp: <a href="tel:+201001649770">+20 100 164 9770</a></p>
                    </div>

                </div>
            </div>
        </section>

    </main>
</div><!-- #primary -->

<?php get_footer(); ?>
