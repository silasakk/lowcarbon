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

<?php

function processURL($max_id=false)
{
    $tag = 'khomak';
    $client_id = "88b4730e0e2c4b2f8a09a6184af2e218";
    if(!$max_id){
        $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id.'&count=100';
    }else{
        $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id.'&max_id='.$max_id.'&count=100';
    }
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    $decoded_results = json_decode($result, true);



    //Now parse through the $results array to display your results...
    foreach($decoded_results['data'] as $item){
        $title = wp_strip_all_tags( mb_substr($item['caption']['text'],0,100) );

        if(wp_exist_post_by_title()){

        }
        // Create post object
        $my_post = array(
            'post_title'    => wp_strip_all_tags( mb_substr($item['caption']['text'],0,100) ),
            'post_content'    => wp_strip_all_tags( $item['caption']['text'] ),
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'    => 'social_feed'
        );

        // Insert the post into the database
        $post_id = wp_insert_post( $my_post );


        Generate_Featured_Image($item['images']['low_resolution']['url'],$post_id);

        update_field("username", $item['user']['username'], $post_id);
        update_field("link", $item['link'], $post_id) ;
        update_field("created", $item['created_time'], $post_id) ;
        update_field("social_type", "instagram", $post_id) ;
        update_field("avatar", 'https://instagram.com/'.$item['user']['username'] , $post_id) ;

        /*$image_link = $item['images']['thumbnail']['url'];
        echo '<img src="'.$image_link.'" />';*/
    }

    if($decoded_results['pagination']['next_max_id'] ){
        //processURL($decoded_results['pagination']['next_max_id']);
    }

}

processURL();

?>

<?php get_footer(); ?>