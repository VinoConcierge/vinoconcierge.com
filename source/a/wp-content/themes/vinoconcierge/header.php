<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8" />
  <!-- meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />
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
  
  <!-- BEGIN CUSTOM STYLES -->
  <link href="<?php bloginfo('template_directory'); ?>/_css/stylesheets/screen.css" media="screen, projection" rel="stylesheet" />
  <?php if (get_option('rokbox_enabled') == "true" ) { ?>
  <link href="<?php bloginfo('template_directory'); ?>/js/rokbox/themes/<?php echo get_option('rokbox_style'); ?>/rokbox-style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mootools-release-1.11.js"></script>
  <script type="text/javascript">var rokboxPath = "<?php bloginfo('template_directory'); ?>/js/rokbox/";</script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/rokbox/rokbox.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/rokbox/themes/<?php echo get_option('rokbox_style'); ?>/rokbox-config.js"></script>
  <?php } ?>
  <script src="<?php bloginfo('template_directory'); ?>/_js/modernizr-1.6.min.js"></script>
  <?php wp_head(); ?>
</head>
<body>
<!--<div class="background"></div>-->
<header id="mastHead">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top') ) : ?>
	<!-- Widget -->
  
  <!-- /Widget -->
  <?php endif; ?>
	<div id="navWrapper">
  	<a id="mastLogo" href="<?php bloginfo('wpurl'); ?>/" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/_images/navMain-logo.png" width="195" height="98" alt="<?php bloginfo('description'); ?>" /></a>
    <nav id="navMain">
      <?php if(function_exists('wp_nav_menu')) {?>
  
        <!--<li id="logo"><a href="<?php /*?><?php bloginfo('wpurl'); ?><?php */?>/" rel="nofollow"><img src="_images/navMain-logo.png" alt="<?php /*?><?php bloginfo('description'); ?><?php */?>" /></a></li>-->
        <?php 
        $my_pages = wp_nav_menu( array('menu' => 'Top Navigation', 'container' => '', 'echo' => '0', 'fallback_cb' => 'rok_old_menu' ));
        
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
        ?>
        
      <?php } ?><!-- /IF wp_nav_menu -->
    </nav>
  </div>
