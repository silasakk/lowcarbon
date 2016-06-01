<?php get_header() ?>
    <div class="container section">

        <div class="banner effect7">
            <?php

            $image = get_field('banner',668);

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />

            <?php endif; ?>

        </div>
        <div class="sc">
            <a href="https://www.facebook.com/lcd.chang.mak.kood/?fref=ts"><img src="<?php echo get_template_directory_uri()?>/assets/images/facebook.png" alt=""></a>
            <a href="https://www.instagram.com/lowcarbondestination/"><img src="<?php echo get_template_directory_uri()?>/assets/images/instagram.png" alt=""></a>
            <a href="https://www.youtube.com/user/LowcarbonDestinatio"><img src="<?php echo get_template_directory_uri()?>/assets/images/youtube.png" alt=""></a>
            <a href="http://lowcarbondestination.blogspot.com/"><img src="<?php echo get_template_directory_uri()?>/assets/images/blog.png" alt=""></a>

        </div>


        <div class="con-design">
            <div class="archive-panel">


                <h1 class="head-bg" style="margin-bottom: 5px;">
                    News & Activity
                </h1>

                <div class="row iso">
                    <?php

                    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    $args = array(
                        "post_type" => "activity",
                        "posts_per_page" => 3,
                        'paged' => $paged,
                    );
                    // the query
                    $the_query = new WP_Query($args); ?>

                    <?php if ($the_query->have_posts()) : ?>


                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="col-sm-4 block-item">
                                <div class="box">

                                    <a href="<?php echo get_the_permalink(); ?>"  style="height: 230px;overflow: hidden;display: block;margin-bottom: 10px;">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail("post-thumbnail", array("class" => "img-responsive"));
                                        } else {
                                            echo "<img src='" . get_template_directory_uri() . "/assets/images/df.png' class='img-responsive' />";
                                        }
                                        ?>

                                    </a>
                                    <a href="<?php echo get_the_permalink(); ?>" style="height: 64px;overflow: hidden;display: block;margin-bottom: 10px;"><?php echo get_the_title(); ?></a>
                                    <div class="row bot-2">

                                        <div class="col-sm-12 text-center">
                                            <a href="<?php echo get_the_permalink() ?>" style="float: none;" class="btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>

                </div>

                <div class="pagination">
                    <?php
                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $the_query->max_num_pages
                    ) );
                    ?>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>

    </div>
<?php get_footer() ?>