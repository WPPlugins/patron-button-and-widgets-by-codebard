<?php

		switch($action)
		{
			case 'append_to_content':
			{
		
				
				//************************APPEND TO CONTENT*********************************//
				
				$content=$v1;
						
				if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter']) OR 'post' !== get_post_type() OR !is_singular('post')) {
					
					$return  = $content;
					break;
				}
				
				global $post;
					
				$get_url=get_permalink();
					

				// form array of items set to 1
				$append.='<div class="'.$this->internal['prefix'].'patreon_button" style="text-align:'.$this->opt['post_button']['insert_text_align'].' !important;margin-top:'.$this->opt['post_button']['insert_margin'].';margin-bottom:'.$this->opt['post_button']['insert_margin'].';">';
					

				if($this->opt['quickstart']['redirect_url']=='')
				{
					$redirect=$get_url;
					
				}
				else
				{
					$redirect=$this->opt['quickstart']['redirect_url'];
					
				}
					
				if($this->opt['post_button']['show_message_over_post_button']=='yes')
				{
					$author_name=get_the_author_meta('display_name');
						
					if($this->opt['quickstart']['force_site_button']=='yes')
					{
						$author_name=	$site_name=$bloginfo = get_bloginfo( 'name', 'raw' );

					}	

					$insert_message=str_replace('{authorname}',$author_name,$this->opt['post_button']['message_over_post_button']);
						
						
					$append.='<div class="'.$this->internal['prefix'].'message_over_post_button" style="font-size:'.$this->opt['post_button']['message_over_post_button_font_size'].';margin-top:'.$this->opt['post_button']['message_over_post_button_margin'].';margin-bottom:'.$this->opt['post_button']['message_over_post_button_margin'].';">'.$insert_message.'</div>';
						
					
				}
					
				if($this->opt['quickstart']['redirect_url']=='')
				{
					$redirect=$get_url;
					
				}
				else
				{
					$redirect=$this->opt['quickstart']['redirect_url'];
					
				}
				
				$author_id=get_the_author_id();
				$user=esc_attr( get_the_author_meta( $this->internal['prefix'].'patreon_user', $author_id ) );
				
				
				
				if($this->opt['quickstart']['force_site_button']=='yes' OR $user=='')
				{
					$user=$this->opt['quickstart']['site_account'];	
				
				}
				
				// Lets check if what is saved is an url
				if(substr($user,0,4)=='http')
				{
					// It is! Load the value to url value
					$url=$user;
				}
				else
				{
					// This is a user name/slug. Make the url :
					$url='https://www.patreon.com/'.$user;
					
				}	
				

				if($this->opt['quickstart']['old_button']=='yes')
				{
					$button=$this->internal['plugin_url'].'images/'."patreon-medium-button.png";
					$max_width = '200';
				}
				else
				{
					
					$button=$this->internal['plugin_url'].'images/'."become_a_patron_button.png";
					$max_width = '200';
					
				}
				
				if($this->opt['quickstart']['custom_button']!='')
				{
					$button=$this->opt['quickstart']['custom_button'];
					if($this->opt['quickstart']['custom_button_width']!='')
					{
						$max_width = $this->opt['quickstart']['custom_button_width'];
						
					}
					else
					{
						$max_width = '200';
					}
					
				}
				
				
				$append.='<a rel="nofollow"'.$new_window.' href="'.$url.'"><img style="margin-top: '.$this->opt['sidebar_widgets']['button_margin'].';margin-bottom: '.$this->opt['sidebar_widgets']['button_margin'].';max-width:'.$max_width.'px;width:100%;height:auto;" src="'.$button.'"></a>';
					
				$append.='</div>';	
					
				$return=$content.$append;
				//************************APPEND TO CONTENT EOF*********************************//
								
				break;
			}
			case 'author_sidebar_widget_message':
			{
				//************************DUDACTION**********************//
				$message=$v1;
				
				global $post;
				if($this->opt['quickstart']['force_site_button']=='yes')
				{
					$site_name=$bloginfo = get_bloginfo( 'name', 'raw' );
					$message=str_replace('{authorname}',$site_name,$message);			
					
				}
				else
				{
					$author_name=get_the_author_meta('display_name');
					$message=str_replace('{authorname}',$author_name,$message);
				}
				$return=$message;				
				
				//************************DUDACTION EOF*********************************//
				break;
			}
			case 'author_sidebar_widget':
			{
				//************************Author Sidebar Widget*********************//
				
				$content=$v1;
						
				//if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter']) OR 'post' !== get_post_type()) $return = $content;
			
				global $post;
				
				$get_url=get_permalink();
				
				$append.='<div class="'.$this->internal['prefix'].'patreon_author_widget" style="text-align:'.$this->opt['sidebar_widgets']['insert_text_align'].' !important;">';
				

				if($this->opt['quickstart']['redirect_url']=='')
				{
					$redirect=$get_url;
				
				}
				else
				{
					$redirect=$this->opt['quickstart']['redirect_url'];
				
				}	
				$author_id=get_the_author_id();
				$user=esc_attr( get_the_author_meta( $this->internal['prefix'].'patreon_user', $author_id ) );

				if($this->opt['quickstart']['force_site_button']=='yes' OR $user=='')
				{
					$user=$this->opt['quickstart']['site_account'];			
					
				}	

				// Lets check if what is saved is an url
				if(substr($user,0,4)=='http')
				{
					// It is! Load the value to url value
					$url=$user;
				}
				else
				{
					// This is a user name/slug. Make the url :
					$url='https://www.patreon.com/'.$user;
					
				}

				if($this->opt['quickstart']['old_button']=='yes')
				{
					$button=$this->internal['plugin_url'].'images/'."patreon-medium-button.png";
					$max_width = '200';
				}
				else
				{
					
					$button=$this->internal['plugin_url'].'images/'."become_a_patron_button.png";
					$max_width = '200';
					
				}
				
				if($this->opt['quickstart']['custom_button']!='')
				{
					$button=$this->opt['quickstart']['custom_button'];
					if($this->opt['quickstart']['custom_button_width']!='')
					{
						$max_width = $this->opt['quickstart']['custom_button_width'];
						
					}
					else
					{
						$max_width = '200';
					}
					
				}
				
				
				$append.='<a rel="nofollow"'.$new_window.' href="'.$url.'"><img style="margin-top: '.$this->opt['sidebar_widgets']['button_margin'].';margin-bottom: '.$this->opt['sidebar_widgets']['button_margin'].';max-width:'.$max_width.'px;width:100%;height:auto;" src="'.$button.'"></a>';
				
				$append.='</div>';	
				
				$return=$append;			
				
				//************************Author Sidebar Widget EOF*********************************//
				break;
			}
			case 'site_sidebar_widget_message':
			{
				//************************Site Sidebar Widget Message**********************//
				
				$message=$v1;
			
				$site_name=$bloginfo = get_bloginfo( 'name', 'raw' );
				$message=str_replace('{sitename}',$site_name,$message);			
				
				$return = $message;				
				
				//************************Site Sidebar Widget Message EOF*********************************//
				break;
			}
			case 'site_sidebar_widget':
			{
				//************************Site Sidebar Widget**********************//
				$content=$v1;
				//if(in_array('get_the_excerpt', $GLOBALS['wp_current_filter']) OR 'post' !== get_post_type()) $return = $content;
					
				global $post;
				
				$get_url=get_permalink();	
				
				$append.='<div class="'.$this->internal['prefix'].'patreon_site_widget" style="text-align:'.$this->opt['sidebar_widgets']['insert_text_align'].' !important;">';
				

				if($this->opt['quickstart']['redirect_url']=='')
				{
					$redirect=$get_url;
				
				}
				else
				{
					$redirect=$this->opt['quickstart']['redirect_url'];
				
				}	

				$user=$this->opt['quickstart']['site_account'];			
					

				// Lets check if what is saved is an url
				if(substr($user,0,4)=='http')
				{
					// It is! Load the value to url value
					$url=$user;
				}
				else
				{
					// This is a user name/slug. Make the url :
					$url='https://www.patreon.com/'.$user;
					
				}
				// Lets shove in the target=_blank if open in new window is set :
				
				if($this->opt['quickstart']['open_new_window']=='yes')
				{
					$new_window=' target="_blank"';
				
				}
				
				if($this->opt['quickstart']['old_button']=='yes')
				{
					$button=$this->internal['plugin_url'].'images/'."patreon-medium-button.png";
					$max_width = '200';
				}
				else
				{
					
					$button=$this->internal['plugin_url'].'images/'."become_a_patron_button.png";
					$max_width = '200';
					
				}
				
				if($this->opt['quickstart']['custom_button']!='')
				{
					$button=$this->opt['quickstart']['custom_button'];
					
					if($this->opt['quickstart']['custom_button_width']!='')
					{
						$max_width = $this->opt['quickstart']['custom_button_width'];
						
					}
					else
					{
						$max_width = '200';
					}
					
				}
				
				
				$append.='<a rel="nofollow"'.$new_window.' href="'.$url.'"><img style="margin-top: '.$this->opt['sidebar_widgets']['button_margin'].';margin-bottom: '.$this->opt['sidebar_widgets']['button_margin'].';max-width:'.$max_width.'px;width:100%;height:auto;" src="'.$button.'"></a>';
				
				$append.='</div>';	
				
				$return = $append;
		
				//************************Site Sidebar Widget EOF*********************************//
				break;
			}
			case 'add_styles':
			{
				//************************Add Styles**********************//

				echo '<style>
				
					.'.$this->internal['prefix'].'patreon_button:after {
						content: "";
						display: table;
						clear: both;
					}
					.'.$this->internal['prefix'].'patreon_button img {
						display:inline-block !important;
					}
					
					.'.$this->internal['prefix'].'patreon_button:before {
						content: "";
						display: table;
						clear: both;
					}
					
					
					.'.$this->internal['prefix'].'message_over_post_button:after {
						content: "";
						display: table;
						clear: both;
					}
					
					.'.$this->internal['prefix'].'message_over_post_button:before {
						content: "";
						display: table;
						clear: both;
					}
					
					
					.widget_'.$this->internal['prefix'].'sidebar_author_widget img  {
						display:inline-block !important;
						
					}
					.widget_'.$this->internal['prefix'].'sidebar_site_widget img {
						display:inline-block !important;;
						
					}
				  
				</style>';

				//************************Add Styles EOF*********************************//
				break;
			}
			case 'add_custom_user_field':
			{
				//************************Add Custom User Field**********************//
				$user=$v1;
				?>
					
					<table class="form-table">
						<tr><th>
							<label for="address"><?php _e('Your Patreon User', $this->internal['id']); ?>
							</label></th>
							<td>
								<input type="text" name="<?php echo $this->internal['id'];?>_patreon_user" id="<?php echo $this->internal['id'];?>_patreon_user" value="<?php echo esc_attr( get_the_author_meta( $this->internal['prefix'].'patreon_user', $user->ID ) ); ?>" class="regular-text" /><br />
									<span class="description"><?php _e('Please enter your Patreon user.', $this->internal['id']); ?></span>
							</td>
						</tr>
					</table>
						
				<?php				
				
				
				//************************Add Custom User Field EOF*********************************//
				break;
			}
			case 'save_custom_user_field':
			{
				//************************Save Custom User Field**********************//
				$user_id=$v1;
				
				if ( !current_user_can( 'edit_user', $user_id ) ) $return = FALSE;
		
				update_usermeta( $user_id, $this->internal['prefix'].'patreon_user', $_POST[$this->internal['prefix'].'patreon_user'] );				
				
				//************************Save Custom User Field EOF*********************************//
				break;
			}
			case 'activate':
			{
				//************************ACTIVATE**********************//
						
				// If setup was not done, redirect to wizard
				if(!$this->info['setup_done'])
				{
					
					add_action( 'activated_plugin', array(&$this,'after_plugin_activation') );
					
				}				
			
		
				//************************ACTIVATE EOF*********************************//
				break;
			}
			case 'deactivate':
			{
				//************************DEACTIVATE**********************//
				
				//************************DEACTIVATE EOF*********************************//
				break;
			}
			case 'after_plugin_activation':
			{
				//************************after_plugin_activation**********************//
				
				// Another check - If setup was not done, redirect to wizard
				if(!$this->info['setup_done'])
				{	
					wp_redirect($this->internal['admin_url'].'admin.php?page=settings_'.$this->internal['id']);
					exit;	
				}
				//************************after_plugin_activation EOF*********************************//
				break;
			}
			case 'dud_action':
			{
				//************************DUDACTION**********************//
				
				//************************DUDACTION EOF*********************************//
				break;
			}
			case 'do_setup_wizard':
			{
				//************************do_setup_wizard**********************//
				
				// Here we do and process setup wizard if it is not done:
			
	
				if($_REQUEST['setup_stage']=='')
				{
					
					require($this->internal['plugin_path'].'plugin_core/setup_1.php');
					
						
				
				}
				else
				{
			
					// Check and validate saved profile url / account name
					if($_REQUEST['setup_stage']=='1')
					{
						if($_REQUEST['site_account']=='')
						{
							// Empty!
							$this->error[]='<b>You can\'t have an empty profile url!</b> If you don\'t know how to find out your Patreon Profile URL, please check out <a href="http://codebard.com/patreon-button-and-plugin-how-to-find-your-profile-address-or-account-name" target="_blank">this guide</a>';
							
							
					
						}
						else
						{
						
							$_REQUEST['site_account']=trim($_REQUEST['site_account']);
							if(substr($_REQUEST['site_account'],0,4)=='http')
							{
								// Its an url. lets check if its valid
								$response = wp_remote_get( $_REQUEST['site_account'] );
								if( is_array($response) ) {
								  $header = $response['headers']; // array of http header lines
								  $body = $response['body']; // use the content
								 
																	
									preg_match('~<title>([^{]*)</title>~i', $body, $match);
									if(strpos($match[1],'Page Not Found')!==false)
									{
										$this->error[]='<b>This URL seems to be incorrect!</b> If you don\'t know how to find out your Patreon Profile URL, please check out <a href="http://codebard.com/patreon-button-and-plugin-how-to-find-your-profile-address-or-account-name" target="_blank">this guide</a>';
									
									}
									
								  
								}
								
							}
							else
							{
								// Not an url, maybe account name. lets check if its valid
								
								$response = wp_remote_get( 'https://www.patreon.com/'.$_REQUEST['site_account'] );
								if( is_array($response) ) {
								  $header = $response['headers']; // array of http header lines
								  $body = $response['body']; // use the content
								 
																	
									preg_match('~<title>([^{]*)</title>~i', $body, $match);
									if(strpos($match[1],'Page Not Found')!==false)
									{
										$this->error[]='<b>This Patreon Account User (Personal Patreon url value in Patreon Settings) seems to be incorrect!</b> If you don\'t know how to find out your Patreon Profile URL, please check out <a href="http://codebard.com/patreon-button-and-plugin-how-to-find-your-profile-address-or-account-name" target="_blank">this guide</a>';
									
									}
									
								  
								}
							
							
							
							}
							
						
						
						}
						
						
						if(count($this->error)>0)
						{
						
							require($this->internal['plugin_path'].'plugin_core/setup_1.php');
						
						}
						else
						{
							// User slug or URL is correct. Lets save these:
							
							$this->opt['quickstart']['site_account']=$_REQUEST['site_account'];
							$this->info['setup_done']=1;
							update_option($this->internal['prefix'].'options' ,$this->opt);
							update_option($this->internal['prefix'].'info' ,$this->info);
							
							
							require($this->internal['plugin_path'].'plugin_core/setup_2.php');
						}
						
						
					}
						// Check and validate saved profile url / account name
					if($_REQUEST['setup_stage']=='2')
					{
						if($_REQUEST['site_account']=='')
						{
							// Empty!
							$this->error[]='You can\'t have an empty profile url! If you don\'t know how to find out your Patreon Profile URL, please check out <a href="http://codebard.com/patreon-button-and-plugin-how-to-find-your-profile-address-or-account-name" target="_blank">this guide</a>';
							
							require($this->internal['plugin_path'].'plugin_core/setup_1.php');
					
						}
					}
					
					
					
					
				
				}
				
				
				
				//************************do_setup_wizard EOF*********************************//
				break;
			}
		}
		
		
		
?>