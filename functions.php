<?php
// Add RSS links to <head> section
function blank_enqueue_scripts() {
    // Load jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'), false);
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

// Remove emoji junk.
// The next two functions are by Christine Cooper:
// http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
function blank_disable_emojicons_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function blank_disable_wp_emojicons() {
    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', 'blank_disable_emojicons_tinymce');
}
add_action('init', 'blank_disable_wp_emojicons');

function blank_widgets_init() {
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

add_action('widgets_init', 'blank_widgets_init');

add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

/* CHANGE THIS */
if (!isset($content_width)) {
    $content_width = 1280;
}
