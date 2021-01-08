<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <header id="header" class="main-header">
        <nav id="header-nav" class="main-nav"><?php
            wp_nav_menu(
                array(
                    'main_header' => 'menu-1',
                )
            );
            ?>
        </nav>
    </header>