</header>  
<div id="contentWrapper">
	<header id="siloHeader">
  	<?php 
			// SET SOME GLOBAL PARAMETER VARS
			global $wp_query;
			global $post;
			global $h1TagOpen;
			global $h1TagClose;
			global $h1Type;		// semantic (actual <h1>) or presentation (<p class='h1'>)
			global $h1Text;
			global $pageType;

			// determine the type of page it is
			if( is_home() ) {
				$pageType = 'home';	
				$h1Type = 'presentation';
			} elseif ( is_search() ) {
				$pageType = 'search';
				$h1Type = 'semantic';
			} elseif ( is_page() ) {
				if ( $post->post_parent ) {		// test to see if the page has a parent
					$pageType = 'subpage';
					$h1Type = 'presentation';		// we don't want the parent page to be the h1
					$parentID = $post->post_parent;
				} else {
					$pageType = 'page';
					$h1Type = 'semantic';
				}
			} elseif ( is_archive() ) {
				$h1Type = 'semantic';
				if( is_category() ) {
					$pageType = 'catArchive';
				} elseif ( is_tag() ) {
					$pageType = 'tagArchive';
				} elseif ( is_date() ) {
					if( is_year() ) {
						$pageType = 'yearArchive';
					} elseif ( is_month() ) {
						$pageType = 'monthArchive';
					} else {
						$pageType = 'dateArchive';
					}
				} else {
					$pageType = 'archive';
				}
			} elseif ( is_404() ) {
				$pageType = '404';
				$h1Type = 'semantic';
			} elseif ( is_attachment() ) {
				$pageType = 'attachment';
				$h1Type = 'semantic';
			}
			
			// now that we know the pageType, lets output the tags and text we want for each page by calling this function
			// set up the header HTML tag wrapping
				switch($h1Type) {
					case 'semantic': 
						$h1TagOpen = '<h1>';
						$h1TagClose = '</h1>';
						break;
					case 'presentation':
						$h1TagOpen = '<p class="h1">';
						$h1TagClose = '</p>';
						break;
				}
			
			// set up the header text
				switch($pageType) {
					case 'home': 
						$h1Text = 'Welcome to VinoConcierge.com';
						break;
					case 'search':
						$total_results = $wp_query->found_posts;
						$h1Text = 'Your search for "'.the_search_query().'" returned '.$total_results.' results';
						break;
					case 'page': 
						$h1Text = get_the_title($post);
						break;
					case 'subpage': 
						$h1Text = '<a rel="nofollow" href="'.get_permalink($parentID).'">'.get_the_title($parentID).'</a>';
						break;
					case 'catArchive': 
						$h1Text = get_the_title($post).' Category Archives';
						break;
					case 'tagArchive': 
						$h1Text = get_the_title($post).' Tag Archives';
						break;
					case 'yearArchive': 
						$h1Text = get_the_title($post).' Archives';
						break;
					case 'monthArchive': 
						$h1Text = get_the_title($post).' Archives';
						break;
					case 'dateArchive': 
						$h1Text = get_the_title($post).' Archives';
						break;
					case 'archive': 
						$h1Text = get_the_title($post).' Archives';
						break;
					case '404':
						$h1Text = 'Page Not Found (404)';
						break;
					case 'attachment':
						$h1Text = '';
						break;
					default:
						$h1Text = get_the_title($post);
				}
		?>
		<?php echo($h1TagOpen); ?><?php echo($h1Text); ?><?php echo($h1TagClose); ?>
    <nav id="siloNav">
    <?php if( is_page() ) { ?>
      <?php
				if($post->post_parent)
				$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
				else
				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				if ($children) { ?>
				<ul>
				<?php echo $children; ?>
				</ul>
				<?php } ?>
		<?php } ?>
		
		</nav>
		<div id="menuContainer" class="closed">
			<div id="siloMenu">
				<!--<ul>
					<li><a href="">2010 Foundation <span>(WSS 4)</span></a></li>
					<li><a href="">Pricing</a></li>
					<li><a href="">Dedicated Pricing</a></li>
					<li><a href="">What's New</a></li>
					<li><a href="">Sign Up Today</a></li>
				</ul>	
				<ul>
					<li><a href="">2010 Server <span>(MOSS)</span></a></li>
					<li><a href="">Pricing</a></li>
					<li><a href="">Enterprise Pricing</a></li>
					<li><a href="">What's New</a></li>
					<li><a href="">Sign Up Today</a></li>
				</ul>-->
				<form>				
					<fieldset>
						<legend class="requestInfo">Request More Information</legend>
						<textarea>Tell us how we can help.</textarea>
					</fieldset>
					<fieldset>
						<textarea>Name</textarea>
						<textarea>Email</textarea>
						<a id="menuAction" class="green button" href="#" onClick="return false;">Submit Request</a>	
					</fieldset>
				</form>
				<hr />
				<ul class="moreResources">
					<!--<li>More Resources: </li>
					<li><a class="versus" href="">Foundation vs. Server</a></li>
					<li><a class="features" href="">Browse All 2010 Features</a></li>
					<li><a class="cloud" href="">Hosted vs. On-Premise</a></li>-->
				</ul>
			</div>
			<div id="quoteMenu">
				<!--<ul>
					<li><a href="">2010 Foundation <span>(WSS 4)</a></li>
					<li><a href="">Pricing</a></li>
					<li><a href="">Dedicated Pricing</a></li>
					<li><a href="">What's New</a></li>
					<li><a href="">Sign Up Today</a></li>
				</ul>	
				<ul>
					<li><a href="">2010 Server <span>(MOSS)</a></li>
					<li><a href="">Pricing</a></li>
					<li><a href="">Enterprise Pricing</a></li>
					<li><a href="">What's New</a></li>
					<li><a href="">Sign Up Today</a></li>
				</ul>-->
				<form>				
					<fieldset>
						<legend class="requestInfo">Request More Information</legend>
						<textarea>Tell us how we can help.</textarea>
					</fieldset>
					<fieldset>
						<textarea>Name</textarea>
						<textarea>Email</textarea>
						<a id="menuAction" class="green button" href="#" onClick="return false;">Submit Request</a>	
					</fieldset>
				</form>
				<hr />
				<ul class="moreResources">
					<li>More Resources: </li>
					<li><a class="versus" href="">Foundation vs. Server</a></li>
					<li><a class="features" href="">Browse All 2010 Features</a></li>
					<li><a class="cloud" href="">Hosted vs. On-Premise</a></li>
				</ul>
			</div>
		</div>	
	</header> <!-- /#siloHeader -->

<!-- / header.php -->