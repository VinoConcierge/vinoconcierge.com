
        		<div id="mainmods3" class="spacer w33">
        		
        			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
        		
        			<!-- Widget -->
        		
              <div class="module">
                <h3 class="module-title"><?php _re('Recent Posts'); ?></h3>
                  <div class="module-body">
                  
                    <!-- Widget Content -->
                  
                      <ul>
                    <?php wp_get_archives('title_li=&type=postbypost&limit='.get_option('after_footer_post_count')); ?>
                  </ul>       
                  
                    <!-- / Widget Content -->
                    
                  </div>
              </div>
              
              <!-- / Widget -->
              
              <?php endif; ?>
					
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
      
              <!-- Widget -->
      
              <div class="module">
                <h3 class="module-title"><?php _re('Popular Posts'); ?></h3>
                  <div class="module-body">
                  
                    <!-- Widget Content -->
                  
                      <ul>
                        <?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , ".get_option('after_footer_post_count'));
                        foreach ($result as $post) {
                          setup_postdata($post);
                      $postid = $post->ID;
                      $title = $post->post_title;
                      $commentcount = $post->comment_count;
                      if ($commentcount != 0) { ?>
                        <li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"><?php echo $title ?></a></li>
                      <?php } } ?>
                  </ul>
                                        
                      <!-- / Widget Content -->
                      
                  </div>
              </div>
              
              <!-- / Widget -->
              
              <?php endif; ?>
					
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
              
              <!-- Widget -->
      
              <div class="module">
                <h3 class="module-title"><?php _re('Last Modified'); ?></h3>
                  <div class="module-body">
                  
                    <!-- Widget Content -->
                  
                      <ul>
                            
                    <?php query_posts('showposts='.get_option('after_footer_post_count').'&orderby=modified&order=DESC') ?>
                    <?php while (have_posts()) : the_post(); ?>									
            
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            
                    <?php endwhile; ?>
                      
                  </ul>
                      
                      <!-- / Widget Content -->
                      
                    </div>
              </div>
      
              <!-- / Widget -->
              
              <?php endif; ?>
	
						</div> <!-- /#mainmode3 -->

				<footer id="footer">
					<div class="footer-pad">
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom') ) : ?>
					
                		<ul class="menu">
                		
                			<?php wp_list_bookmarks('title_li=&categorize=0&category_name=blogroll&title_before=<span>&title_after=</span>'); ?>
                		
                		</ul>
                		
                		<?php endif; ?>
                		
            		</div>
				</footer>

</div> <!-- /#contentWrapper -->
    
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