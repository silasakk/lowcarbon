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
    <link href="<?php echo get_template_directory_uri()?>/assets/images/favicon.ico" rel="icon" type="image/x-icon">
	<meta name="google-site-verification" content="HdW6efPX0BDiWPBQvcaBuj6jNR908hvVFYKa2gROt1c" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<img src="<?php echo get_template_directory_uri()?>/assets/images/top-web.jpg" class="gp-head" alt="">
<div class="header">
    <div class="container">
        <div class="then pull-right" style="color: #fff;margin-top: 15px;" >
            <a style="color: #fff" href="http://lowcarbondestination.com/activity/castaway-low-carbon-koh-mak/">EN</a> / <a style="color: #fff" href="<?php echo site_url()?>">TH</a>
        </div>
        <div class="nav-menu">
            <a href="javascript:;" onclick="$('.nav-menu-list').slideToggle()" class="menu-mobile"><img src="<?php echo get_template_directory_uri()?>/assets/images/round.png" alt=""></a>
            <div class="clearfix"></div>
            <ul class="nav-menu-list">
                <li><a href="<?php echo site_url();?>">Home</a></li>
                <li><a href="<?php echo site_url('experience') ?>">Experience</a></li>
                <li><a href="<?php echo site_url('news')?>">News</a></li>
                <li><a href="<?php echo site_url('activity')?>">Activity</a></li>
                <li><a href="<?php echo site_url('youtube') ?>">Youtube</a></li>
                <li><a href="<?php echo site_url('contact') ?>">Contact Us & About Us</a></li>
            </ul>





        </div>
    </div>
</div>
