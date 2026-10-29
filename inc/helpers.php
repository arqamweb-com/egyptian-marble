<?php

/**
 * Theme helper functions.
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('get_page_link_by_slug')) {
    /**
     * Get the permalink of a page by its slug.
     *
     * Resolves the page once, translates the ID to the current language when a
     * multilingual plugin (Polylang / WPML) is active, and caches the result.
     * Use instead of hard-coding URLs so links stay correct and translatable.
     *
     * @param string $slug     Page slug (use 'parent/child' for nested pages).
     * @param string $fallback Returned when the page can't be found. Default '#'.
     * @return string The page URL, or $fallback.
     */
    function get_page_link_by_slug($slug, $fallback = '#')
    {
        $slug = trim((string) $slug);
        if ($slug === '') {
            return $fallback;
        }

        static $cache = array();
        $lang   = function_exists('pll_current_language') ? pll_current_language() : (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : '');
        $ckey   = $lang . '|' . $slug;
        if (isset($cache[$ckey])) {
            return $cache[$ckey];
        }

        $page = get_page_by_path($slug);
        if (!$page) {
            return $cache[$ckey] = $fallback;
        }

        $page_id = (int) $page->ID;

        // Map to the translated page when a multilingual plugin is active.
        if (function_exists('pll_get_post')) {                 // Polylang
            $translated = pll_get_post($page_id);
            if ($translated) {
                $page_id = (int) $translated;
            }
        } elseif (has_filter('wpml_object_id')) {              // WPML
            $page_id = (int) apply_filters('wpml_object_id', $page_id, 'page', true);
        }

        $link = get_permalink($page_id);

        return $cache[$ckey] = ($link ? $link : $fallback);
    }
}
