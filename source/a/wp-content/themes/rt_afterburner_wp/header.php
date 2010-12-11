<?php
/**
 * @copyright	Copyright (C) 2005 - 2009 RocketTheme, LLC - All Rights Reserved.
 * @license		GNU/GPL, see LICENSE.php
**/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="generator" content="Wordpress" />
		
		<title>
			<?php 
		
			// Returns the title based on what is being viewed
			
			// Single posts
			if (is_single()) { 
				single_post_title(); echo ' | '; bloginfo('name');
			
			// The home page or, if using a static front page, the blog posts page.		
			} elseif (is_home() || is_front_page()) {
				bloginfo('name');
				if( get_bloginfo('description'))
					echo ' | ' ; bloginfo('description');
					
			// WordPress Pages
			} elseif (is_page()) {	
				single_post_title(''); echo ' | '; bloginfo('name');
				
			// Search results
			} elseif (is_search()) {
				printf(_r('Search results for %s'), '"'.get_search_query().'"'); echo ' | '; bloginfo('name');
				
			// 404 (Not Found)
			} elseif (is_404()) {
				_re('Not Found'); echo ' | '; bloginfo('name');
				
			// Otherwise:
			} else {
				wp_title(''); echo ' | '; bloginfo('name');
			}
			
			?>
		</title>
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		
		<?php
		
		$wp_ver = get_bloginfo('version');
			
		if ($wp_ver < 3.0) {
			
		?>
		
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php } ?>

		<style type="text/css">
			
		<?php
			 
			global $after_columns_both;
			after_header_math(); 
				
		?>
			
		<!--
		#wrapper { margin: 0 auto; width: <?php echo get_option('after_template_width'); ?>px;padding:0;}
		.s-c-s #colmid { left:<?php echo get_option('after_leftcol_width'); ?>px;}
		.s-c-s #colright { margin-left:-<?php echo $after_columns_both; ?>px;}
		.s-c-s #col1pad { margin-left:<?php echo $after_columns_both; ?>px;}
		.s-c-s #col2 { left:<?php echo get_option('after_rightcol_width'); ?>px;width:<?php echo get_option('after_leftcol_width'); ?>px;}
		.s-c-s #col3 { width:<?php echo get_option('after_rightcol_width'); ?>px;}
	
		.s-c-x #colright { left:<?php echo get_option('after_leftcol_width'); ?>px;}
		.s-c-x #col1wrap { right:<?php echo get_option('after_leftcol_width'); ?>px;}
		.s-c-x #col1 { margin-left:<?php echo get_option('after_leftcol_width'); ?>px;}
		.s-c-x #col2 { right:<?php echo get_option('after_leftcol_width'); ?>px;width:<?php echo get_option('after_leftcol_width'); ?>px;}
	
		.x-c-s #colright { margin-left:-<?php echo get_option('after_rightcol_width'); ?>px;}
		.x-c-s #col1 { margin-left:<?php echo get_option('after_rightcol_width'); ?>px;}
		.x-c-s #col3 { left:<?php echo get_option('after_rightcol_width'); ?>px;width:<?php echo get_option('after_rightcol_width'); ?>px;}
		-->
		</style>

		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/<?php echo get_option('after_color_style'); ?>.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/wp.css" type="text/css" />
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
		<!--[if lte IE 6]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ie_suckerfish.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie.css" type="text/css" />
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie7.css" type="text/css" />
		<![endif]-->
		<!--[if IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie8.css" type="text/css" />
		<![endif]-->
		
		<?php if (get_option('rokbox_enabled') == "true" ) { ?>
		
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mootools-release-1.11.js"></script>
		
		<script type="text/javascript">var rokboxPath = "<?php bloginfo('template_directory'); ?>/js/rokbox/";</script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/rokbox/rokbox.js"></script>
		<link href="<?php bloginfo('template_directory'); ?>/js/rokbox/themes/<?php echo get_option('rokbox_style'); ?>/rokbox-style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/rokbox/themes/<?php echo get_option('rokbox_style'); ?>/rokbox-config.js"></script>
		
		<?php } ?>
		
		<?php wp_head(); ?>
		
	</head>
	
	<body>
		<div class="background"></div>
		<div id="main">
			<div id="wrapper" class="foreground">
	    		<div id="header">
	    			
	    			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top') ) : ?>
	    		
    				<div class="module">
					    <div class="module-body">
	    				    <ul class="menu">
	    				    	<?php wp_list_bookmarks('title_li=&categorize=0&category_name=blogroll&title_before=<span>&title_after=</span>&limit=6'); ?>
	    				    </ul>
	    				</div>
					</div>
					
					<?php endif; ?>
					
		    	    <a href="<?php bloginfo('wpurl'); ?>/"><span id="logo"></span></a>
				</div>
				<div id="nav">
		    		
		    		<?php if(function_exists('wp_nav_menu')) {
					
					$my_pages = wp_nav_menu( array('menu' => 'Top Navigation', 'container' => 'ul', 'menu_class' => 'menutop', 'echo' => '0', 'fallback_cb' => 'rok_old_menu', 'link_before' => '<span>', 'link_after' => '</span>' ));
					
					$lines = explode("\n", $my_pages);

					$output = "";
					foreach($lines as $line) {
						$line = trim($line);
						if (substr($line, 0, 4) == "<li ") {
		
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
					
					if(substr($output, -7, 7) == "</div>\n") $output = substr_replace($output, '', -7);
					
					echo $output;
					
					} else {
					
					rok_old_menu();
					
					} ?>
		    		
				</div>
				<div id="message"></div>