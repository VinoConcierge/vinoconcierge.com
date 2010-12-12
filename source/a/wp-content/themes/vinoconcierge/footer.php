
        		<div id="mainmods3" class="spacer w33">
        		
        			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
        		
        			<!-- Widget -->
        		
              
              <!-- / Widget -->
              
              <?php endif; ?>
					
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
      
              <!-- Widget -->
      
         
              <!-- / Widget -->
              
              <?php endif; ?>
					
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
              
              <!-- Widget -->
      
      
              <!-- / Widget -->
              
              <?php endif; ?>
	
						</div> <!-- /#mainmode3 -->

</div> <!-- /#contentWrapper -->
<div id="footerWrapper">
	<footer id="footer">
    <div class="footer-pad">
    
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom') ) : ?>
    
        <ul class="menu">
        
          <?php wp_list_bookmarks('title_li=&categorize=0&category_name=footer&title_before=<span>&title_after=</span>'); ?>
        
        </ul>
        
        <?php endif; ?>
        
    </div>
    <p>&copy;<?php echo(date("Y")); ?> Vino Concierge, LLC</p>
    <nav id="navFooter">
    <?php if(function_exists('wp_nav_menu')) {?>

      <!--<li id="logo"><a href="<?php /*?><?php bloginfo('wpurl'); ?><?php */?>/" rel="nofollow"><img src="_images/navMain-logo.png" alt="<?php /*?><?php bloginfo('description'); ?><?php */?>" /></a></li>-->
      <?php 
      $my_pages = wp_nav_menu( array('menu' => 'Footer', 'container' => '', 'echo' => '0', 'fallback_cb' => 'rok_old_menu' ));
      
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
    
  </footer>
</div>    
		<?php wp_footer(); ?>
		
    <script src="<?php bloginfo('template_directory'); ?>/_includes/_js/jquery-1.4.3.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/_includes/_js/ui-stuff.js"></script>
  
    <!--[if lt IE 9]>
    	<link href="<?php bloginfo('template_directory'); ?>/_includes/_css/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    	<script src="<?php bloginfo('template_directory'); ?>/_includes/_js/selectivizr-1.0.min.js"></script>
    <![endif]-->
    
    <!--[if lte IE 6]>
      <link rel="stylesheet" type="text/css" media="screen, projection" href="http://universal-ie6-css.googlecode.com/files/ie6.0.3.css" />
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie.css" type="text/css" />
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ie_suckerfish.js"></script>
    <![endif]-->
    
		<!--[if IE 7]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie7.css" type="text/css" />
		<![endif]-->
		<!--[if IE 8]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.ie8.css" type="text/css" />
		<![endif]-->
    
	</body>
</html>