								<div id="col2" class="<?php echo get_option('after_leftcol_color'); ?>">
								
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Over Main Menu') ) : ?>
                					<?php endif; ?>
                					
                					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Menu') ) : ?>
		                        
		                        	<!-- Begin Widget -->
		                        
                        			<div class="module">
										<h3 class="module-title"><?php _re('Main Menu'); ?></h3>
			    						<div class="module-body">
			    						
			    						<!-- Begin Widget Content -->
			    						
	        								<ul class="menu">
	        								
												<li class="home<?php if ( is_front_page() ) echo ' active';?>"><a href="<?php bloginfo('home'); ?>/"><span><?php _re('Home'); ?></span></a></li>
									
												<?php
												$my_pages = wp_list_pages('echo=0&title_li=&link_before=<span>&link_after=</span>');
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
												
												$output = str_replace('current_page_item', 'active', $output);
												$output = str_replace('current_page_ancestor', 'active', $output);

												echo $output;
												
												?>

	        								</ul>
	        							
	        							<!-- End Widget Content -->	
	        							
	        							</div>
									</div>
									
									<!-- End Widget -->
									
									<!-- Begin Widget -->
									
									<div class="module">
										<h3 class="module-title"><?php _re('Site Search'); ?></h3>
			 							<div class="module-body">
								        
								        <!-- Begin Widget Content -->
								        
								        	<form name="roksearch" id="roksearch" action="<?php bloginfo('home'); ?>/" method="get">
												<div class="roksearch">
													<input id="modlgn_username" name="s" size="23" type="text" class="inputbox" value=" <?php _re('Search...'); ?>" onblur="if(this.value=='') this.value=' <?php _re('Search...'); ?>';" onfocus="if(this.value==' <?php _re('Search...'); ?>') this.value='';" />
													<input type="hidden" name="task" value="search" />
												</div>
											</form>	
								        
								        <!-- End Widget Content -->
								        
       									</div>
									</div>
									
									<!-- End Widget -->
									
									<!-- Begin Widget -->
									
									<div class="module">
										<h3 class="module-title"><?php _re('Tags'); ?></h3>
			 							<div class="module-body">
								        
								        <!-- Begin Widget Content -->
								        
								        	<?php wp_tag_cloud(); ?>
								        
								        <!-- End Widget Content -->
								        
       									</div>
									</div>
									
									<!-- End Widget -->
									
									<?php endif; ?>
									
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Under Main Menu') ) : ?>
                					<?php endif; ?>
		
		                        </div>