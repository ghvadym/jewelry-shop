<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rotersand
 */

get_header();?>

<div class="content-item">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <p><?php the_content(); ?></p>
    <?php endwhile; endif; ?>
</div>

<?php
get_footer();
