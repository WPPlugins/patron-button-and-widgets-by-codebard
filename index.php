<?php
/*
	Plugin Name: Patreon Button, Widgets and Plugin by CodeBard
	Plugin URI: https://wordpress.org/plugins/patron-button-and-widgets-by-codebard/
	Description: Patreon Patron Buttons, Widgets and Patreon Functions
	Version: 1.0.6
	Author: CodeBard
	Author URI: http://codebard.com
	Text Domain: cb_p6
	Domain Path: /lang
*/


class cb_p6 {

	public $info = array(
		'version' => '1.0.6',
	
	
	);
	public $error = array();
	
	public $internal = array(
		// Holds internal and generated vars. Never saved.
		
		'id' => 'cb_p6',
		'prefix' => 'cb_p6_',
		'plugin_name' => 'Patreon Button, Widgets and Plugin by CodeBard',
		'plugin_slug' => '',
		'plugin_path' => '',
		'site_url' => '',
		'admin_url' => '',
		'api_url' => '',
		'uncallable' => array('init','admin_init'),		
	
	);
	
	public $opt=array(
		'quickstart'=> array(
		
			'site_account' => 'Delete this and enter your Site or your personal (admin) Patreon account here',
			'redirect_url'=>'',	
			'site_support_message'=>'Support {sitename} on Patreon!',	
			'open_new_window'=>'no',
			'force_site_button'=>'no',
		),
			
		'post_button'=> array(
						
			'show_button_under_posts'=>'yes',	
			'append_to_content_order'=>'99',	
			'show_message_over_post_button'=>'yes',
			'message_over_post_button_font_size'=>'24px',	
			'insert_text_align'=>'center',	
			'insert_margin'=>'15px',
			'message_over_post_button'=>'Liked it? Take a second to support {authorname} on Patreon!',
			'message_over_post_button_margin'=>'10px',
			'button_margin'=>'10px',
		),
		'sidebar_widgets'=> array(
			'hide_site_widget_on_single_post_page'=>'no',				
			'insert_text_align'=>'center',	
			'message_font_size'=>'18px',	
			'message_over_post_button_margin'=>'10px',
			'button_margin'=>'10px',
		),
		'extras'=> array(
				
			'insert_text_align'=>'center',	
		),
		'support'=> array(
				
			'insert_text_align'=>'center',	
		),
	
	);

	public function __construct() 
	{
		$this->internal['plugin_path']=plugin_dir_path( __FILE__ );
		$this->internal['plugin_url'] = trailingslashit(plugin_dir_url(__FILE__));
		$this->internal['plugin_slug'] = basename(dirname(__FILE__));
			
		$this->internal['admin_url'] = trailingslashit(get_admin_url());
		$this->internal['site_url'] = get_site_url();		
	
		require($this->internal['plugin_path'].'plugin_core/options_load_reset.php');
	
		add_action('init', array(&$this, 'init'));
		
		if(is_admin())
		{
			add_action('init', array(&$this, 'admin_init'));
		}
		else
		{
			add_action('init', array(&$this, 'frontend_init'));
		
		}
	}
	
