
	<hr width="100%">
	
	<?php 
	
	if($tab!='support' AND $tab!='extras')
	{
	
	?>	
	
	<input type="submit" value="	Save	" style="float:left;margin-right: 50px;">
	<input type="hidden" name="<?php echo $this->internal['id'];?>_action" value="save_settings">
	<input type="hidden" name="<?php echo $this->internal['id'];?>_tab" value="<?php echo $tab; ?>">
	</form><form method="post" action="<?php echo $this->internal['admin_url'].'admin.php?page=settings_'.$this->internal['id']; ?>"><input type="submit" value="Reset Options" style="float:left;"><input type="hidden" name="<?php echo $this->internal['id'];?>_action" value="reset_options"><input type="hidden" name="<?php echo $this->internal['id'];?>_tab" value="<?php echo $tab; ?>"></form>
	
	<?php 
	
	}
	
	?>		
	
	</div>