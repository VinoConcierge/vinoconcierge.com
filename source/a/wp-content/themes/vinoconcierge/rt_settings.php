<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'rt_settings.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

?>

	<div class="wrap">
		<div id="icon-rt" class="icon32">
			<br/>
		</div>
		<h2>RokPress Afterburner <?php _re('Settings'); ?></h2>
		<br />
    </div>
            
            <?php
            
            $after_style_selected = get_option('after_color_style');
            $after_leftcol_enabled_selected = get_option('after_leftcol_enabled');
            $after_rightcol_enabled_selected = get_option('after_rightcol_enabled');
            $after_rightcol_all_enabled_selected = get_option('after_rightcol_all_enabled');
            $rokbox_enabled_selected = get_option('rokbox_enabled');
            $rokbox_style_selected = get_option('rokbox_style');
            $after_leftcol_color_selected = get_option('after_leftcol_color');
            $after_rightcol_color_selected = get_option('after_rightcol_color');
            $after_rocketlogo_selected = get_option('after_rocketlogo');
            
            ?>
            
            <form method="post" action="options.php"> 
    		<?php settings_fields( 'afterburner-parameters' ); ?>
            <table class="form-table" style="width: 50%;">
			<tr>
      			<td style="width: 20%;"><label for="after_color_style"><?php _re('Preset style:'); ?></label></td>
      			<td><select id="after_color_style" name="after_color_style">
      			      <option value="light" <?php if ($after_style_selected == "light") : ?>selected="selected"<?php endif; ?>>Light</option>
      			      <option value="light2" <?php if ($after_style_selected == "light2") : ?>selected="selected"<?php endif; ?>>Light 2</option>
      			      <option value="light3" <?php if ($after_style_selected == "light3") : ?>selected="selected"<?php endif; ?>>Light 3</option>
      			      <option value="light4" <?php if ($after_style_selected == "light4") : ?>selected="selected"<?php endif; ?>>Light 4</option>
      			      <option value="dark" <?php if ($after_style_selected == "dark") : ?>selected="selected"<?php endif; ?>>Dark</option>
      			      <option value="dark2" <?php if ($after_style_selected == "dark2") : ?>selected="selected"<?php endif; ?>>Dark 2</option>
      			      <option value="dark3" <?php if ($after_style_selected == "dark3") : ?>selected="selected"<?php endif; ?>>Dark 3</option>
      			      <option value="dark4" <?php if ($after_style_selected == "dark4") : ?>selected="selected"<?php endif; ?>>Dark 4</option>
                   </select>
                </td>
            </tr>
            <tr>
      			<td style="width: 20%;"><label for="after_template_width"><?php _re('Site Width (pixels):'); ?></label></td>
     			<td style="width: 80%;"><input class="picker-input" id="after_template_width" type="text" size="7" maxlength="255" name="after_template_width" value="<?php echo get_option('after_template_width'); ?>" /></td>
     		</tr>
     		<tr>
      			<td style="width: 20%;"><label for="after_leftcol_width"><?php _re('Left Column Width (pixels):'); ?></label></td>
     			<td style="width: 80%;"><input class="picker-input" id="after_leftcol_width" type="text" size="7" maxlength="255" name="after_leftcol_width" value="<?php echo get_option('after_leftcol_width'); ?>" /></td>
     		</tr>
     		<tr>
      			<td style="width: 25%;"><label for="after_leftcol_enabled1"><?php _re('Enable Left column:'); ?></label></td>
      			<td><input id="after_leftcol_enabled1" type="radio" <?php if ($after_leftcol_enabled_selected == "false") : ?>checked="checked"<?php endif; ?> value="false" name="after_leftcol_enabled"/>
					<label for="after_leftcol_enabled1"><?php _re('No'); ?></label>&nbsp;&nbsp;
					<input id="after_leftcol_enabled2" type="radio" <?php if ($after_leftcol_enabled_selected == "true") : ?>checked="checked"<?php endif; ?> value="true" name="after_leftcol_enabled"/>
					<label for="after_leftcol_enabled2"><?php _re('Yes'); ?></label>
                </td>
            </tr>
            <tr>
      			<td style="width: 25%;"><label for="after_leftcol_color"><?php _re('Left Column color:'); ?></label></td>
      			<td><select id="after_leftcol_color" name="after_leftcol_color">
      			      <option value="color1" <?php if ($after_leftcol_color_selected == "color1") : ?>selected="selected"<?php endif; ?>><?php _re('Color 1'); ?></option>
      			      <option value="color2" <?php if ($after_leftcol_color_selected == "color2") : ?>selected="selected"<?php endif; ?>><?php _re('Color 2'); ?></option>
                   </select>
                </td>
            </tr>
     		<tr>
      			<td style="width: 20%;"><label for="after_rightcol_width"><?php _re('Right Column Width (pixels):'); ?></label></td>
     			<td style="width: 80%;"><input class="picker-input" id="after_rightcol_width" type="text" size="7" maxlength="255" name="after_rightcol_width" value="<?php echo get_option('after_rightcol_width'); ?>" /></td>
     		</tr>
     		<tr>
      			<td style="width: 25%;"><label for="after_rightcol_enabled1"><?php _re('Enable Right column:'); ?></label></td>
      			<td><input id="after_rightcol_enabled1" type="radio" <?php if ($after_rightcol_enabled_selected == "false") : ?>checked="checked"<?php endif; ?> value="false" name="after_rightcol_enabled"/>
					<label for="after_rightcol_enabled1"><?php _re('No'); ?></label>&nbsp;&nbsp;
					<input id="after_rightcol_enabled2" type="radio" <?php if ($after_rightcol_enabled_selected == "true") : ?>checked="checked"<?php endif; ?> value="true" name="after_rightcol_enabled"/>
					<label for="after_rightcol_enabled2"><?php _re('Yes'); ?></label>
                </td>
            </tr>
            <tr>
      			<td style="width: 25%;"><label for="after_rightcol_all_enabled1"><?php _re('Enable Right Column (subpages):'); ?></label></td>
      			<td><input id="after_rightcol_all_enabled1" type="radio" <?php if ($after_rightcol_all_enabled_selected == "false") : ?>checked="checked"<?php endif; ?> value="false" name="after_rightcol_all_enabled"/>
					<label for="after_rightcol_all_enabled1"><?php _re('No'); ?></label>&nbsp;&nbsp;
					<input id="after_rightcol_all_enabled2" type="radio" <?php if ($after_rightcol_all_enabled_selected == "true") : ?>checked="checked"<?php endif; ?> value="true" name="after_rightcol_all_enabled"/>
					<label for="after_rightcol_all_enabled2"><?php _re('Yes'); ?></label>
                </td>
            </tr>
            <tr>
      			<td style="width: 25%;"><label for="after_rightcol_color"><?php _re('Right Column color:'); ?></label></td>
      			<td><select id="after_rightcol_color" name="after_rightcol_color">
      			      <option value="color1" <?php if ($after_rightcol_color_selected == "color1") : ?>selected="selected"<?php endif; ?>><?php _re('Color 1'); ?></option>
      			      <option value="color2" <?php if ($after_rightcol_color_selected == "color2") : ?>selected="selected"<?php endif; ?>><?php _re('Color 2'); ?></option>
                   </select>
                </td>
            </tr>
            <tr>
            <td></td>
            <td><hr /></td>
            </tr>
            <tr>
      			<td style="width: 20%;"><label for="after_footer_post_count"><?php _re('Footer Post Count:'); ?></label></td>
     			<td style="width: 80%;"><input class="picker-input" id="after_footer_post_count" type="text" size="7" maxlength="255" name="after_footer_post_count" value="<?php echo get_option('after_footer_post_count'); ?>" /></td>
     		</tr>
            <tr>
      			<td style="width: 25%;"><label for="after_rocketlogo1"><?php _re('Enable RocketTheme Logo:'); ?></label></td>
      			<td><input id="after_rocketlogo1" type="radio" <?php if ($after_rocketlogo_selected == "false") : ?>checked="checked"<?php endif; ?> value="false" name="after_rocketlogo"/>
					<label for="after_rocketlogo1"><?php _re('No'); ?></label>&nbsp;&nbsp;
					<input id="after_rocketlogo2" type="radio" <?php if ($after_rocketlogo_selected == "true") : ?>checked="checked"<?php endif; ?> value="true" name="after_rocketlogo"/>
					<label for="after_rocketlogo2"><?php _re('Yes'); ?></label>
                </td>
            </tr>
            <tr>
            <td></td>
            <td><hr /></td>
            </tr>
            <tr>
      			<td style="width: 25%;"><label for="rokbox_enabled1"><?php _re('Enable RokBox:'); ?></label></td>
      			<td><input id="rokbox_enabled1" type="radio" <?php if ($rokbox_enabled_selected == "false") : ?>checked="checked"<?php endif; ?> value="false" name="rokbox_enabled"/>
					<label for="rokbox_enabled1"><?php _re('No'); ?></label>&nbsp;&nbsp;
					<input id="rokbox_enabled2" type="radio" <?php if ($rokbox_enabled_selected == "true") : ?>checked="checked"<?php endif; ?> value="true" name="rokbox_enabled"/>
					<label for="rokbox_enabled2"><?php _re('Yes'); ?></label>
                </td>
            </tr>
            <tr>
      			<td style="width: 25%;"><label for="rokbox_style"><?php _re('RokBox style:'); ?></label></td>
      			<td><select id="rokbox_style" name="rokbox_style">
      			      <option value="light" <?php if ($rokbox_style_selected == "light") : ?>selected="selected"<?php endif; ?>><?php _re('Light'); ?></option>
      			      <option value="dark" <?php if ($rokbox_style_selected == "dark") : ?>selected="selected"<?php endif; ?>><?php _re('Dark'); ?></option>
      			      <option value="mynxx" <?php if ($rokbox_style_selected == "mynxx") : ?>selected="selected"<?php endif; ?>><?php _re('Mynxx'); ?></option>
                   </select>
                </td>
            </tr>
            <tr>
            <td></td>
            <td><hr /></td>
            </tr>
     		<tr>
      			<td style="width: 20%;"><label for="after_showcase_cat"><?php _re('Showcase Category:'); ?></label></td>
     			<td style="width: 80%;"><?php wp_dropdown_categories('show_option_none=None&hide_empty=0&name=after_showcase_cat&exclude=1&orderby=name&selected='.get_option('after_showcase_cat')); ?></td>
     		</tr>
            <tr>
            <td></td>
            <td><hr /></td>
            </tr>
  			<tr>
  			<td></td>
			<td style="width: 80%;"><input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" /></td>
			</tr>
       		</table>
       		</form>
       		<br />