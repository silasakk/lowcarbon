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

        <div class="sc">
            <a href="https://www.facebook.com/lcd.chang.mak.kood/?fref=ts"><img src="<?php echo get_template_directory_uri()?>/assets/images/facebook.png" alt=""></a>
            <a href="https://www.instagram.com/lowcarbondestination/"><img src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt=""></a>
            <a href="https://www.youtube.com/user/LowcarbonDestinatio"><img src="<?php echo get_template_directory_uri()?>/assets/images/youtube.png" alt=""></a>
            <a href="http://lowcarbondestination.blogspot.com/"><img src="<?php echo get_template_directory_uri()?>/assets/images/blog.png" alt=""></a>

        </div>



        <div class="intro-1">

                <div class="col-sm-12">
                    <div class="box">
                    <div class="bg">

                        <h1>การท่องเที่ยวแบบ Low Carbon</h1> <img class="hidden-xs hidden-sm" src="<?php echo get_template_directory_uri()?>/assets/images/intro-1-ico.jpg" alt="">
                        <p>
                            การท่องเที่ยวแบบคาร์บอนต่ำ (Low Carbon Tourism) คือกิจกรรมท่องที่เป็นทางเลือกในการ
                            ช่วยลดการปลดปล่อยคาร์บอนให้น้อยลง เมื่อเทียบกับการท่องเที่ยวแบบปกติ ในขณะที่นักท่องเที่ยว
                            ได้รับประสบการณ์ที่มีส่วนร่วมในการลดโลกร้อน โดยยังคงไว้ซึ่งความสะดวกสบายและความสุข
                            ที่ได้รับจากการท่องเที่ยว
                        </p>
                    </div>
                    </div>
                </div>






        </div>

        <div class="intro-3">
            <div class="col-sm-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <img style="display: inline-block" src="<?php echo get_template_directory_uri()?>/assets/images/t1.png" class="img-responsive"  alt="">
                        </div>
                        <div class="col-sm-6">
                            <h1 style="color: #0c7f63;font-size: 30px;text-align: right">ผลงานที่ผ่านมา</h1>
                            <p style="color: #022840;font-size: 26px;text-align: center">
                                พบกับเรื่องราวกิจกรรมดีๆ ของปี 2557-2558
                                กับโครงการ Low Carbon Destination
                                กิจกรรมการท่องเที่ยวในแบบที่โลกจะรักคุณมากขึ้น
                            </p>
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m1.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m2.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m3.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m4.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m5.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m6.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m7.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/m8.png" class="img-responsive" alt="">
                                </div>


                            </div>
                            <div class="row">
                                <div class="clearfix"></div>
                                <a href="<?php echo site_url('homepage')?>" class="btn btn-primary pull-right" style="">
                                    Read More >>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-1">
            <?php

            $args = array(
                'post_type' => 'activity',
                'posts_per_page' => 3
            );
            // the query
            $the_query = new WP_Query( $args ); ?>

            <?php if ( $the_query->have_posts() ) : ?>

                <!-- pagination here -->

                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-4">
                        <div class="box box-thumb">
                            <div class="thumb">
                                <?php the_post_thumbnail('post-thumbnail',array('class'=>'img-responsive'))?>

                            </div>

                            <div class="detail">
                                <?php the_title();?>
                            </div>
                            <a href="<?php the_permalink()?>" class="btn btn-primary">
                                Read More >>
                            </a>

                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <!-- pagination here -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>

        <div class="intro-4">
            <div class="col-sm-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-7">
                            <p style="color: #022840;font-size: 26px;text-align: center;padding-top: 15px;">
                                Low Carbaon @ Kohmak ร่วมรักษ์โลก
                                ในวัน Earth Day
                                สิ้นสุดกิจกรรมกันแล้วกับภารกิจของเหล่า Blogger
                                รักษ์โลก ชวนเที่ยวเกาะหมากสไตล์ Low Carbon
                                อนุรักษ์สิ่งแวดล้อม
                            </p>

                        </div>
                        <div class="col-sm-5">
                            <div class="videoWrapper">
                                <?php echo get_field('embed')?>
                            </div>
                        </div>

                        <!--<div class="col-sm-12">
                            <a href="<?php /*echo site_url('youtube')*/?>" class="btn btn-primary" style="">
                                Read More >>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <br>
        <br>




    </div>


<?php get_footer(); ?>