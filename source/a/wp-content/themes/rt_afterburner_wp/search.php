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
        		                                <div class="breadcrumbs"><?php _re('Search Results'); ?></div>
		                                    </div>
			                                <div class="component-pad">             
												<div class="blog">
												
													<?php if (have_posts()) : ?>	
                														
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
													
													<?php else : ?>

														<span class="attention"><?php _re('No posts found. Try a different search?'); ?></span>
																
														<?php get_search_form(); ?>
	
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