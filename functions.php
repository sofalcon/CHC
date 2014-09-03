<?php
//Menu
register_nav_menus( array(
	'main-nav' => 'Main Nav in Header',
	'social-nav' => 'Social Nav in Footer',
	'utility-nav' => 'Utility Nav in Footer',
) );
	//Header Nav Walker
	class Menu_With_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

			$pageID = get_post_meta( $item->ID, '_menu_item_object_id', true );

			$item_output = $args->before;
			$item_output .= '<div class="megamenuData-columnLeftest">'.get_field('column_leftest', $pageID).'</div>';
			$item_output .= '<div class="megamenuData-columnLeft">'.get_field('column_left', $pageID).'</div>';
			$item_output .= '<div class="megamenuData-columnRight">'.get_field('column_right', $pageID).'</div>';
			$item_output .= '<a'. $attributes .'>';
			$item_output .= '<span class="sub">' . $item->description . '</span>';
			$item_output .= '<span class="core">'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after.'</span>';

			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

//Admin Bar fix
add_action('get_header', 'my_filter_head');
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


//Get All Authors
function get_all_authors($authCount) {
	global $wpdb;
	$i = 0;
	foreach ( $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author") as $row ){

		if($authCount && $i >= $authCount){ break; }

	    $author = get_userdata( $row->post_author );
	    $authors[$row->post_author]['name'] = $author->display_name;
	    $authors[$row->post_author]['post_count'] = $row->count;
	    $authors[$row->post_author]['ID'] = $author->ID;
	    $authors[$row->post_author]['desc'] = $author->user_description;
	    $authors[$row->post_author]['posts_url'] = get_author_posts_url( $author->ID, $author->user_nicename );
	    $authors[$row->post_author]['nice_name'] = $author->first_name.' '.$author->last_name;
	    $i++;
	}
	return $authors;
}



// Theme the TinyMCE editor
add_editor_style('css/editor.css');


// Custom CSS for the login page
function wpfme_loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/login.css"/>';
}
add_action('login_head', 'wpfme_loginCSS');


// Customise the footer in admin area
function wpfme_footer_admin () {
	echo 'Theme designed and developed by <a href="http://www.meshfresh.com" target="_blank">MESH Design + Development</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}
add_filter('admin_footer_text', 'wpfme_footer_admin');


// Call Googles HTML5 Shim, but only for users on old versions of IE
function wpfme_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'wpfme_IEhtml5_shim');


// Remove the version number of WP
remove_action('wp_head', 'wp_generator');

//Remove Galleries function from Editor
add_action( 'admin_head_media_upload_gallery_form', 'mfields_remove_gallery_setting_div' );
    if( !function_exists( 'mfields_remove_gallery_setting_div' ) ) {
            function mfields_remove_gallery_setting_div() {
            print '
<style type="text/css">
#gallery-settings *{
display:none;
}
</style>';
        }
    }

//Featured image support
add_theme_support( 'post-thumbnails' );

//Sidebars
register_sidebar(array(
  'name' => __( 'Blog Sidebar' ),
  'id' => 'blog-sidebar',
  'description' => __( 'Widgets in this area will be shown on the right-hand side.' ),
  'before_title' => '<h3 class="sidebar-title">',
  'after_title' => '</h3><div class="gutter">',
  'before_widget' => '<div id="%s" class="blog-widget cf">',
  'after_widget'  => '</div></div>',
));
register_sidebar(array(
  'name' => __( 'Modal Box' ),
  'id' => 'modal-box',
  'description' => __( 'Widgets in this area will be shown in the modal box on the homepage' ),
  'before_title' => '<h3 class="sidebar-title">',
  'after_title' => '</h3><div class="gutter">',
  'before_widget' => '<div id="%s" class="modal-widget cf">',
  'after_widget'  => '</div></div>',
));

//Cycle
function cycle($first_value, $values = '*') {
  static $count = array();
  $values = func_get_args();
  $name = 'default';
  $last_item = end($values);
  if( substr($last_item, 0, 1) === ':' ) {
    $name = substr($last_item, 1);
    array_pop($values);
  }
  if( !isset($count[$name]) )
    $count[$name] = 0;
  $index = $count[$name] % count($values);
  $count[$name]++;
  return $values[$index];
}


//Menu Order
  function custom_menu_order($menu_ord) {
	    if (!$menu_ord) return true;

	    return array(
	        'index.php', 							// Dashboard
	        'edit.php', 							// Posts
	        'edit.php?post_type=page', 				// Pages
	        'separator1', 							// First separator
	        'edit-comments.php', 					// Comments
	        'upload.php', 							// Media
	        'separator2', 							// Second separator
	        'themes.php', 							// Appearance
	        'users.php', 							// Users
	        'options-general.php',					// Settings
	        'separator-last', 						// Last separator
	    );
	}
	add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
	add_filter('menu_order', 'custom_menu_order');

	function minisite_admin_menu(){
		//remove_menu_page('tools.php');							//Tools
		//remove_menu_page('plugins.php');						//Plugins
	}
	add_action('admin_menu','minisite_admin_menu');
	function remove_submenus(){
		remove_submenu_page('options-general.php','options-permalink.php');						//Plugins
		remove_submenu_page('options-general.php', 'options-media.php');						//Plugins
		//remove_menu_page('themes.php');						//Plugins
		remove_submenu_page('themes.php', 'customize.php');						//Plugins
		remove_submenu_page('themes.php', 'theme-editor.php');						//Plugins
	}
	add_action('admin_init','remove_submenus');

?>