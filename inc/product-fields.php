<?php

/**
 * Single Product – extra ACF fields + helpers
 *
 * Registers the additional product fields required by the redesigned
 * single-eml-product template so they are editable from the dashboard,
 * and provides small helpers used by the template.
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register the extra product fields (ACF).
 */
add_action('acf/init', 'eml_register_product_fields');
function eml_register_product_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key'      => 'group_eml_product_design',
        'title'    => 'Product Details (Design)',
        'fields'   => array(
            array('key' => 'field_eml_hero_subtitle',  'label' => 'Hero Subtitle',        'name' => 'product_hero_subtitle',  'type' => 'textarea', 'rows' => 2, 'instructions' => 'النص اللي تحت العنوان في الهيرو.'),
            array('key' => 'field_eml_headline',        'label' => 'Headline',             'name' => 'product_headline',        'type' => 'text',     'instructions' => 'العنوان الرئيسي جنب صور المنتج (مثال: Unique Paving for Outdoor Living).'),
            array('key' => 'field_eml_description',      'label' => 'Description',          'name' => 'product_description',      'type' => 'textarea', 'rows' => 5, 'instructions' => 'الوصف التفصيلي للمنتج.'),
            array('key' => 'field_eml_features',         'label' => 'Features (one per line)', 'name' => 'product_features',     'type' => 'textarea', 'rows' => 6, 'instructions' => 'كل سطر يظهر كنقطة بعلامة صح.'),
            array('key' => 'field_eml_origin',           'label' => 'Origin',               'name' => 'product_origin',          'type' => 'text'),
            array('key' => 'field_eml_density',          'label' => 'Density',              'name' => 'product_density',         'type' => 'text', 'instructions' => 'مثال: 2,560 kg/m³'),
            array('key' => 'field_eml_water_absorption', 'label' => 'Water Absorption',     'name' => 'product_water_absorption', 'type' => 'text', 'instructions' => 'مثال: 0.45%'),
            array('key' => 'field_eml_compressive',      'label' => 'Compressive Strength', 'name' => 'product_compressive_strength', 'type' => 'text', 'instructions' => 'مثال: 98 MPa'),
            array('key' => 'field_eml_flexural',         'label' => 'Flexural Strength',    'name' => 'product_flexural_strength', 'type' => 'text', 'instructions' => 'مثال: 12 MPa'),
            array('key' => 'field_eml_pavers',           'label' => 'Pavers Size',          'name' => 'product_pavers_size',     'type' => 'text', 'instructions' => 'مثال: 10×10 | 15×15 | 20×20 cm'),
            array('key' => 'field_eml_packing',          'label' => 'Packing',              'name' => 'product_packing',         'type' => 'text', 'instructions' => 'مثال: Wooden crates with foam separators'),
            array('key' => 'field_eml_surface_finishes', 'label' => 'Surface Finishes',     'name' => 'product_surface_finishes', 'type' => 'text', 'instructions' => 'مثال: Tumbled, Honed, Brushed, Antiqued'),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'eml-product',
                ),
            ),
        ),
        'menu_order'            => 5,
        'position'              => 'normal',
        'label_placement'       => 'top',
        'description'           => 'حقول إضافية لتصميم صفحة المنتج المفرد.',
    ));
}

/**
 * Get an ACF field value with a fallback.
 *
 * @param string $key      ACF field name.
 * @param mixed  $fallback Returned when the field is empty.
 * @return mixed
 */
function eml_pf($key, $fallback = '')
{
    $value = function_exists('get_field') ? get_field($key) : '';
    if ($value === '' || $value === null || $value === false) {
        return $fallback;
    }
    return $value;
}
