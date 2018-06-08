<?php

if ( ! function_exists( 'mc_setup' ) ) :
    function mc_setup() {
        /**
         * Enable theme support features
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/
         */
        add_theme_support( 'title-tag' );
        // add_theme_support( 'custom-header' );
        add_theme_support( 'post-thumbnails' );
        // add_theme_support( 'custom-background' );
        // add_theme_support( 'post-formats', array(
        //  'aside', 'image', 'video', 'quote', 'link', 'gallery',
        // ) );
        /**
         * Register navigation menus
         *
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         */
        register_nav_menus( array( 'main-menu' => 'Main Menu' ) );

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

    } // end setup function
endif;
add_action( 'after_setup_theme', 'mc_setup' );
/**
 * Enqueue scripts and styles.
 */
function mc_scripts() {
    // wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i"' );
    wp_enqueue_script( 'slickjs', get_bloginfo('template_url') . '/js/slick.min.js', 'jquery', '1.6.0', true );
    wp_enqueue_script( 'ngacustom', get_bloginfo('template_url') . '/js/custom.js', 'jquery', '2.9', true );
    wp_enqueue_style( 'Anton', 'https://fonts.googleapis.com/css?family=Anton:300,400,400i,600,600i' );
    wp_enqueue_style( 'Oswald', 'https://fonts.googleapis.com/css?family=Oswald:400,700' );
    wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato:400,700,300,300i' );
    wp_enqueue_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway:100i' );
    wp_enqueue_style( 'slickcss', get_bloginfo('template_url') . '/css/slick.css', array(), false );
    wp_enqueue_style( 'mc_main', get_template_directory_uri() . '/main.css', array('bootstrap'), false );
    wp_enqueue_style( 'mchild_main', get_stylesheet_directory_uri() . '/main.css', array('bootstrap'), false );
    wp_enqueue_style( 'fontawesome', get_bloginfo('template_url') . '/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'mc_scripts' );

function ld_new_excerpt_more($more) {
    global $post;
    return '...<br/><h3><a class="more-link" href="'. get_permalink($post->ID) . '">Read More</a></h3>';
}
add_filter('excerpt_more', 'ld_new_excerpt_more');

/**
 * Register widgetized areas.
 *
 */
function mc_widget_init() {

    register_sidebar( array(
        'name'          => 'Page Sidebar',
        'id'            => 'page_sidebar_1',
        'before_widget' => '<div class="sb-widget-area">',
        'after_widget'  => '</div>'
    ) );

}
add_action( 'widgets_init', 'mc_widget_init' );


/*
* Testimonials
*
*/
// Our custom post type function
function create_cpt_testimonials() {

    register_post_type( 'testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'supports' => array( 'title', 'editor', 'page-attributes' ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'testimonials', 'with_front' => false ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_cpt_testimonials' );


/// ADD CUSTOM FIELDS FOR PAGES (HEADER MAST)
function page_add_meta_box() {
    add_meta_box( 'page_meta_box_mast_title',
        'Page Mast Title (leave blank to use page title)',
        'display_page_meta_box_mast_title',
        'page'
    );
    add_meta_box( 'page_meta_box_mast_description',
        'Page Mast Description',
        'display_page_meta_box_mast_description',
        'page'
    );
}

add_action( 'admin_init', 'page_add_meta_box' );

function display_page_meta_box_mast_title() {
    global $post;

    $mast_title =  get_post_meta( $post->ID, 'mast_title', true );
    wp_editor( $mast_title,'mast_title', array('textarea_rows'=>2) );


    echo '<input type="hidden" name="mast_flag" value="true" />';
}

function display_page_meta_box_mast_description() {
    global $post;

    $mast_description =  get_post_meta( $post->ID, 'mast_description', true );
    wp_editor( $mast_description,'mast_description', array('textarea_rows'=>5,'wpautop'=>true) );


    echo '<input type="hidden" name="mast_flag" value="true" />';
}

function update_page_meta_box( $post_id, $post ) {
    if ( $post->post_type == 'page' ) {
        if ( isset($_POST['mast_flag']) ) {

            if ( isset( $_POST['mast_title'] ) && $_POST['mast_title'] != '' ) {
                update_post_meta( $post_id, 'mast_title', $_POST['mast_title'] );
            } else {
                update_post_meta( $post_id, 'mast_title', '' );
            }

            if ( isset( $_POST['mast_description'] ) && $_POST['mast_description'] != '' ) {
                update_post_meta( $post_id, 'mast_description', $_POST['mast_description'] );
            } else {
                update_post_meta( $post_id, 'mast_description', '');
            }

        }
    }
}

add_action( 'save_post', 'update_page_meta_box', 10, 2 );


/*
* Utility Function
*
* Mainly used to get the post id of a page outside of the loop in a page template
 */
function get_the_post_id() {
  if (in_the_loop()) {
       $post_id = get_the_ID();
  } else {
       global $wp_query;
       $post_id = $wp_query->get_queried_object_id();
         }
  return $post_id;
}



function custom_excerpt_length( $length ) {
	return 34;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

include(TEMPLATEPATH.'/admin/custom_shortcodes.php');
