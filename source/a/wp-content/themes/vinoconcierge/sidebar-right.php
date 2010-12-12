								<div id="col3" class="<?php echo get_option('after_rightcol_color'); ?>">
								
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Over Right Menu') ) : ?>
                					<?php endif; ?>
								
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Menu') ) : ?>
								
									<!-- Begin Widget -->
								
                        			<div class="module">
										<h3 class="module-title"><?php _re('Categories'); ?></h3>
									    <div class="module-body">
									    
									    	<!-- Begin Widget Content -->
									    
	        								<ul>
												<?php wp_list_categories('title_li='); ?>
											</ul>
											
											<!-- End Widget Content -->
											
										</div>
									</div>
									
									<!-- End Widget -->
									
									<!-- Begin Widget -->

									<div class="module">
										<h3 class="module-title"><?php _re('Archive'); ?></h3>
			    						<div class="module-body">
			    						
			    							<!-- Begin Widget Content -->
			    						
	        								<ul>
												<?php wp_get_archives('type=monthly&limit=12'); ?>
											</ul>
											
											<!-- End Widget Content -->
										
										</div>
									</div>
									
									<!-- End Widget -->
									
									<!-- Begin Widget -->

									<div class="module">
										<h3 class="module-title"><?php _re('Meta'); ?></h3>
			    						<div class="module-body">
			    						
			    							<!-- Begin Widget Content -->
			    						
			    							<ul>
	        									<li><?php wp_loginout(); ?></li>
												<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><?php _re('Valid'); ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
												<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
												<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
												<?php wp_meta(); ?>		
											</ul>
											
											<!-- End Widget Content -->
										
										</div>
									</div>
									
									<!-- End Widget -->
									
									<?php endif; ?>
									
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Under Right Menu') ) : ?>
                					<?php endif; ?>
										
                        		</div>