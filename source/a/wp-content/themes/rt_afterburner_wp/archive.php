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
		                            	
		                            		<?php if (have_posts()) : ?>
		                            	                       	
		                            		<div class="breadcrumbs-pad">
        		                                <div class="breadcrumbs">	
        		                                
                    								<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    								<?php /* If this is a category archive */ if (is_category()) { ?>
                    									<?php _re('Archive for the'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _re('Category'); ?>
                    								<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    									<?php _re('Posts Tagged'); ?> &#8216;<?php single_tag_title(); ?>&#8217;
                    								<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    									<?php _re('Archive for'); ?> <?php the_time('F jS, Y'); ?>
                    								<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    									<?php _re('Archive for'); ?> <?php the_time('F, Y'); ?>
                    								<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    									<?php _re('Archive for'); ?> <?php the_time('Y'); ?>
                    								<?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    									<?php _re('Author Archive'); ?>
                    								<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    									<?php _re('Blog Archives'); ?>
                    								<?php } ?>
        		                                
        		                                </div>
		                                    </div>
			                                <div class="component-pad">             
												<div class="archive-container">	
                														
                									<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
																	
													<div class="blog_nav">
														<div class="alignleft"><?php next_posts_link('&laquo; '._r('Older Entries')); ?></div>
														<div class="alignright"><?php previous_posts_link(_r('Newer Entries').' &raquo;') ?></div>
														<div class="clr"></div>
													</div>
																		
													<?php } ?>							
																	
													<?php while (have_posts()) : the_post(); ?>
												
													<div class="article_row archive-post-<?php the_ID(); ?>">
														<div class="article_column column1 cols1">
															<div class="colpad">
																<h2 class="contentheading"><?php the_title(); ?></h2>
																<p class="iteminfo">
																	<span class="modifydate"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, j F Y h:i'); ?></span>
																	<span class="createdby"><?php _re('Written by'); ?> <?php the_author(); ?></span>
																	<span class="createdate"><?php the_time('l, j F Y h:i'); ?></span>
																</p>
																
																<?php the_content(false); ?>
																
																<a href="<?php the_permalink(); ?>" class="readon"><?php _re('Learn More'); ?></a>
																
																<div class="article-info-surround">
																	<?php the_tags(_r('Tags: '), ', ', '&nbsp;&nbsp;|&nbsp;'); ?> <?php _re('Posted under'); ?>&nbsp;<?php the_category(', ') ?>&nbsp;&nbsp;| <?php edit_post_link(_r('Edit'), '', ' | '); ?>&nbsp;<?php comments_popup_link(_r('No Comments'), _r('1 Comment'), _r('% Comments')); ?>
																</div>
																
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
		                                    
		                                    <?php else : ?>
		                                    
		                                    <div class="breadcrumbs-pad">
        		                                <div class="breadcrumbs">
        		                                
        		                            		<?php

														if ( is_category() ) { // If this is a category archive
															printf(_r("Sorry, but there aren't any posts in the %s category yet."), single_cat_title('',false));
														} else if ( is_date() ) { // If this is a date archive
															echo(_r("Sorry, but there aren't any posts with this date."));
														} else if ( is_author() ) { // If this is a category archive
															$userdata = get_userdatabylogin(get_query_var('author_name'));
															printf(_r("Sorry, but there aren't any posts by %s yet."), $userdata->display_name);
														} else {
															echo(_r('No posts found.'));
														}
														
													?>
													
												</div>
											</div>																
											
											<div class="search_not_found">
												<?php get_search_form(); ?>
											</div>

											<?php endif; ?>
		                                    
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