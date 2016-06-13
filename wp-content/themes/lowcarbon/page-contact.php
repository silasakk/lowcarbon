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

get_header();?>
    <style>


        .wpcf7-form-control{
            width: 100%;
            border:1px solid #39688b;
        }
        .section-contact{
            line-height: 180%;
            padding: 15px;
            word-wrap: break-word;
            color: #022840
        }
        textarea{
            height: 100px;
        }
        .img-responsive{
            width: 100%;
            height:auto;
        }
        .section{
            font-size: 16px;
        }
    </style>
<div class="container section">
    <div class="banner effect7">
        <?php

        $image = get_field('banner',668);
        $image2 = get_field('banner_2',668);
        $image3 = get_field('banner_3',668);

        ?>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php if($image):?>
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <?php endif; ?>

                <?php if($image2):?>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <?php endif; ?>

                <?php if($image3):?>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <?php endif; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <?php if($image):?>
                    <div class="item active">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                    </div>
                <?php endif; ?>

                <?php if($image2):?>
                    <div class="item ">
                        <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" class="img-responsive" />
                    </div>
                <?php endif; ?>

                <?php if($image3):?>
                    <div class="item ">
                        <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" class="img-responsive" />
                    </div>
                <?php endif; ?>





            </div>


        </div>



    </div>
    <div class="section-contact">


        <div class="sc">
            <a href="https://www.facebook.com/lcd.chang.mak.kood/?fref=ts"><img src="<?php echo get_template_directory_uri()?>/assets/images/facebook.png" alt=""></a>
            <a href="https://www.instagram.com/lowcarbondestination/"><img src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt=""></a>
            <a href="https://www.youtube.com/user/LowcarbonDestinatio"><img src="<?php echo get_template_directory_uri()?>/assets/images/youtube.png" alt=""></a>
            <a href="http://lowcarbondestination.blogspot.com/"><img src="<?php echo get_template_directory_uri()?>/assets/images/blog.png" alt=""></a>

        </div>

        <div class="box">
            <div class="about-con" >


                <?php
                $image = get_field('banner_con');
                ?>

                <img src="<?php echo $image['url'] ?>" class="img-responsive">
                <br>
                <div style="margin-bottom: 20px;">
                    <?php the_field('about_us') ?>
                </div>

                <div class="col-sm-6">

                    <h6>ADDRESS</h6>

                    <?php the_field('address') ?>

                </div>
                <div class="col-sm-6">
                    <h6>CONTACT</h6>
                    <?php echo do_shortcode('[contact-form-7 id="711" title="Contact form 1"]') ?>
                </div>

            </div>
        </div>

    </div>

</div>

<?php get_footer(); ?>