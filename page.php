<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rotersand
 */

get_header();?>

<h1><?php the_title(); ?></h1>

<div class="content">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <p><?php the_content(); ?></p>
    <?php endwhile; endif; ?>
</div>

<?php
get_footer();
