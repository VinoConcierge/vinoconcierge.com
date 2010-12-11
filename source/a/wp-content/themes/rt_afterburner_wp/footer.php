        		<div id="mainmods3" class="spacer w33">
        		
        			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
        		
        			<!-- Begin Widget -->
        		
					<div class="module">
						<h3 class="module-title"><?php _re('Recent Posts'); ?></h3>
					    <div class="module-body">
					    
					    	<!-- Begin Widget Content -->
					    
	    				    <ul>
								<?php wp_get_archives('title_li=&type=postbypost&limit='.get_option('after_footer_post_count')); ?>
							</ul>       
	    				
	    					<!-- End Widget Content -->
	    					
	    				</div>
					</div>
					
					<!-- End Widget -->
					
					<?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
	
					<!-- Begin Widget -->
	
					<div class="module">
						<h3 class="module-title"><?php _re('Popular Posts'); ?></h3>
					    <div class="module-body">
					    
					    	<!-- Begin Widget Content -->
					    
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
					       						        
					        <!-- End Widget Content -->
					        
					    </div>
					</div>
					
					<!-- End Widget -->
					
					<?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
					
					<!-- Begin Widget -->
	
					<div class="module">
						<h3 class="module-title"><?php _re('Last Modified'); ?></h3>
					    <div class="module-body">
					    
					    	<!-- Begin Widget Content -->
					    
	        				<ul>
												
								<?php query_posts('showposts='.get_option('after_footer_post_count').'&orderby=modified&order=DESC') ?>
								<?php while (have_posts()) : the_post(); ?>									
				
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				
								<?php endwhile; ?>
									
							</ul>
	        				
	        				<!-- End Widget Content -->
	        				
	        			</div>
					</div>
	
					<!-- End Widget -->
					
					<?php endif; ?>
	
				</div>
				<div id="footer">
					<div class="footer-pad">
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom') ) : ?>
					
                		<ul class="menu">
                		
                			<?php wp_list_bookmarks('title_li=&categorize=0&category_name=blogroll&title_before=<span>&title_after=</span>'); ?>
                		
                		</ul>
                		
                		<?php endif; ?>
                		
            		</div>
				</div>
				
				<?php if(get_option('after_rocketlogo') == "true") { ?> 
				
					<a href="http://www.rockettheme.com"><span id="logo2"></span></a>
					
				<?php } ?>
					
				<div class="module">
				    <div class="module-body">
				        <div>
				        	<?php _re('Designed by RocketTheme'); ?>
				        </div>
						<div>
							<a href="http://www.wordpress.org">WordPress</a> <?php _re('is Free Software released under the'); ?> <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU/GPL <?php _re('License.'); ?></a>
						</div>
					</div>
				</div>
		
			</div>
		</div>
		
		<?php wp_footer(); ?>
		
	</body>
</html>