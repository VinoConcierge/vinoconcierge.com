<?php get_header(); ?>

				<!-- Begin Main Content -->
				
				<?php after_column_ninja_subpage(); ?>
				
      			<div id="main-content" class="<?php echo $column_ninja_ext_subpage; ?>">
            		<div id="colmask" class="ckl-<?php echo get_option('after_leftcol_color'); ?>">
         		    	<div id="colmid" class="cdr-color1">
               				<div id="colright" class="ctr-<?php echo get_option('after_rightcol_color'); ?>">
               				
               					<!-- Begin col1 -->
               				
                        		<div id="col1wrap">
									<div id="col1pad">
		                            	<div id="col1">                    	
		                            		<div class="breadcrumbs-pad">
        		                                <div class="breadcrumbs">	
        		                                
                    								<a href="<?php echo get_bloginfo('url'); ?>/" title="" class="pathway"><?php _re('Home'); ?></a>
	  							
	  												<?php
                    								
                    								$parent_id  = $post->post_parent;
                    								$breadcrumbs = array();
                    								while ($parent_id) {
                    									$page = get_page($parent_id);
                    									$breadcrumbs[] = '<a href="'.get_permalink($page->ID).'" title="" class="pathway">'.get_the_title($page->ID).'</a>';
                    									$parent_id  = $page->post_parent;
                    								}
                    								$breadcrumbs = array_reverse($breadcrumbs);
                    								foreach ($breadcrumbs as $crumb) echo '<span class="sep">\</span>'.$crumb;
                    								?>
								
                    								<span class="sep">\</span><?php the_title(); ?>
        		                                
        		                                </div>
		                                    </div>
			                                <div class="component-pad">             
												<div class="page-container">								
																	
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												
													<div class="article_row page-<?php the_ID(); ?>">
														<div class="article_column column1 cols1">
															<div class="colpad">
																<h2 class="contentheading"><?php the_title(); ?></h2>
																<p class="iteminfo">
																	<span class="modifydate"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, j F Y h:i'); ?></span>
																	<span class="createdby"><?php _re('Written by'); ?> <?php the_author(); ?></span>
																	<span class="createdate"><?php the_time('l, j F Y h:i'); ?></span>
																</p>
																
																<?php the_content(); ?>
																
																<?php edit_post_link(_r('Edit this entry.'), '', ''); ?>
																
																<?php if(comments_open()) { ?>
													
																<a name="comments"></a>
																										
																<?php comments_template(); ?>
																
																<?php } ?>
																
															</div>
														</div>
													</div>
													
													<?php endwhile; else: ?>
														
														<span class="attention"><?php _re('Sorry, no pages matched your criteria.'); ?></span>
														
													<?php endif; ?>
													
												</div>
		                                    </div>
			                            </div>
									</div>
		                        </div>
		                        
		                        <!-- End col1 -->
		                        
		                        <!-- Begin col2 -->
		                        
		                        <?php if(get_option('after_leftcol_enabled') == "true") { ?>
		                        
		                        	<?php get_sidebar('page'); ?>
		                        	
		                       	<?php } ?>
 		                        
		                        <!-- End col2 -->
		                        
		                        <!-- Begin col3 -->
		                        
		                        <?php if(get_option('after_rightcol_enabled') == "true" && get_option('after_rightcol_all_enabled') == "true") { ?>
		                        
									<?php get_sidebar('right'); ?>
                        		
                        		<?php } ?>
                        		
                        		<!-- End col3 -->
                        		
						    </div>
                		</div>
            		</div>
        		</div>

<?php get_footer(); ?>