<?php
// Add RSS links to <head> section
function blank_enqueue_scripts() {
    // Load jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'), false);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'blank_enqueue_scripts');

// Clean up the <head>
function blank_remove_head_links() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'blank_remove_head_links');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id'   => 'sidebar-widgets',
        'description'   => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
   ));
}
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

function blank_fix_wp_title($title, $sep) {
    /* Borrowed from twentyfourteen. */
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'twentyfourteen'), max($paged, $page));
    }
    
    return $title;
}

add_filter('wp_title', 'blank_fix_wp_title', 10, 2);


/* CHANGE THIS */
if (!isset($content_width)) {
    $content_width = 1280;
}
