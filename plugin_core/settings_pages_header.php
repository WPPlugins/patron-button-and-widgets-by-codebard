<div class="<?php echo $this->internal['prefix'];?>settings">

	<div style="display:table;vertical-align:middle;">
		<div style="display:inline-block;vertical-align:middle;"><img src="<?php echo $this->internal['plugin_url']; ?>images/logo-small.png" /></div>

		<div style="display:inline-block;vertical-align:middle;padding-left: 20px;"><h1>Patreon Button & Plugin</h1></div>
	</div>
	
	<hr width="100%">
	
	<span style="font-size:150%"><a href="https://www.patreon.com/codebard" target="_blank" style="text-decoration:none;">Click here to support <img src="<?php echo $this->internal['plugin_url']; ?>images/codebard_very_small.png"> on Patreon</a> to back development of this plugin and receive perks and goodies!</span>
	
	<hr width="100%">
	
	<?php $this->do_admin_page_tabs($tab); ?>
	
	<form method="post" action="<?php echo $this->internal['admin_url'].'admin.php?page=settings_'.$this->internal['id']; ?>">
	
	
	