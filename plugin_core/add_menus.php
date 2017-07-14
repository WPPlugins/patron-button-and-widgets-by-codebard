<?php


	add_menu_page( 'Patreon', 'Patreon', 'administrator', 'settings_'.$this->internal['id'], array(&$this,'settings_page'), $this->internal['plugin_url'].'images/admin_menu_icon.png', 86 );
				
?>