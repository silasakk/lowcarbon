<?php


/**
 * lowcarbon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lowcarbon
 */

if ( ! function_exists( 'lowcarbon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lowcarbon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lowcarbon, use a find and replace
	 * to change 'lowcarbon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lowcarbon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lowcarbon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lowcarbon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lowcarbon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lowcarbon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lowcarbon_content_width', 640 );
}
add_action( 'after_setup_theme', 'lowcarbon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lowcarbon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lowcarbon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lowcarbon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lowcarbon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lowcarbon_scripts() {
	wp_enqueue_style( 'lowcarbon-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lowcarbon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lowcarbon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lowcarbon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function hashtag_pull_callback(){

	wp_die();
}

add_action( 'wp_ajax_hashtag_pull', 'hashtag_pull_callback' );
add_action( 'wp_ajax_nopriv_hashtag_pull', 'hashtag_pull_callback' );

function Generate_Featured_Image( $image_url, $post_id  ){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = uniqid().".jpg";
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

function wp_exist_link($title_str) {
    global $wpdb;
	 $sql = "SELECT * FROM wp_postmeta WHERE meta_value = '" . $title_str . "'";
	 $result = $wpdb->get_row($sql);
    return $result;
}
function add_fb(){
	global $wpdb;


	$sql = "SELECT * FROM fb_log order by id desc limit 1";
	$result = $wpdb->get_results($sql);
	
	$json = json_decode($result[0]->data);
	
	foreach($json as $value){
		
	
		$check = wp_exist_link($value->link);
		if(!$check){
			
					$my_post = array(
						'post_title'    => wp_strip_all_tags( mb_substr(urldecode($value->title),0,100) ),
						'post_content'    => wp_strip_all_tags( urldecode($value->title) ),
						'post_status'   => 'publish',
						'post_author'   => 1,
						'post_type'    => 'social_feed'
					);
					
		
		
					 $post_id = wp_insert_post( $my_post );
	
	
					if(isset($value->image)){
						Generate_Featured_Image($value->image,$post_id);
					}
		
					update_field("username", urldecode($value->username), $post_id);
					update_field("link_ex", $value->link,$post_id) ;
					update_field("created", date("Y-m-d H:i:s"), $post_id) ;
					update_field("social_type", "facebook", $post_id) ;
					update_field("avatar", $value->avatar , $post_id) ;
			}
		
	}
}


function get_ig($tag= "CivilWar" ,$max_id=false)
{

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

		if(!wp_exist_link($item['link'])){
			// Create post object
			$my_post = array(
				'post_title'    => wp_strip_all_tags( mb_substr($item['caption']['text'],0,100) ),
				'post_content'    => wp_strip_all_tags( $item['caption']['text'] ),
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type'    => 'social_feed'
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $my_post );
			Generate_Featured_Image($item['images']['low_resolution']['url'],$post_id);
			update_field("username", $item['user']['username'], $post_id);
			update_field("link_ex", $item['link'], $post_id) ;
			update_field("created", $item['created_time'], $post_id) ;
			update_field("social_type", "instagram", $post_id) ;
			update_field("avatar", $item['user']['profile_picture'] , $post_id) ;
		}




		/*$image_link = $item['images']['thumbnail']['url'];
        echo '<img src="'.$image_link.'" />';*/
	}

	if($decoded_results['pagination']['next_max_id'] ){
		return get_ig($decoded_results['pagination']['next_max_id']);
		//processURL($decoded_results['pagination']['next_max_id']);
	}

}
function get_tw($tag="#CivilWar",$next_results=""){
	//echo $next_results;
	$settings = array(
		'oauth_access_token' => "620590262-FRuFCHoFJFcB92YDdVCzb5N8NOiyYVts7S9pVs8H",
		'oauth_access_token_secret' => "YZGKdH2Ia3cj2CQ7x4lXRqarNj3tG2tiAcClmfDzVCzKK",
		'consumer_key' => "qzNWG8iPoPKKN4v62xbx2jpTA",
		'consumer_secret' => "lcCNvi8vcHYdrs2dVJrVttZqEaVh61GP57e6BMHSis9mcT9ERz"
	);
	require_once get_template_directory() . '/lib/TwitterAPIExchange.php';

	if($next_results){
		$getfield =$next_results;
	}else{
		$getfield = '?q='.$tag."+filter:images+exclude:retweets&count=100";
	}

	$url = 'https://api.twitter.com/1.1/search/tweets.json';

	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange($settings);
	$st = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();


	$st = json_decode($st);

	foreach ($st->statuses as $key => $value) {

		if(!wp_exist_link('https://twitter.com/statuses/'.$value->id)){
			if( !count($value->retweeted_status)):


				$my_post = array(
					'post_title'    => wp_strip_all_tags( mb_substr($value->text,0,100) ),
					'post_content'    => wp_strip_all_tags( $value->text ),
					'post_status'   => 'publish',
					'post_author'   => 1,
					'post_type'    => 'social_feed'
				);


				$post_id = wp_insert_post( $my_post );
				if(isset($value->entities->media[0]->media_url)){
					Generate_Featured_Image($value->entities->media[0]->media_url,$post_id);
				}

				update_field("username", $value->user->name, $post_id);
				update_field("link_ex", "https://twitter.com/statuses/".$value->id,$post_id) ;
				update_field("created", date("Y-m-d H:i:s",strtotime($value->created_at)), $post_id) ;
				update_field("social_type", "twitter", $post_id) ;
				update_field("avatar", $value->user->profile_image_url , $post_id) ;

			endif;
		}


	}
	if($st->search_metadata->next_results) {

		return get_tw($tag,$st->search_metadata->next_results);

	}else{

		return true;
	}
}

add_image_size( 'custom-size', 300, 300, array( 'center', 'center') );

//set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );
