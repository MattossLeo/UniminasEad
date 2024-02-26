<?php
function custom_rewrite_rules() {
    add_rewrite_rule('^pos-graduacao/([^/]+)/?$','index.php?custom_area=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rules');

function custom_query_vars($vars) {
    $vars[] = 'custom_area';
    return $vars;
}
add_filter('query_vars', 'custom_query_vars');

function custom_load_content() {
    if (get_query_var('custom_area')) {

        $area_name = get_query_var('custom_area');

        include(get_template_directory() . '/page-areas.php');
        exit;
    }
}
add_action('template_redirect', 'custom_load_content');
