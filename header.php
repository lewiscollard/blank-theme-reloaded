<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" /> 
    <?php } ?>

    <title><?php wp_title( '|', true, 'right' ); echo get_bloginfo('name'); ?></title>
    
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/extended.js" type="text/javascript"></script>
    
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <div class="container">
            <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
            <p id="header-description"><?php bloginfo('description'); ?></p>
        </div>
    </header>
    <div class="container">
        