	public function __call($action,$vars)
	{
		// run() method Goes haywire here because you cant pass vars to add_action hence you cant pass the action name
				
		// Runner function will have to be magic call
		
		global $current_user;
		
		$v1=$vars[0];
		$v2=$vars[1];
		$v3=$vars[2];
		$v4=$vars[3];
		$v5=$vars[4];
		
		// Normalize the action name
		$action=str_replace($this->internal['prefix'],'',$action);
		
		// Return false if action is not callable from request
		
		if($_REQUEST[$this->internal['prefix'].$action]!='' AND in_array($_REQUEST[$this->internal['prefix'].$action],$this->internal['uncallable']))
		{
	
			return false;
		}
	
		
		// This is the action which runs before the actual action runs
		if(has_action($this->internal['prefix'].'action_before_'.$action))
		{			
			do_action($this->internal['prefix'].'action_before_'.$action,$v1,$v2,$v3,$v4,$v5);
		}
		
		// This filter is used to filter variables before they are sent to actions
		if(has_filter($this->internal['prefix'].'filter_before_'.$action))
		{			
			$new_vars=apply_filters($this->internal['prefix'].'filter_before_'.$action,$v1,$v2,$v3,$v4,$v5);
			$v1=$new_vars[0];
			$v2=$new_vars[1];
			$v3=$new_vars[2];
			$v4=$new_vars[3];
			$v5=$new_vars[4];
		}
		
		ob_start();			
	
		switch($action)
		{
			
			case 'save_settings':
			{
				//************************SAVE SETTINGS**********************//
		
				
				$tab=$v1[$this->internal['prefix'].'tab'];
			
		
				$this->opt[$tab]=$v1[$this->internal['prefix'].$tab];
				
				
				update_option($this->internal['prefix'].'options' ,$this->opt);
				
				//************************SAVE SETTINGS EOF*********************************//
				break;
			}
			case 'init':
			{
				//************************INIT**********************//
				
				require($this->internal['plugin_path'].'plugin_core/init.php');
				
	
				//************************INIT EOF*********************************//
				break;
			}
			case 'frontend_init':
			{
				//************************INIT**********************//
		
				require($this->internal['plugin_path'].'plugin_core/frontend_init.php');
		

				// Sanitize $_REQUEST[$this->internal['prefix'].'action'] before this!!! 
				
				if($_REQUEST[$this->internal['prefix'].'action']!='')
				{
					$this->{$_REQUEST[$this->internal['prefix'].'action']}($_REQUEST);
				}				
								
	
				//************************INIT EOF*********************************//
				break;
			}
			case 'admin_init':
			{
				//************************ADMIN INIT**********************//
								
				if(!(is_admin() AND current_user_can( 'manage_options' )))
				{
					return;
				}
				
				add_action( 'admin_menu', array(&$this, 'add_admin_menu') );
				
				add_action('admin_notices',	array(&$this, 'do_notices'));
				
				wp_enqueue_style( $this->internal['prefix'].'admin_css', $this->internal['plugin_url'] . 'css/admin.css', false, '1.0.0' );
							
				add_action( 'admin_enqueue_scripts', array(&$this,'enqueue_admin_scripts') );
				
				require($this->internal['plugin_path'].'plugin_core/admin_init.php');
				
				if($_REQUEST[$this->internal['prefix'].'action']!='')
				{
				
					$this->{$_REQUEST[$this->internal['prefix'].'action']}($_REQUEST);
				}	
									
				//************************ADMIN INIT EOF*********************************//
				break;
			}
			//********************************************************************//
			case 'add_admin_menu':
			{
				//************************ADD ADMIN MENU**********************//
				
				if(!is_admin()) return;
				
				require($this->opt['plugin_path'].'plugin_core/add_menus.php');
				
				//************************ADD ADMIN MENU EOF**********************//
				break;
			}
			case 'settings_page':
			{
				//************************SETTINGS PAGE**********************//
		
				if ( !is_admin() ) {
				 die(__('Need admin privileges for settings page',$this->internal['id'])); 
				}
				
				if(is_string($v1))
				{
					$tab=$v1;
					
				}
				
				if(is_array($v1) AND count($v1)>0)
				{
					$tab=$v1[$this->internal['prefix'].'tab'];
				}
				
				
				if($tab=='' OR !$tab)
				{
					$tab='quickstart';
				
				}
				
			
				// Load Plugin specific settings page 
				require($this->internal['plugin_path'].'plugin_core/settings_pages.php');
			
				//************************SETTINGS PAGE EOF*********************************//
				break;
			}
			case 'do_admin_page_tabs':
			{
				//************************Admin Page Tabs**********************//
				$current=$v1;
				if($current=='')
				{
					$current='quickstart';
				
				}
				$tabs = array_keys($this->opt);
				echo '<div id="icon-themes" class="icon32"><br></div>';
				echo '<h2 class="nav-tab-wrapper">';
				foreach( $tabs as $key => $value ){
					$class = ( $tabs[$key] == $current ) ? ' nav-tab-active' : '';
					$tab_name=ucwords(str_replace('_',' ',$tabs[$key]));
					echo '<a class="nav-tab'.$class.'" href="?page=settings_'.$this->internal['id'].'&'.$this->internal['prefix'].'tab='.$tabs[$key].'">'.$tab_name.'</a>';

				}
				echo '</h2>';
					
				//************************Admin Page Tabs EOF*********************************//
				break;
			}
			case 'enqueue_admin_scripts':
			{
							

				wp_enqueue_script('jquery');
				// This will enqueue the Media Uploader script
				wp_enqueue_media();							

				wp_register_script( 'cb_p6_admin_js', $this->internal['plugin_url'].'/js/admin.js');
				wp_enqueue_script( 'cb_p6_admin_js' );				
				
			}
			case 'do_notices':
			{
				//************************DO NOTICES**********************//
				if(count($this->info['notices'])>0)
				{
					foreach($this->info['notices'] as $key => $value)
					{
					
						if($this->info['notices'][$key]['notice_exposure']!='global' AND $_REQUEST['page'] != 'settings_'.$this->internal['id'].'')
						{
							continue;
						
						}
						if($this->info['notices'][$key]['notice_target']!='admin' AND is_admin())
						{
							continue;
						
						}
				   
						echo '<div class="'.$this->info['notices'][$key]['notice_class'].'">';
						echo $this->info['notices'][$key]['notice_text'];
						echo ' | <a class="cb_'.$this->internal['id'].'_admin_top_notice_close" href="'.admin_url().'admin.php?page=settings_'.$this->internal['id'].'&'.$this->internal['prefix'].'tab='.$_REQUEST['tab'].'&'.$this->internal['id'].'_action_type=admin_action&'.$this->internal['id'].'_action=dismiss_notice&notice='.$key.'">Dismiss Notice</a>';
						echo '</div>';
					}
				}
				//************************DO NOTICES EOF*********************************//
				break;
			}
			case 'dismiss_notice':
			{
				//************************DUDACTION**********************//
				$notice=$v1['notice'];
			
				unset($this->info['notices'][$notice]);
				
				update_option($this->info['prefix'].'info',$this->info);	
				
				//************************DUDACTION EOF*********************************//
				break;
			}
			case 'add_notice':
			{
				//************************DUDACTION**********************//
				$notice_id=$v1;
				$notice_class=$v2;
				$target=$v3;
				$notice_exposure=$v4;
				$text=$v5;
				
		
				$this->info['notices'][$notice_id]=array(
					
					'notice_class'=>$notice_class,
					'notice_exposure'=>$notice_exposure,
					'notice_target'=>$target,
					'notice_text'=> $text,
				);
				
				update_option($this->internal['prefix'].'info',$this->internal);
					
				//************************DUDACTION EOF*********************************//
				break;
			}
			case 'activate':
			{
				//************************activate**********************//
				
				
				
				//************************activate EOF*********************************//
				break;
			}	
			case 'deactivate':
			{
				//************************deactivate**********************//
				
				
				
				//************************deactivate EOF*********************************//
				break;
			}	
		}	
		
		// Load the core actions of the plugin
		require($this->internal['plugin_path'].'plugin_core/core_actions.php');
			
		// Run post action actions and filters

		$output=ob_get_clean();
	
		// This is the action hook which runs after the actual action completed
		if(has_action($this->internal['prefix'].'action_after_'.$action))
		{		
	
			do_action($this->internal['prefix'].'action_after_'.$action,$v1,$v2,$v3,$v4,$v5);
		}
		
		if($return)
		{
			// Filter that runs after the action has been run and a return value is produced
			if(has_filter($this->internal['prefix'].'filter_after_'.$action))
			{
		
				$return=apply_filters($this->internal['prefix'].'filter_after_'.$action,$return,$v1,$v2,$v3,$v4,$v5);
			}
			return $return;
		}
		if(trim($output)!='')
		{
			// Filter that runs after the action has been run and direct output is printed
			if(has_filter($this->internal['prefix'].'filter_'.$action.'_after'))
			{
				$output=apply_filters($this->internal['prefix'].'filter_after_'.$action,$output,$v1,$v2,$v3,$v4,$v5);
			}
			echo $output;
		}			
	
	}
	
}

$cb_p6 = new cb_p6;

require('plugin_core/direct_includes.php');


require('plugin_core/widgets.php');


?>