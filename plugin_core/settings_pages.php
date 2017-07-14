<?php


		// If setup was not done, show the wizard instead of normal settings
		if(!$this->info['setup_done'])
		{	
			// Lets account for old versions
			if($this->opt['quickstart']['site_account']=='Delete this and enter your Site or your personal (admin) Patreon account here')
			{
				return;
			}
		
		}


		$tab=$v1;

		if($_REQUEST[$this->internal['prefix'].'tab']!=='')
		{
			$tab=$_REQUEST[$this->internal['prefix'].'tab'];
		}
		
		if($tab=='' OR !$tab)
		{
			$tab='quickstart';
		
		}
		
		
		

		if($this->opt[$tab]['open_new_window']=='yes')
		{
		
			$open_new_window_checked_yes=" CHECKED";
		
		}
		else
		{
			$open_new_window_checked_no=" CHECKED";	
		}	

		if($this->opt[$tab]['force_site_button']=='yes')
		{
		
			$force_site_checked_yes=" CHECKED";
		
		}
		else
		{
			$force_site_checked_no=" CHECKED";	
		}
		if($this->opt[$tab]['show_button_under_posts']=='yes')
		{
		
			$show_button_under_posts_checked_yes=" CHECKED";
		
		}
		else
		{
			$show_button_under_posts_checked_no=" CHECKED";
				
		
		}
		if($this->opt[$tab]['show_message_over_post_button']=='yes')
		{
		
			$show_message_over_post_button_checked_yes=" CHECKED";
		
		}
		else
		{
			$show_message_over_post_button_checked_no=" CHECKED";
				
		
		}
		if($this->opt[$tab]['hide_site_widget_on_single_post_page']=='yes')
		{
		
			$hide_site_widget_on_single_post_page_checked_yes=" CHECKED";
		
		}
		else
		{
			$hide_site_widget_on_single_post_page_checked_no=" CHECKED";
				
		
		}
		if($this->opt[$tab]['button_align']=='left')
		{
		
			$post_button_align_checked_left=" CHECKED";
		
		}
		if($this->opt[$tab]['button_align']=='center')
		{
		
			$post_button_align_checked_center=" CHECKED";
		
		}
		if($this->opt[$tab]['button_align']=='right')
		{
		
			$post_button_align_checked_right=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='left')
		{
		
			$post_insert_text_align_checked_left=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='center')
		{
		
			$post_insert_text_align_checked_center=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='right')
		{
		
			$post_insert_text_align_checked_right=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='left')
		{
		
			$widget_insert_text_align_checked_left=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='center')
		{

			$widget_insert_text_align_checked_center=" CHECKED";
		
		}
		if($this->opt[$tab]['insert_text_align']=='right')
		{
		
			$widget_insert_text_align_checked_right=" CHECKED";
		
		}
		
		if($this->opt[$tab]['old_button']=='yes')
		{
		
			$use_old_patreon_button_yes=" CHECKED";
		
		}
		else
		{
			
			$use_old_patreon_button_no=" CHECKED";
			
		}
		
		
		require('settings_pages_header.php');

		if($tab=='quickstart')
		{
	
	
		?>
		

			<h3>Site's Patreon user</h3>
			If you chose not to use Patreon accounts of Authors, or an Author does not have any Patreon username saved in his/her author profile page, this Patreon username will be used for Buttons for users to support in any single post. This affects both the <b>Buttons under Posts</b>, and the <b>Author Patreon sidebar widget</b>.<br><br>
			<input type="text" style="width : 500px" name="<?php echo $this->internal['prefix'].$tab; ?>[site_account]" value="<?php echo $this->opt[$tab]['site_account']; ?>">
			
			
			
			
			<h3>Open pages in new window?</h3>
			If 'Yes', Your Patreon Profile will be opened in a new window when users click your Patreon Buttons.
			
			<br><br>
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[open_new_window]" value="yes"<?php echo $open_new_window_checked_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[open_new_window]" value="no"<?php echo $open_new_window_checked_no; ?>>
			<br><br>		
			
			
			<h3>Force Site Button instead of Author</h3>
			If 'Yes', Site's own Patreon account will be used for <b>Buttons under Posts</b> and <b>Author Patreon sidebar widget</b> instead of Authors' own accounts.
			
			<br><br>
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[force_site_button]" value="yes"<?php echo $force_site_checked_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[force_site_button]" value="no"<?php echo $force_site_checked_no; ?>>
			<br><br>
			
			<h3>Use old Patreon Button</h3>
			Recently Patreon updated their design, logo and patron button. The plugin now comes with the official default button which Patreon recommends using. But if you wish, you can keep using the old Patreon button by setting 'Yes' for below setting.
			
			<br><br>
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[old_button]" value="yes"<?php echo $use_old_patreon_button_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[old_button]" value="no"<?php echo $use_old_patreon_button_no; ?>>
			<br><br>
			<h3>Use a custom Button</h3>
			You can use a custom image for your button! Just click on below field to be taken to your WordPress media library to select your button or upload a new button and select that one. After selecting your button, save options and your new custom button will be made active.
			
			<br><br>			
			 <input class="cb_p6_file_upload" type="text" id="<?php echo $this->internal['prefix'].$tab; ?>_custom_button" size="36" name="<?php echo $this->internal['prefix'].$tab; ?>[custom_button]" value="<?php echo $this->opt[$tab]['custom_button']; ?>" /> <a href="" class="cb_p6_clear_prevfield">Clear</a>
		<br><br>
		Current custom button :
		<br>
		<?php
			if($this->opt[$tab]['custom_button']!='')
			{
				echo '<a rel="nofollow"'.$new_window.' href="'.$url.'"><img style="margin-top: '.$this->opt['sidebar_widgets']['button_margin'].';margin-bottom: '.$this->opt['sidebar_widgets']['button_margin'].';max-width:50px;width:100%;height:auto;" src="'.$this->opt[$tab]['custom_button'].'"></a>';				
				
			}
		?>
			<h3>Width for your custom button</h3>
			You can set the width for your custom button if you want to have it display larger or smaller. Height will be adjusted automatically. If you leave this empty, default width of 200px will be used - something close to official Patreon button. Experiment with this value if you think your custom button is larger/smaller than you wish. 
			<br><br>
			<input type="text" style="width : 50px" name="<?php echo $this->internal['prefix'].$tab; ?>[custom_button_width]" value="<?php echo $this->opt[$tab]['custom_button_width']; ?>">
		
		<br><br>
		<?php
	
		
		}
		
		if($tab=='post_button')
		{
	
		?>
			
			<h1>Button under Posts</h1>
			<hr>
			
			<h3>Show Button under Posts</h3>		
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[show_button_under_posts]" value="yes"<?php echo $show_button_under_posts_checked_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[show_button_under_posts]" value="no"<?php echo $show_button_under_posts_checked_no; ?>>
						
			
			<h3>Button In Post Appearance Order</h3>
			In case the Buttons under Posts are not appearing in the order you would like them, change this number to a lower or higher number to move them up or down in order of appearance. For example, if the button is appearing under your Social Share buttons at the end of your post and you want to move it higher, lower the number.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[append_to_content_order]" value="<?php echo $this->opt[$tab]['append_to_content_order']; ?>">
			
			<h3>Show a message over Buttons in Posts</h3>	
			If you set "Yes" a message will be shown above buttons inside posts. The message can be customized below.<br><br>
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[show_message_over_post_button]" value="yes"<?php echo $show_message_over_post_button_checked_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[show_message_over_post_button]" value="no"<?php echo $show_message_over_post_button_checked_no; ?>>
			
			<h3>Alignment of Message text And Button under Posts</h3>
			You can align the message over buttons left, center, or right.		
			<br><br>
			Left <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="left"<?php echo $post_insert_text_align_checked_left; ?>>
			Center <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="center"<?php echo $post_insert_text_align_checked_center; ?>>
			Right <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="right"<?php echo $post_insert_text_align_checked_right; ?>>	

			
			<h3>Top and Bottom Margin for Patreon Button and Text inside post</h3>
			This decides how much distance from top and down will entire Patreon addition to your posts will have.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_margin]" value="<?php echo $this->opt[$tab]['insert_margin']; ?>">			
			
			<h3>Message over Buttons in Posts</h3>
			If the above is set to yes, this is the message that will appear over buttons inside posts. {authorname} is a placeholder you can use in the message. It will automatically be replaced by Author's display name.<br><br>
			<input type="text" style="width : 500px;" name="<?php echo $this->internal['prefix'].$tab; ?>[message_over_post_button]" value="<?php echo $this->opt[$tab]['message_over_post_button']; ?>">
					
			<h3>Message over Buttons Font Size</h3>
			You can adjust the size of the message over buttons with the below value. px, %, pt accepted.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[message_over_post_button_font_size]" value="<?php echo $this->opt[$tab]['message_over_post_button_font_size']; ?>">
			
			<h3>Message over Button Top and Bottom Margin</h3>
			This allows you to change the margin above and under the text message over the button to change distance of text from button below.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[message_over_post_button_margin]" value="<?php echo $this->opt[$tab]['message_over_post_button_margin']; ?>">
			
			<h3>Button Top and Bottom Margin</h3>
			You can change the margin of the Button independently from the above margin, in case you need it.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[button_margin]" value="<?php echo $this->opt[$tab]['button_margin']; ?>">
		
		<?php
		}
		
		if($tab=='sidebar_widgets')
		{
	
		?>
			<h1>Sidebar Widget</h1>
			<hr>		
			<h3>Alignment of Message text And Button in Widget</h3>
			You can align the message and button to the left, center, or right.		
			<br><br>
			Left <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="left"<?php echo $widget_insert_text_align_checked_left; ?>>
			Center <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="center"<?php echo $widget_insert_text_align_checked_center; ?>>
			Right <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[insert_text_align]" value="right"<?php echo $widget_insert_text_align_checked_right; ?>>

		<h3>Widget Message Font Size</h3>
			You can adjust the size of the message over button in Widget with the below value. px, %, pt accepted.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[message_font_size]" value="<?php echo $this->opt[$tab]['message_font_size']; ?>">	
			
			
			<h3>Message over Button Top and Bottom Margin</h3>
			This allows you to change the margin above and under the text message over the button to change distance of text from button below.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[message_over_post_button_margin]" value="<?php echo $this->opt[$tab]['message_over_post_button_margin']; ?>">
			
			<h3>Button Top and Bottom Margin</h3>
			You can change the margin of the Button independently from the above margin, in case you need it.<br><br>
			<input type="text" name="<?php echo $this->internal['prefix'].$tab; ?>[button_margin]" value="<?php echo $this->opt[$tab]['button_margin']; ?>">
			
			<h3>Hide Site widget on Single Post pages</h3>
			If you turn this on, plugin will hide the Site button on Single post pages. If you also added author widget, then only author widget will be shown. This is useful to prevent two widgets unnecessarily appearing at the same time in a singular post page.<br><br>	
			Yes <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[hide_site_widget_on_single_post_page]" value="yes"<?php echo $hide_site_widget_on_single_post_page_checked_yes; ?>>
			No <input type="radio" name="<?php echo $this->internal['prefix'].$tab; ?>[hide_site_widget_on_single_post_page]" value="no"<?php echo $hide_site_widget_on_single_post_page_checked_no; ?>>				
		
		<?php
		}
		
		if($tab=='extras')
		{
	
		?>
		
			<hr width="100%">
			<div style="float:left;margin-right:20px;width : 250px;margin-top:15px;margin-bottom:15px;"><a href="http://codebard.com/rapier-wordpress-theme" target="_blank"><img src="<?php echo $this->internal['plugin_url'];?>images/rapier-name-only-logo.png" /></a></div>
			<div style="float:left;display:table-cell;vertical-align:middle;margin-top:15px;margin-bottom:15px;"><b>A very fast, HTML5, Responsive theme from CodeBard. Rapier has page load speeds as low as 1.5 seconds, which is very good for SEO and user experience.</b><br><a href="http://codebard.com/rapier-wordpress-theme" target="_blank">More info, demo and download here</a></div>	
			<br><br>
			<hr width="100%">
			<div style="float:left;margin-right:20px;width : 250px;margin-top:15px;margin-bottom:15px;"><a href="http://codebard.com/codebard-help-desk" target="_blank"><img src="<?php echo $this->internal['plugin_url'];?>images/help-desk-name-only-logo.png" /></a></div>
			<div style="float:left;display:table-cell;vertical-align:middle;margin-top:15px;margin-bottom:15px;"><b>Coming Soon: A plugin to allow you natively provide support to your users, customers, subscribers on your WordPress website, without needing any external service or website.</b><br><a href="http://codebard.com/codebard-help-desk" target="_blank">To be announced here</a></div>	
			<br><br>
		
		<?php
		}
	
		
		if($tab=='support')
		{
	
		?>
			<hr width="100%">
			<div style="float:left;margin-right:20px;width : 250px;margin-top:15px;margin-bottom:15px;"><h1>Support</h1></div>
			<div style="float:left;display:table-cell;vertical-align:middle;margin-top:15px;margin-bottom:15px;"><b>You can get support from either of below avenues:</b><br>
			<a href="https://wordpress.org/plugins/patron-button-and-widgets-by-codebard/" target="_blank">WordPress Plugin Page</a>
			<br>
			<a href="http://codebard.com/support" target="_blank">Premium Support at CodeBard</a>
			<br><br>
			</div>	
			<br><br>
			<hr width="100%">
			
			<div style="float:left;margin-right:20px;width : 250px;margin-top:15px;margin-bottom:15px;"><h1>Manual</h1></div>
			<div style="float:left;display:table-cell;vertical-align:middle;margin-top:15px;margin-bottom:15px;"><b>You can access online manual below:</b><br>
			<a href="http://codebard.com/patreon-button-and-plugin-manual" target="_blank">Patreon Button and Plugin Online Manual</a>
			<br><br>
			</div>	
			<br><br>	
			<hr width="100%">
			
			<div style="float:left;margin-right:20px;width : 250px;margin-top:15px;margin-bottom:15px;"><h1>News & Info</h1></div>
			<div style="float:left;display:table-cell;vertical-align:middle;margin-top:15px;margin-bottom:15px;"><b>IF you would like to receive news, notifications, info regarding this and other CodeBard Plugins & Themes,</b><br>
			<a href="http://codebard.us9.list-manage.com/subscribe?u=5afbc1be9f2ed76070f4b64fd&id=d24515a258">Join CodeBard News List here</a>
			<br><br>
			</div>	
			<br><br>
		
		<?php
		}
		
		
		require('settings_pages_footer.php');
	
		?>