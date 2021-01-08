<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rotersand
 */

get_header();?>

<h1><?php the_title(); ?></h1>

<div class="post">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <p><?php the_content(); ?></p>
    <?php endwhile; endif; ?>
</div>

<?php
get_footer();
