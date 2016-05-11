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

        h2{
            font-family:mister;
        }
        .wpcf7-form-control{
            width: 100%;
        }
        .section-contact{
            line-height: 180%;
            padding: 50px;
            background: #fff;
            float:left;
        }
        textarea{
            height: 100px;
        }
    </style>
<div class="container">
    <div class="section-contact">

        <div class="about-con" >
            <h2>ABOUT US</h2>

            <?php
            $image = get_field('banner_con');
            ?>

            <img src="<?php echo $image['url'] ?>" class="img-responsive">
            <br>
            <p style="margin-bottom: 20px;">
                <?php the_field('about_us') ?>
            </p>

            <div class="col-sm-6">

                <h2>ADDRESS</h2>

                <?php the_field('address') ?>

            </div>
            <div class="col-sm-6">
                <h2>CONTACT</h2>
                <?php echo do_shortcode('[contact-form-7 id="711" title="Contact form 1"]') ?>
            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>