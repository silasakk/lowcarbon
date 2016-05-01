<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lowcarbon
 */

get_header(); ?>

    <div class="container section">
        <div class="banner effect7">
            <?php

            $image = get_field('banner');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />

            <?php endif; ?>

        </div>
        <div class="videoWrapper">
            <?php echo get_field('embed')?>
        </div>
        <br>
        <br>
        <div class="col-sm-4 col-sm-offset-4">
            <a class="btn btn-top-left">กิจกรรมดึง #</a>
            <a class="btn btn-top-right">About Us</a>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>


    </div>


<?php get_footer(); ?>