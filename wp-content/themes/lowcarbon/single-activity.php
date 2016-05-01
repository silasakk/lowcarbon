<?php get_header() ?>
    <div class="container">
        <div class="single-panel">

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
<?php  get_footer() ?>