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
            <div class="single-panel box">
                <h1 class="head-bg">
                    News & Activity
                </h1>
                <?php the_post();?>
                <div class="col-sm-12">

                    <h2 class="title">
                        <?php the_title() ?>
                    </h2>
                </div>

                <br><br>

                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>

                <br><br>

                <div class="col-sm-12">
                    <span class='st_sharethis_large' displayText='ShareThis'></span>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_pinterest_large' displayText='Pinterest'></span>
                    <span class='st_email_large' displayText='Email'></span>

                    <script type="text/javascript">var switchTo5x=true;</script>
                    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                    <script type="text/javascript">stLight.options({publisher: "2418b13d-cdfd-4e0d-a80e-115c787057d0", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                </div>

            </div>
        </div>

    </div>
<?php  get_footer() ?>