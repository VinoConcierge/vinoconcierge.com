<?php

// Theme Features Init

add_action('after_setup_theme', 'rok_theme_setup');

function rok_theme_setup() {

	$wp_ver = get_bloginfo('version');

	if (function_exists('add_theme_support')) {
		
		if($wp_ver >= 3.0) {
	
			// Add default posts and comments RSS feed links to head
			
			add_theme_support('automatic-feed-links');
			
			// This theme uses wp_nav_menu() in one location.
			
			register_nav_menus( array(
				'top_nav' => _r('Top Navigation'),
				'footer_nav' => _r('Footer'),
			) );
			
			// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
			
			/*function rok_theme_page_menu_args($args='') {
				$args['show_home'] = true;
				return $args;
			}
			
			add_filter('wp_nav_menu_args', 'rok_theme_page_menu_args');*/
			
			function rok_theme_page_menu_link($item) {
				$item = str_replace('current_page_item', 'current_page_item active', $item);		
				return $item;
			}
			
			add_filter('nav_menu_css_class', 'rok_theme_page_menu_link');
			
			function  rok_theme_page_menu_a_class($output) {
				$output = str_replace('<a', '<a class="link"', $output);
				return $output;
			}
			
			add_filter('walker_nav_menu_start_el', 'rok_theme_page_menu_a_class');
	
		}
				
	}
	
}

// Menu backwards compatibility

function rok_old_menu() { 
	
	?>
	
	<ul class="menu">
		    		
		<li class="home<?php if ( is_front_page() ) echo ' active';?>" <?php if ( is_front_page() ) echo 'id="current"';?>><a href="<?php bloginfo('url'); ?>/"><span><?php _re('Home'); ?></span></a></li>
					
		<?php
		$my_pages = wp_list_pages('echo=0&title_li=&link_before=<span>&link_after=</span>');
		$lines = explode("\n", $my_pages);

		$output = "";
		foreach($lines as $line) {
			$line = trim($line);
			if (substr($line, 0, 4) == "<li ") {
				if (preg_match("/current_page_item/", $line)) $line = str_replace("<li ", '<li id="current" ', str_replace("current_page_item", "active", $line));

				if (substr($line, -5, 5) != "</li>") {
					preg_match("#class=(?<!\\\)\"(.*)(?<!\\\)\"#U", $line, $klass);
					if (count($klass)) {
						$klass = $klass[0];
						$new_klass = substr($klass, 0, -1);
						$line = str_replace($klass, $new_klass.' parent"', $line);
					}
				}
			}

			$output .= $line."\n";
		}

		echo $output;
		
		?>
	
	</ul>
	
	<?php
		
}

add_filter('widget_text', 'do_shortcode');

rockettheme_translation();

if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Over Main Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Main Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Under Main Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Over Page Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Page Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Under Page Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Over Right Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));

if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Right Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Under Right Menu',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Footer 1',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Footer 2',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Footer 3',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Top',
        'before_widget' => '<div class="module widget-%1$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3><div class="module-body">',
    ));
    
if ( function_exists('register_sidebars') )
    register_sidebars(1, array(
    	'name' => 'Bottom',
        'before_widget' => '<div class="widget-%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="module-title">',
        'after_title' => '</h3>',
    ));
    
add_action('import_start', 'rt_change_path');
add_action('import_end', 'rt_unlink_file');

function rt_change_path() {
	global $wp_import;
	
	$xml = file_get_contents($wp_import->file);
	$xml = preg_replace("/\@RT_SITE_URL\@/", get_bloginfo('wpurl'), $xml);

	$temp = tempnam(sys_get_temp_dir(), "rt_wp_import");
	$handle = fopen($temp, "w");
	fwrite($handle, $xml);
	$wp_import->file = $temp;
	fclose($handle);
}

function rt_unlink_file() {
	global $wp_import;
	
	unlink($wp_import->file);
}

add_filter('widget_title', 'empty_title_swap');

function empty_title_swap($title, $restult='') {
	switch($title) {
		case '':
        	$result = '&nbsp;';
            break;
       	case $title:
       		$result = $title;
       		break;
	}
	return $result;
}

function rockettheme_translation() {
	load_theme_textdomain('afterburner_lang');
}

function _r($str)
{
  return __($str, 'afterburner_lang');
}

function _re($str)
{
  _e($str, 'afterburner_lang');
}

if (!function_exists ("mysql_real_escape_string"))
{
  function mysql_real_escape_string ($str)
  {
    return mysql_escape_string ($str);
  }
}

function rockettheme_admin_menu() {
	if (!current_user_can('manage_options')) {
		return;
	}
	add_submenu_page(
		'themes.php'
		, _r('Afterburner Settings')
		, _r('Afterburner Settings')
		, 0
		, 'afterburner-settings'
		, 'afterburner_settings_showup'
	);
}
add_action('admin_menu', 'rockettheme_admin_menu');

function rokbox_short($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"size" => '',
		"album" => '',
		"text" => 'Click me!',
		"thumb" => '',
	), $atts));
	
	$your_size = "";
	if ($size != "") {
		$your_size = '['.$size.']';  
	} else {
		$your_size = "";
	}
	
	$your_album = "";
	if ($album != "") {
		$your_album = '('.$album.')';  
	} else {
		$your_album = "";
	}
	
	$your_title = "";
	if ($title != "") {
		$your_title = 'title="'.$title.'"';  
	} else {
		$your_title = "";
	}
	
	$thumb_class = "";
	if ($album != "") {
		$thumb_class = $album;  
	} else {
		$thumb_class = "rokbox-thumb";
	}
	
	$display = "";
	if ($thumb != "") {
		$display = '<img class="'.$thumb_class.'" src="'.$thumb.'" alt="'.$title.'" />';  
	} else {
		$display = $text;
	}
	
	return '<a rel="rokbox'.$your_size.''.$your_album.'" '.$your_title.' href="'.$content.'">'.$display.'</a>';
}

