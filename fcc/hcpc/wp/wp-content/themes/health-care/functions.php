<?php
session_start();
/* enqueue style autolife_enque_scripts(){*/
function autolife_enque_scripts(){
	wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'jquery-swipe-nav-css', get_template_directory_uri() . '/css/jquery-swipe-nav.css' );

	/*if(!is_home()){
	  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main-style.css' );
	}*/

	wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css' );

	wp_enqueue_style( 'jquery-fancybox-css', get_template_directory_uri() . '/css/jquery.fancybox.css' );

	wp_enqueue_script( 'jquery-swipe-nav-plugin-js', get_template_directory_uri() . '/js/jquery-swipe-nav-plugin.js' ,array('jquery'),false);

	wp_enqueue_script( 'jquery-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.js' ,array('jquery'),false);

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js' ,array('jquery'),false);

	wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/js/jquery-ui.js' ,array('jquery'),false);

	wp_enqueue_script( 'select-model-js', get_template_directory_uri() . '/js/select-model-ajax.js' ,array('jquery'),false);
	wp_localize_script( 'select-model-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
	
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'autolife_enque_scripts' );

/*
** Register custom sidebars
*/
register_sidebar(array(
	'name' => 'Left Sidebar',
	'id'=>'left-sidebare',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
register_sidebar(array(
	'name' => 'Right Sidebar',
	'id'=>'right-sidebar',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
register_sidebar(array(
	'name' => 'Footer 1',	
	'id'=>'footer-1',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Footer 2',
	'id'=>'footer-2',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Footer 3',
	'id'=>'footer-3',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
/*register_sidebar(array(
	'name' => 'Footer 4',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
*/
/*
** Register Menus
*/
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'theme' ),
	'top_header'=>__( 'Top Navigation', 'theme' ),
));

register_nav_menus( array(
	'footer' => __( 'Footer Navigation', 'theme' ),
));

/*
** Add thumbnail support
*/
if (function_exists( 'add_theme_support' )) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); 
}

/*
** Add custom class to menu item
*/
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first-menu-item';
    $items[count($items)]->classes[] = 'last-menu-item';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/**
* Displays navigation to next/previous pages when applicable
*/
function skt_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>">
			<div class="nav-previous"><?php next_posts_link( __( '<span>&larr;</span> Older posts', 'countdown' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span>&rarr;</span>', 'countdown' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

function skt_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$classes[] = 'ie';
		if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
		$classes[] = 'ie'.$browser_version[1];
	} else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
		$classes[] = 'osx';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
		$classes[] = 'linux';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class','skt_browser_body_class');



/* array search */
function search_array($array, $key, $value){
         // echo $key .'<br/>'.$value;
        global $cnttval, $basepath, $previous_path;
        foreach ($array as $epic_key => $epic_value) {
            if (is_array($epic_value)) {
                $previous_path = $basepath;
                $basepath = $basepath . "." . $epic_key;
                search_array($epic_value, $key, $value);
                if($cnttval != 1){
                    // $basepath = $previous_path;
                    $breaks = explode(".", $previous_path);
                    array_pop($breaks);
                    array_pop($breaks);
                    // array_pop($breaks);
                    $basepath = implode(".", $breaks);
                }
            }
            else{
                if( ($epic_key == $key) && ($epic_value == $value) ){
                    $basepath = $basepath . "." . $epic_key;
                    $cnttval = 1;
                }
                else{
                    //Let it continue
                }
            }
            if($cnttval == 1){
                return true;
            }
            else{
                //Let it continue
            }
        }
        return false;
    }

/*
** Custom Page Title
*/
function countdown_title($title){
	$cnt_title = $title;
	if ( is_home() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$cnt_title .=  get_bloginfo('name');
		$cnt_title .= ' | '; 
		$cnt_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$cnt_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$cnt_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$cnt_title .= get_bloginfo('name');
		}					
	}
	return $cnt_title;
}
add_filter( 'wp_title', 'countdown_title' );

include('includes/custom-post-type.php');

// shortcode to show latest post
function show_latest_news_fun(){
	$rtn_str='';
	$args = array(
			'post_type' => 'media_and_events',
			'posts_per_page'=>3,
			'tax_query' => array(
			    array(
			    'taxonomy' => 'media_events_cat',
			    'field' => 'id',
			    'terms' => 4
			     )
			  )
			);
	$the_queryy = new WP_Query( $args );
	if ( $the_queryy->have_posts() ) {
		$rtn_str.='<ul class="latest-news arrow-before">';
		while ( $the_queryy->have_posts() ) {
			$the_queryy->the_post();
				$rtn_str.='<li><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></li>';
					
		}
		$rtn_str.='</ul>';
	}
	return $rtn_str;
}
add_shortcode('show_latest_news','show_latest_news_fun');
/* template redirect */
function my_page_template_redirect()
{
    if( ( is_page( 'payment' ) && ! is_user_logged_in() ) ){
        wp_redirect( home_url() );
        exit();
    }

   /* if( ( is_page( 'claims' ) &&  is_user_logged_in())|| ( is_page( 'history' ) && is_user_logged_in() ) || ( is_page( 'vehicles' ) && is_user_logged_in() ) ){
    	$crnt_user_id=get_current_user_id();
		$user_status = get_user_meta($crnt_user_id,'subscribe_user_status', true);
		if($user_status != 'active') {
			wp_redirect( home_url().'/dashboard' );
        	exit();	
		}
		
    }*/
	
}
add_action( 'template_redirect', 'my_page_template_redirect' );

/* registration redirect*/
add_filter( 'registration_redirect', 'my_redirect_home' );
function my_redirect_home( $user_id ) {
	//exit($user_id);
	wp_set_current_user( $user_id );
    wp_set_auth_cookie( $user_id );
    wp_redirect( home_url( '/payment' ) );
    exit(); 
}

function show_register_form_fun(){
	$return_str='';
	$return_str.= '<form id="rgstrform" class="login-rgister-form" method="post" action="" name="rgsterform">';
		$return_str.='<div class="row">';
			$return_str.='<div class="col-sm-6 col-xs-12">
							<p class="first-name"><input id="user-first-name" type="text" class="input"  value="" placeholder="First Name" name="first_name" data-validation="required" data-validation-error-msg-required="You did not enter a first name" > </p>
						</div>';
			$return_str.='<div class="col-sm-6 col-xs-12">
							<p class="last-name"><input id="user-last-name" type="text" class="input"  value="" placeholder="Last Name" name="last_name" data-validation="required custom"  data-validation-regexp="^([a-z])" data-validation-error-msg-required="You did not enter a last name" data-validation-error-msg-regexp="You last name should be characters" > </p>
						</div>';
		$return_str.='</div>';
		
		$return_str.='<div class="row">';
			$return_str.='<div class="col-sm-6 col-xs-12"> 
	  					<p class="user-email">
							<input id="user_email" type="text" class="input"  size="20" value="" placeholder="Email Address" name="user_email" data-validation="required email" 
							data-validation-error-msg-required="You did not enter an e-mail"
							data-validation-error-msg-email="You did not enter a valid e-mail"></p>
					</div>';

		    $return_str.='<div class="col-sm-6 col-xs-12">
						<p class="user-registration-no">
							<input id="user-registration-no" type="text" class="input"  size="20" value="" placeholder="Registration Number" name="user_registration_no" data-validation="required number length" data-validation-length="6-6"
							data-validation-error-msg-required="You did not enter a Registration number"
							data-validation-error-msg-length="your registration number should be maximum 6 digit number"></p>
					</div>';
		$return_str.='</div>';
		$return_str.='<div class="row">';
			$return_str.='<div class="col-sm-6 col-xs-12">
							<p class="login-password">
							<input id="user_pass" type="password" class="input"  placeholder="Password" size="20" value="" name="user_pwd" data-validation="required length" data-validation-length="8-10" data-validation-error-msg-required="You did not enter a password" data-validation-error-msg-length="password should be minimum 8 characters" </p>
						</div>';

		    $return_str.='<div class="col-sm-6 col-xs-12">
		    				<p class="select-profession">
		    			        <select data-validation="required" name="user_profession" id="searchProfession" data-validation-error-msg-required="You did not select a profession"> 
								<option value="">Choose a profession</option>'; 
								$terms = get_terms( array('taxonomy' => 'profession_cat',
		 								'hide_empty' => false) );
								//print_r($terms);
		                        foreach($terms as $term){
					               $return_str.='<option value="'.$term->name.'">'.$term->name.'</option>';
								}				
					
							$return_str.='<option value="AS">Arts therapist</option></select></p></div>';
		$return_str.='</div>';
		$return_str.='<div class="row">';
			$return_str.='<div class="col-sm-12 col-xs-12"><p class="login-submit align-left">
							<input id="wp-submit" class="button-primary" type="submit" value="Register" name="wp-rgstr-submit">
						</p></div>';
		$return_str.='</div>';
	$return_str.='</form>';
	return $return_str;
}
add_shortcode('show-register-form','show_register_form_fun');


function theme_add_user_profasn_column( $columns ) {
  $columns['user_profession'] = __( 'Profession', 'HealthCare' );
  return $columns;
} // end theme_add_user_zip_code_column
add_filter( 'manage_users_columns', 'theme_add_user_profasn_column' );

 //theme_show_user_profession_data($user_profession, 'user_profession', $new_user_id );	 
function theme_show_user_profession_data( $user_profession, $column_name, $user_id ) {
	if( 'user_profession' == $column_name ) {
	    return get_user_meta( $user_id, 'user_profession', true );
	} // end if

} // end theme_show_user_zip_code_data
add_action( 'manage_users_custom_column', 'theme_show_user_profession_data', 10, 3 ); 

/* registration form submit code */
if(isset($_POST['wp-rgstr-submit']) ) {

		$user_first_name=sanitize_text_field($_POST['first_name']);
		$user_last_name=sanitize_text_field($_POST['last_name']);
		$user_name=sanitize_user($_POST['user_registration_no']);
		$user_email=sanitize_email($_POST['user_email']);
		
		$user_pwd= esc_attr($_POST['user_pwd']);
		$user_profession = esc_attr($_POST['user_profession']);				

		$user_id = username_exists(  $user_name );
		if ( !$user_id && email_exists($user_email) == false ) {
			$userdata = array(
			    'user_login' =>  $user_name,
			    'user_email'   => $user_email,
			    'user_pass'  => $user_pwd ,
			    'first_name'=>$user_first_name,
			    'last_name'=>$user_last_name,			    
			    'show_admin_bar_front'=>false
			);			
		    
		    $new_user_id = wp_insert_user($userdata);
		    if(isset($new_user_id)){
		    	update_user_meta( $new_user_id , 'user_profession', $user_profession );	
		    	//wp_redirect(home_url().'/payment');
		    }	
		   
		} 
		else{
			$_SESSION['registration-error-msg'] = 'This Registration Number Already Exist. Please Select another registration  number';
	 	}

}

// shortcode to login form

function login_form_function(){
	$return_str = '';
	$return_str = '<div id="login-form" class="login-rgister-form">';
	$args = array('echo' => false);
	$return_str.=''. wp_login_form($args).'';
	$return_str.= '<p class="align-right"><a class="reset-password" href="javascript:void(0)">Reset password</a></p></div>';
	return $return_str;
}
add_shortcode('login-form','login_form_function');


/* after login redirect to dashboard page */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if($user->roles == 'admin'){
		$dashbord_url = home_url();
		return $redirect_to;
	}else{
		if ( isset( $user->roles) && is_array( $user->roles ) ) {
			
			if ( in_array( 'editor', $user->roles ) ) {
				// redirect them to the default place
				$dashbord_url = home_url();
				return $dashbord_url;
			} else {
				$dashbord_url = home_url().'/payment';
		 		return $dashbord_url;
		   }
		} else {
			return $redirect_to;
		}
	}
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

function wti_loginout_menu_link( $items, $args ) {
   if ($args->theme_location == 'top_header') {
   		
      if (is_user_logged_in()) {
         $items .= '<li class="right"><a href="'. wp_logout_url(home_url()) .'">'. __("Log Out") .'</a></li>';
       } else {
         $items .= '<li class="right"><a href="'.get_site_url() .'/my-account">'. __("My Account") .'</a></li>';
      }
   }
   return $items;
}

/* search form filter */

// if(isset($_POST['reg_srearch_button'])){
// 	$search_profession = $_POST['search_profession'];
// 	$search_registration = $_POST['search_registration'];
// 	$search_option = $_POST['search_option'];
// 	global $wpdb;
// 	$sql = "SELECT u.ID, u.user_login, u.user_nicename, u.user_email
// 			FROM $wpdb->users u
// 			INNER JOIN $wpdb->usermeta m ON m.user_id = u.ID
// 			WHERE (m.meta_key = 'user_profession'
// 			AND m.meta_value LIKE '%$search_profession%') AND (m.meta_key = 'last_name'
// 			AND m.meta_value LIKE '%$search_registration%')
// 			ORDER BY u.user_registered";
// 			echo $sql;
// }