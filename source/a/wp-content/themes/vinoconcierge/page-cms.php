<?php
/*
Template Name: Page - CMS
*/
?>

<?php get_header(); ?>

				<?php if (get_posts('cat='.get_option('after_showcase_cat')) && get_option('after_showcase_cat') != '-1') { ?>

				
				
				<?php } ?>
				
				<!-- Main Content -->
				
				<?php after_column_ninja(); ?>
				
      			<div id="main-content" class="<?php echo $column_ninja_ext; ?>">
                <section class="container hero">			
                   <!-- Showcase -->
              
                    <div id="showcase" class="dp100">
                      <div class="background"></div>
                      <div class="foreground">
                      
                        <?php $showcase = new WP_Query('cat='.get_option('after_showcase_cat').'&showposts=1&orderby=rand');
                          if($showcase->have_posts()) : while($showcase->have_posts()) : $showcase->the_post(); ?>
                      
                        <div class="showcase">
                        
                          <?php the_content(false); ?>
                        
                          <?php if(preg_match("/\<\!\-\-more\-\-\>/", $post->post_content)) { ?>
                        
                            <a href="<?php the_permalink(); ?>" class="readon2"><span><?php _re('Learn More'); ?></span></a>
                        
                          <?php } ?>
                          
                        </div> <!-- / .showcase -->
                        
                        <?php endwhile; endif; ?>
                        
                      </div> <!-- / .foreground -->
                    </div>
                    <!-- / #showcase -->
                </section>
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
												<div class="blog page-cms">
												
													<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												
													<div class="article_row page-<?php the_ID(); ?>">
														<div class="article_column column1 cols1">
															<div class="colpad">
																<h2 class="contentheading"><?php the_title(); ?></h2>
																
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
		                        
		                        	<?php get_sidebar('left'); ?>
		                        	
		                       	<?php } ?>
 		                        
		                        <!-- / col2 -->
		                        
		                        <!-- col3 -->
		                        
		                        <?php if(get_option('after_rightcol_enabled') == "true") { ?>
		                        
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