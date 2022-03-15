<?php
/* ADA Compliant Menu */
require_once('functions-parts/aria-walker-nav-menu.php');
require_once('functions-parts/custom-post-types.php');
require_once('functions-parts/sort-admin-columns.php');

/* Theme Options with Subpages */

// DELETE any you don't need
if( function_exists('acf_add_options_page') ) {
	
	// Main Options Page
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// Blog
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog Options',
		'menu_title'	=> 'Blog Options',
		'parent_slug'	=> 'theme-general-settings'
	));
	
	// Header
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings'
	));
	
	// Footer
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings'
	));
	
}

/* Import files */
function my_files(){
	
	//Theme files
	wp_enqueue_style( 'theme-style', get_template_directory_uri() .'/css/style.css' );
	wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '1.1', true);
	
	// No animations on single-location.php
	if(!is_singular('location')){
		//Animations
		wp_enqueue_script('mdb', get_template_directory_uri() . '/js/mdb.min.js', array('jquery'), '4.14.1', true);
		wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), true);
		wp_enqueue_style( 'mdb-style', get_template_directory_uri() .'/css/mdb.lite.min.css' );
	}
	//Slick Slider
		wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
		wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/slick/slick-theme.css' );
	
    wp_enqueue_style('styles', get_stylesheet_uri(),NULL, microtime());
}
add_action('wp_enqueue_scripts','my_files');


/* Add Features - Menus, etc */
function my_features(){
	//Menus
	register_nav_menu('mainNav', 'Main Navigation');
	register_nav_menu('footerMenu1', 'Footer Menu 1');
    register_nav_menu('footerMenu2', 'Footer Menu 2');
    register_nav_menu('footerMenu3', 'Footer Menu 3');
    add_theme_support('title-tag');
	// Excerpt
	add_post_type_support( 
		array (
			'post','page','news','location'
    	), 
		'excerpt' );
	// Thumbnails
	add_theme_support(
		'post-thumbnails', 
		array (
			'post','page','news','location','attorneys','practice-areas'
    	) );
	// Custom Image Sizes
	add_image_size( 'logos', 300, 150 ); // Custom Image Size: 250 x 100 pixels
	add_image_size( 'square-600', 600, 600, array( 'center', 'center' ) ); // Custom Image Size: 300 pixels square, hard crop mode
	add_image_size( 'landscape-600', 600, 450, array( 'center', 'center' ) ); // Custom Image Size: 600 x 450 pixels, hard crop mode
	add_image_size( 'portrait-600', 600, 800, array( 'center', 'center' ) ); // Custom Image Size: 600 x 800 pixels, hard crop mode
	add_image_size( 'youtube', 560, 315, array( 'center', 'center' ) ); // Custom Image Size: 560 x 315 pixels, hard crop mode
	add_image_size( 'square-400', 400, 400, array( 'center', 'center' ) ); // Custom Image Size: 400 x 400 pixels, hard crop mode
	add_image_size( 'square-500', 500, 500, array( 'center', 'center' ) ); // Custom Image Size: 400 x 400 pixels, hard crop mode
	add_image_size( 'team', 600, 600, array( 'center', 'top' ) ); // Custom Image Size: 600 x 600 pixels, hard crop mode from top
}
add_action('after_setup_theme', 'my_features');

/* For using AJAX calls */
add_action( 'wp_ajax_my_action', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );

function my_action_callback(){
    include_once('authors_from_state.php');
}


/* Shortcodes */

//[year]
function currentYear( $atts ){ return date('Y');}
add_shortcode( 'year', 'currentYear' );


//[button]
function custom_button_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'    => '',
        'title'  => '',
        'target' => '',
		'class' => '',
        'text'   => ''
    ), $atts ) );
 
    $content = $text ? $text : $content;
	if ( empty($class) ) {
		$class = 'button';
	}
 
// Returns the button with a link
    if ( $url ) {
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => $class . ' button'
        );
        $link_attrs_str = '';
        foreach ( $link_attr as $key => $val ) {
            if ( $val ) {
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
            }
        }
        return '<a' . $link_attrs_str . ' target="' . $target . '"><span>' . do_shortcode( $content ) . '</span></a>';
    }
	
    // Return as span when no link defined
    else {
        return '<strong><span class="second-color" style="font-size: 0.9rem;">' . do_shortcode( $content ) . '</span></strong>';
    }
}
add_shortcode( 'button', 'custom_button_shortcode' );

