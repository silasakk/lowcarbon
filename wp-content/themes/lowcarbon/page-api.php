<?php



global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
$link_array = explode('/',$current_url);


// the query
wp_reset_query();
$args = array(
    'post_type' => 'social_feed',
    'paged' => $page,
    'posts_per_page' => 20,

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
                                ?>



                                <img src="<?php echo get_field('field_570cb1fca4961')?>" class="img-avatar" alt="">

                                <?php if(get_field('field_570cb1e0a4960',get_the_ID()) == "instagram") : ?>
                                    <img class="img-social" src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt="">
                                <?php endif;?>
                                <?php if(get_field('field_570cb1e0a4960',get_the_ID()) == "twitter") : ?>
                                    <img class="img-social" src="<?php echo get_template_directory_uri()?>/assets/images/twitter.png" alt="">
                                <?php endif;?>


                                <span class="username"><?php echo get_field('field_570cb191a495d')?></span>
                            </span>




                </a>

            </div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else : ?>

<?php endif; ?>