<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lowcarbon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/main.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<img src="<?php echo get_template_directory_uri()?>/assets/images/top-web.jpg" class="gp-head" alt="">
<div class="header">
    <div class="container">
        <div class="nav-menu">
            <a href="javascript:;" onclick="$('.nav-menu-list').slideToggle()" class="menu-mobile"><img src="<?php echo get_template_directory_uri()?>/assets/images/round.png" alt=""></a>
            <div class="clearfix"></div>
            <ul class="nav-menu-list">
                <li><a href="">Home</a></li>
                <li><a href="">Experience</a></li>
                <li><a href="">News & Activity</a></li>
                <li><a href="">Youtube</a></li>
                <li><a href="">Contact Us & About Us</a></li>
            </ul>





        </div>
    </div>
</div>
