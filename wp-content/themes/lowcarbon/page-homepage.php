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

    <div class="container section" >
        <div class="banner effect7">
            <img class="img-responsive" src="<?php echo get_template_directory_uri()?>/assets/images/banner.jpg" alt="">
        </div>
        <div class="tp">
            <div class="btn btn-top-left">TOP RANK</div>
            <div class="btn btn-top-right">TERM & CONDITION</div>
            <div class="sc-select">
                <img class="img-social" data-filter=".c-instagram"  src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt="">
                <img class="img-social" data-filter=".c-facebook"  src="<?php echo get_template_directory_uri()?>/assets/images/facebook.png" alt="">
                <img class="img-social" data-filter=".c-twitter"   src="<?php echo get_template_directory_uri()?>/assets/images/twitter.png" alt="">
            </div>

        </div>


        <div class=" iso">

            <?php
            // the query
            $args = array(
                'post_type' => 'social_feed',
                'posts_per_page' => 20
            );
            $the_query = new WP_Query( $args ); ?>

            <?php if ( $the_query->have_posts() ) : ?>

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-4 block-item c-<?php echo get_field('field_570cb1e0a4960',get_the_ID()) ?>">
                        <div class="card">


                            <a target="_blank" href="<?php echo get_field('field_570cb1aaa495e',get_the_ID())?>">


                            <span class="content">
                                <?php
                                /*
                                 * FEATURE IMAGE
                                */
                                ?>

                                <?php the_post_thumbnail('full',array('class'=>'feature_img'))?>


                                <?php
                                /*
                                 * CAPTION
                                */
                                ?>
                                <span class="caption"><?php the_title(); ?> ...</span>




                            </span>
                            <span class="avatar">

                                <?php
                                /*
                                 * SOCIAL ICON
                                */

                                $sc_img = get_field('field_570cb1fca4961');
                                $up_img = get_field('field_57149ba17c3af') ;
                                ?>



                                <img src="<?php echo ($sc_img) ? $sc_img : $up_img["url"]?>" class="img-avatar" alt="">

                                <?php if(get_field('field_570cb1e0a4960',get_the_ID()) == "instagram") : ?>
                                    <img class="img-social" src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt="">
                                <?php endif;?>
                                <?php if(get_field('field_570cb1e0a4960',get_the_ID()) == "twitter") : ?>
                                    <img class="img-social" src="<?php echo get_template_directory_uri()?>/assets/images/twitter.png" alt="">
                                <?php endif;?>
                                <?php if(get_field('field_570cb1e0a4960',get_the_ID()) == "facebook") : ?>
                                    <img class="img-social" src="<?php echo get_template_directory_uri()?>/assets/images/facebook.png" alt="">
                                <?php endif;?>


                                <span class="username"><?php echo get_field('field_570cb191a495d')?></span>
                            </span>




                            </a>

                        </div>
                    </div>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>






            <nav id="page_nav" style="display: none;">
                <a href="<?php echo site_url('api/2')?>"></a>
            </nav>



        </div>

    </div>







<?php get_footer(); ?>