<?php
	

		// If setup was not done, show the wizard instead of normal settings
		if(!$this->info['setup_done'])
		{	
			// Lets account for old versions
			if($this->opt['quickstart']['site_account']=='Delete this and enter your Site or your personal (admin) Patreon account here')
			{
				add_action($this->internal['prefix'].'action_after_settings_page',array(&$this,'do_setup_wizard'),99,1);
			}
		}



?>