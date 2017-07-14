<?php


	$current_options=get_option($this->internal['prefix'].'options');
	$current_info=get_option($this->internal['prefix'].'info');
		
	if(!$current_options OR $_REQUEST[$this->internal['prefix'].'action']=="reset_options")
	{
		// Options not found. Reinstall them:
		delete_option($this->internal['prefix'].'options');
		update_option($this->internal['prefix'].'options' ,$this->opt);
			
		delete_option($this->internal['prefix'].'info');
		update_option($this->internal['prefix'].'info' ,$this->info);
	}
	
	

$this->opt = array_replace_recursive(

	$this->opt,

	get_option($this->internal['prefix'].'options')
);
	
$this->info = array_replace_recursive(

	$this->info,

	get_option($this->internal['prefix'].'info')
);
	
		
		
	
?>