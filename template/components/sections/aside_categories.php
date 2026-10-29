<?php
$menu_location = 'aside_categories';
$locations     = get_nav_menu_locations();
$menu_id       = isset($locations[$menu_location]) ? (int) $locations[$menu_location] : 0;

if (!$menu_id) {
    $fallback_menu = wp_get_nav_menu_object('aside_categories');

    if (!$fallback_menu) {
        $fallback_menu = wp_get_nav_menu_object('Aside Categories');
    }

    if (!$fallback_menu) {
        $fallback_menu = wp_get_nav_menu_object('Categories');
    }

    $menu_id = $fallback_menu ? (int) $fallback_menu->term_id : 0;
}

$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id, [
    'update_post_term_cache' => false,
]) : [];

if (empty($menu_items) || is_wp_error($menu_items)) {
    return;
}

$items_by_parent = [];

foreach ($menu_items as $menu_item) {
    $parent_id = (int) $menu_item->menu_item_parent;

    if (!isset($items_by_parent[$parent_id])) {
        $items_by_parent[$parent_id] = [];
    }

    $items_by_parent[$parent_id][] = $menu_item;
}

$render_child_items = function ($parent_id) use (&$render_child_items, $items_by_parent) {
    if (empty($items_by_parent[$parent_id])) {
        return;
    }
    ?>
    <ul class="ml-4 mt-1 space-y-1">
        <?php foreach ($items_by_parent[$parent_id] as $child_item) : ?>
            <li>
                <a class="flex items-center gap-1 py-1.5 px-3 text-sm rounded transition-colors text-muted-foreground hover:text-foreground hover:bg-muted"
                   href="<?php echo esc_url($child_item->url); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none"
                         stroke="currentColor"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="lucide lucide-chevron-right w-3 h-3"
                         aria-hidden="true">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                    <span><?php echo esc_html($child_item->title); ?></span>
                </a>

                <?php $render_child_items((int) $child_item->ID); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
};
?>

<ul class="space-y-1">
    <?php foreach ($items_by_parent[0] ?? [] as $menu_item) : ?>
        <li>
            <a class="block py-2 px-3 text-sm rounded transition-colors text-muted-foreground hover:text-foreground hover:bg-muted"
               href="<?php echo esc_url($menu_item->url); ?>">
                <?php echo esc_html($menu_item->title); ?>
            </a>

            <?php $render_child_items((int) $menu_item->ID); ?>
        </li>
    <?php endforeach; ?>
</ul>
