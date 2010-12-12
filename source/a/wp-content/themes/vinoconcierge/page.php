<?php get_header(); ?>

				<!-- Main Content -->
				
				<?php after_column_ninja_subpage(); ?>
				
      			<div id="main-content" class="<?php echo $column_ninja_ext_subpage; ?>">
            		<section class="container">
          				<article>
                
                <div id="colmask" class="ckl-<?php echo get_option('after_leftcol_color'); ?>">
         		    	<div id="colmid" class="cdr-color1">
               				<div id="colright" class="ctr-<?php echo get_option('after_rightcol_color'); ?>">
               				
               					<!-- col1 -->
               				
                        		<div id="col1wrap">
									<div id="col1pad">
		                            	<div id="col1">                    	
		                            		
			                                <div class="component-pad">             
												<div class="page-container">								
																	
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												
													<div class="article_row page-<?php the_ID(); ?>">
														<div class="article_column column1 cols1">
															<div class="colpad">
																
																
																<?php the_content(); ?>
																
																
																
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
		                        
		                        <!-- / col1 -->
		                        
		                        <!-- col2 -->
		                        
		                        <?php if(get_option('after_leftcol_enabled') == "true") { ?>
		                        
		                        	<?php get_sidebar('page'); ?>
		                        	
		                       	<?php } ?>
 		                        
		                        <!-- / col2 -->
		                        
		                        <!-- col3 -->
		                        
		                        <?php if(get_option('after_rightcol_enabled') == "true" && get_option('after_rightcol_all_enabled') == "true") { ?>
		                        
									<?php get_sidebar('right'); ?>
                        		
                        		<?php } ?>
                        		
                        		<!-- / col3 -->
                        		
						    </div>
                		</div>
            		</div>
                
                	</article>
                  
                  <?php edit_post_link(_r('edit page'), '', ''); ?>
                  
                </section>
        		</div>

<?php get_footer(); ?>