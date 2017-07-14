<?php

	if($this->opt['post_button']['show_button_under_posts']=='yes')
	{
		add_filter( 'the_content', array(&$this, 'append_to_content'),$this->opt['post_button']['append_to_content_order']);
	}

	add_filter('wp_head', array(&$this, 'addstyles'));
				
	add_action( 'show_user_profile', array(&$this, 'add_custom_user_field') );
	add_action( 'edit_user_profile', array(&$this, 'add_custom_user_field') );

	add_action( 'personal_options_update', array(&$this, 'save_custom_user_field') );
	add_action( 'edit_user_profile_update', array(&$this, 'save_custom_user_field') );	
				
				
?>