//[author]
function author_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'img'    => '',
        'name'  => '',
        'title' => ''
    ), $atts ) );
	
	return '<div class="flex-row-center size-thumbnail" style="padding: 15px 0 20px;"><img src="' . $img . '" width="70" height="70" style="border-radius:70px;margin-right: 15px;" alt="' . $name . '" /><div><strong>' . $name . '</strong>, ' . $title . '</div></div>';
 
}
add_shortcode( 'author', 'author_shortcode' );


//[youtube]
function youtube_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'id'   => ''
    ), $atts ) );
 
    $content = $id ? $id : $content;
 
// Returns the button with a link

	return '<div class="youtube"><iframe class="video" width="800" height="400" style="border-radius: 12px;width:100%;" src="https://www.youtube.com/embed/' . do_shortcode( $content ) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';

}
add_shortcode( 'youtube', 'youtube_shortcode' );


//[accent]
function accent_text_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
// Returns the button with a link

        return '<strong><span class="second-color" style="font-size: 0.9rem;">' . do_shortcode( $content ) . '</span></strong>';

}
add_shortcode( 'accent', 'accent_text_shortcode' );


/*ACF Filters*/

/////// Product Compare -- This can be DELETED if you are not using product-compare.php ///////

// Rename checkbox options based on account name
function product_compare_type( $field ) {
    global $post;
	$id = $post->id;
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('accounts_to_compare', $id) ) {
        $a_loop = 1;
        // while has rows
        while( have_rows('accounts_to_compare', $id) ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $value = 'account' . $a_loop;
            $label = $a_loop . '. ' . get_sub_field('account_name');

            
            // append to choices
            $field['choices'][ $value ] = $label;
           $a_loop++;
        }
        
    }


    // return the field
    return $field;
    
}

	add_filter('acf/load_field/key=field_608080965e627', 'product_compare_type', 10, 2);
// END Product Compare

/* Gravity Forms */

// OPTIONAL - Make form redirects open in new tab  -- This can be DELETED
add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
    GFCommon::log_debug( __METHOD__ . '(): running.' );
 
    $forms = array( 1, 3, 4, 5, 6, 7 ); // Target forms with id 3, 6 and 7. Change this to fit your needs.
 
    if ( ! in_array( $form['id'], $forms ) ) {
        return $confirmation;
    }
 
    if ( isset( $confirmation['redirect'] ) ) {
        $url          = esc_url_raw( $confirmation['redirect'] );
		if (strpos($url, 'fidelitybanknc.com') == false) {
			GFCommon::log_debug( __METHOD__ . '(): Redirect to URL: ' . $url );
			// $confirmation = 'Thank you for your interest!';
			$confirmation .= "<script type=\"text/javascript\">window.open('$url', '_blank');</script>";
		}
    }
 
    return $confirmation;
}, 10, 4 );
// END GF Redirects

/* WP Admin Notices */
function wp_admin_notice(){
	global $pagenow;
    if ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) { 
      ?>

      <div class="updated" style="padding-top:10px;">  
		<span style="font-size: 18px; line-height: 22px;"><strong>Shortcodes:</strong></span>
		 <br>Target and class are optional. Blank will open link in new window.
        <p>
		<strong>Button</strong>: [button url="https://sample.com" text="Button text goes here" class="your-class" target="blank"] 
        </p>
        <p>
		  <strong>Small Accent Text</strong>: [accent text="Text goes here"]
		</p>
		<p>
		  <strong>Embed YouTube Video</strong>: [youtube id="xxxxxxxxxxx"]
		</p>
		<p>
		  <strong>Author Info</strong>: [author img="Image URL goes here" name="Firstname Lastname" title="Title"]  
		</p>
      </div>

     <?php }

 }
 add_action('admin_notices','wp_admin_notice');

/* WP Admin custom css - KEEP THIS */
add_action('admin_head', 'my_admin_css');

function my_admin_css() {
  echo '<style>
    button.handle-order-higher, button.handle-order-lower {
		display: none;
	}
  </style>';
}