<?php get_header() ?>
    <div class="container">
        <div class="archive-panel">


            <h1 class="text-center">
                News & Activity
            </h1>

            <div class=" iso">
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
                            <div class="card">

                                <a href="<?php echo get_the_permalink(); ?>" class="title">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail("post-thumbnail", array("class" => "img-responsive"));
                                    } else {
                                        echo "<img src='" . get_template_directory_uri() . "/assets/images/df.png' class='img-responsive' />";
                                    }
                                    ?>

                                </a>
                                <a href="<?php echo get_the_permalink(); ?>"
                                   class="title"><?php echo get_the_title(); ?></a>
                                <div class="row bot-2">
                                    <div class="col-sm-6">
                                        <span class="ddate"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="<?php echo get_the_permalink() ?>" class="btn">Read More</a>
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
<?php get_footer() ?>