add_shortcode("rokbox", "rokbox_short");

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	update_option( 'posts_per_page', 3 );
}

add_option('after_color_style', 'light4', '', 'yes');
add_option('after_template_width', '962', '', 'yes');
add_option('after_leftcol_width', '210', '', 'yes');
add_option('after_leftcol_enabled', 'true', '', 'yes');
add_option('after_rightcol_width', '210', '', 'yes');
add_option('after_rightcol_enabled', 'true', '', 'yes');
add_option('after_rightcol_all_enabled', 'false', '', 'yes');
add_option('after_leftcol_color', 'color2', '', 'yes');
add_option('after_rightcol_color', 'color1', '', 'yes');
add_option('after_rocketlogo', 'true', '', 'yes');
add_option('rokbox_enabled', 'false', '', 'yes');
add_option('rokbox_style', 'light', '', 'yes');
add_option('after_footer_post_count', '5', '', 'yes');
add_option('after_showcase_cat', '3', '', 'yes');

if ( is_admin() ){
add_action( 'admin_init', 'register_afterburner_settings' );
}

function register_afterburner_settings() {
  register_setting( 'afterburner-parameters', 'after_color_style' );
  register_setting( 'afterburner-parameters', 'after_template_width' );
  register_setting( 'afterburner-parameters', 'after_leftcol_width' );
  register_setting( 'afterburner-parameters', 'after_rightcol_width' );
  register_setting( 'afterburner-parameters', 'after_leftcol_color' );
  register_setting( 'afterburner-parameters', 'after_rightcol_color' );
  register_setting( 'afterburner-parameters', 'after_leftcol_enabled' );
  register_setting( 'afterburner-parameters', 'after_rightcol_enabled' );
  register_setting( 'afterburner-parameters', 'after_rightcol_all_enabled' );
  register_setting( 'afterburner-parameters', 'after_rocketlogo' );
  register_setting( 'afterburner-parameters', 'rokbox_enabled' );
  register_setting( 'afterburner-parameters', 'rokbox_style' );
  register_setting( 'afterburner-parameters', 'after_footer_post_count' );
  register_setting( 'afterburner-parameters', 'after_showcase_cat' );
}

function after_header_math() {
	global $after_columns_both;
	$a = get_option('after_leftcol_width');
	$b = get_option('after_rightcol_width');
	$after_columns_both = $a + $b;
}

function after_column_ninja() {
	global $column_ninja_ext;
	if (get_option('after_leftcol_enabled') == 'true' && get_option('after_rightcol_enabled') == 'true') {
		$column_ninja_ext = 's-c-s';
	} elseif (get_option('after_leftcol_enabled') != 'true' && get_option('after_rightcol_enabled') == 'true') {
		$column_ninja_ext = 'x-c-s';
	} elseif (get_option('after_leftcol_enabled') == 'true' && get_option('after_rightcol_enabled') != 'true') {
		$column_ninja_ext = 's-c-x';
	} elseif (get_option('after_leftcol_enabled') != 'true' && get_option('after_rightcol_enabled') != 'true') {
		$column_ninja_ext = 'x-c-x';
	}
}

function after_column_ninja_subpage() {
	global $column_ninja_ext_subpage;
	if (get_option('after_leftcol_enabled') == 'true' && (get_option('after_rightcol_enabled') == 'true' && get_option('after_rightcol_all_enabled') == 'true')) {
		$column_ninja_ext_subpage = 's-c-s';
	} elseif (get_option('after_leftcol_enabled') != 'true' && (get_option('after_rightcol_enabled') == 'true' && get_option('after_rightcol_all_enabled') == 'true')) {
		$column_ninja_ext_subpage = 'x-c-s';
	} elseif (get_option('after_leftcol_enabled') == 'true' && (get_option('after_rightcol_enabled') != 'true' || get_option('after_rightcol_all_enabled') != 'true')) {
		$column_ninja_ext_subpage = 's-c-x';
	} elseif (get_option('after_leftcol_enabled') != 'true' && (get_option('after_rightcol_enabled') != 'true' || get_option('after_rightcol_all_enabled') != 'true')) {
		$column_ninja_ext_subpage = 'x-c-x';
	}
}

function afterburner_settings_showup() {
	include('rt_settings.php');
}

if (is_admin() && $_GET['page'] == 'afterburner-settings') {
	add_action('admin_head', 'afterburner_admin_css');
	wp_enqueue_script('rt_mootools', get_bloginfo('template_directory').'/js/mootools-release-1.11.js');
}

function afterburner_admin_css() {
?>
<style type="text/css">
#icon-rt {
	background: url(<?php echo get_bloginfo('template_directory').'/images/rt_icon.png' ?>) no-repeat 0 0;
}
</style>
<?php 
} 

function mu_signup_css() { ?>
	<style type="text/css">
	.widecolumn .entry p {font-size: 1.05em;}
	.widecolumn {line-height: 1.6em;}
	.widecolumn {padding: 10px 0 20px 0;margin: 0 auto;width: 450px; margin-bottom: 30px;}
	.widecolumn .post {margin: 0;}
	</style>
<?php 
}
 
function mu_add_signup_css () { 
	add_action('wp_head','mu_signup_css', 99);
}

add_action('signup_header','mu_add_signup_css');

?>