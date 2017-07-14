<?php


?>

<div class="<?php echo $this->internal['prefix'];?>settings">

	<div style="font-size:175%;font-weight:bold;margin-top:30px;display:inline-table;width:100%;">Patreon Button & Plugin by <a href="http://codebard.com" target="_blank"><img src="<?php echo $this->internal['plugin_url']; ?>images/codebard_very_small.png"></a> is almost ready!</div>

	
	<div style="font-size:150%;font-weight:bold;margin-top:30px;margin-bottom:15px;display:inline-table;width:100%;">Just one thing - you must fill in your Patreon profile address or account name below:</div>

	<?php 
	
		if(count($this->error)>0)
		{
			foreach($this->error as $key => $value)
			{
				echo '<hr>';
				echo '<span style="color : #ff0000;">'.$this->error[$key].'</span>';
				echo '<hr>';
			
			
			
			}		
			
		}
		
	?>
	
	<form method="post" action="<?php echo $this->internal['admin_url'].'admin.php?page=settings_'.$this->internal['id']; ?>">
	
		<input type="text" style="width : 500px;font-size:150%;" name="site_account" value="<?php echo $_REQUEST['site_account']; ?>">
		<input type="submit" style="font-size:150%;" value="	Save!	">


	<input type="hidden" name="<?php echo $this->internal['id'];?>_action" value="setup_wizard">
	<input type="hidden" name="setup_stage" value="1">
	</form>

	<div style="font-size:125%;font-weight:bold;margin-top:30px;margin-bottom:15px;display:inline-table;width:100%;">If you don't know how to do that, <a href="http://codebard.com/patreon-button-and-plugin-how-to-find-your-profile-address-or-account-name" target="_blank">click here to read the guide</a> - its easy!</div>

		
	
<?php


?>