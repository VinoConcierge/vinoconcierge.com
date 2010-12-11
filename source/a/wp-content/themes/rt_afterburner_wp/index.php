<?php get_header(); ?>

				<?php if (get_posts('cat='.get_option('after_showcase_cat')) && get_option('after_showcase_cat') != '-1') { ?>

				<!-- Begin Showcase -->
	
				<div id="showcase" class="dp100">
					<div class="background"></div>
					<div class="foreground">
					
						<?php $showcase = new WP_Query('cat='.get_option('after_showcase_cat').'&showposts=1&orderby=rand');
    					if($showcase->have_posts()) : while($showcase->have_posts()) : $showcase->the_post(); ?>
					
		    			<div class="showcase">
		    			
							<h1><?php the_title(); ?></h1>
							
							<?php the_content(false); ?>
							
							<?php if(preg_match("/\<\!\-\-more\-\-\>/", $post->post_content)) { ?>
							
							<a href="<?php the_permalink(); ?>" class="readon2"><span><?php _re('Learn More'); ?></span></a>
							
							<?php } ?>
							
						</div>
						
						<?php endwhile; endif; ?>
						
		    		</div>
				</div>
				
				<!-- End Showcase -->
				
				<?php } ?>
				
				<!-- Begin Main Content -->
				
				<?php after_column_ninja(); ?>
				
      			<div id="main-content" class="<?php echo $column_ninja_ext; ?>">
            		<div id="colmask" class="ckl-<?php echo get_option('after_leftcol_color'); ?>">
         		    	<div id="colmid" class="cdr-color1">
               				<div id="colright" class="ctr-<?php echo get_option('after_rightcol_color'); ?>">
               				
               					<!-- Begin col1 -->
               				
                        		<div id="col1wrap">
									<div id="col1pad">
		                            	<div id="col1">
		                                    <div class="breadcrumbs-pad">
        		                                <div class="breadcrumbs"><?php _re('Home'); ?></div>
		                                    </div>
			                                <div class="component-pad">             
												<div class="blog">
												
													<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
													query_posts('paged='.$paged.'&cat=-'.get_option('after_showcase_cat')); ?>
												
													<?php while (have_posts()) : the_post(); ?>
												
													<div class="article_row article-<?php the_ID(); ?>">
														<div class="article_column column1 cols1">
															<div class="colpad">
																<h2 class="contentheading"><?php the_title(); ?></h2>
																<p class="iteminfo">
																	<span class="modifydate"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, j F Y h:i'); ?></span>
																	<span class="createdby"><?php _re('Written by'); ?> <?php the_author(); ?></span>
																	<span class="createdate"><?php the_time('l, j F Y h:i'); ?></span>
																</p>
																
																<?php the_content(false); ?>
																
																<?php if(preg_match("/\<\!\-\-more\-\-\>/", $post->post_content)) { ?>
																
																<a href="<?php the_permalink(); ?>" class="readon"><?php _re('Learn More'); ?></a>
																
																<?php } ?>
																
															</div>
														</div>
													</div>
													
													<?php endwhile;?>
													
													<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
																	
													<div class="blog_nav">
														<div class="alignleft"><?php next_posts_link('&laquo; '._r('Older Entries')); ?></div>
														<div class="alignright"><?php previous_posts_link(_r('Newer Entries').' &raquo;') ?></div>
														<div class="clr"></div>
													</div>
																		
													<?php } ?>
													
												</div>
		                                    </div>
			                            </div>
									</div>
		                        </div>
		                        
		                        <!-- End col1 -->
		                        
		                        <!-- Begin col2 -->
		                        
		                        <?php if(get_option('after_leftcol_enabled') == "true") { ?>
		                        
		                        	<?php get_sidebar('left'); ?>
		                        	
		                       	<?php } ?>
 		                        
		                        <!-- End col2 -->
		                        
		                        <!-- Begin col3 -->
		                        
		                        <?php if(get_option('after_rightcol_enabled') == "true") { ?>
		                        
									<?php get_sidebar('right'); ?>
                        		
                        		<?php } ?>
                        		
                        		<!-- End col3 -->
                        		
						    </div>
                		</div>
            		</div>
        		</div>

<?php get_footer(); ?>