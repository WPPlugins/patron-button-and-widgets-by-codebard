<?php


class cb_p6_sidebar_author_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function cb_p6_sidebar_author_widget() {
        parent::WP_Widget(false, $name = 'Patreon Author Widget');	
	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
	
		if(!is_single())
		{
			return;
		
		}
		
		global $cb_p6;
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
		
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							
								<?php if($message!='')
								{
								
								?>
								<div style="text-align: <?php echo $cb_p6->opt['sidebar_widgets']['insert_text_align']; ?> !important;font-size: <?php echo $cb_p6->opt['sidebar_widgets']['message_font_size']; ?>;margin-top: <?php echo $cb_p6->opt['sidebar_widgets']['message_over_post_button_margin']; ?>;margin-bottom: <?php echo $cb_p6->opt['sidebar_widgets']['message_over_post_button_margin']; ?>;"><?php echo $cb_p6->author_sidebar_widget_message($message); ?></div>
								<?php } ?>
							
          <?php echo $cb_p6->author_sidebar_widget(); ?>
     
						
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
		global $cb_p6;
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'message'=>'Support  {authorname} on Patreon!' ) );
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Message over Button'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message ?>" />
        </p>
		<p>
          <?php echo $cb_p6->author_sidebar_widget(); ?>
        </p>		
		
        <?php 
    }
	


}

class cb_p6_sidebar_site_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function cb_p6_sidebar_site_widget() {
        parent::WP_Widget(false, $name = 'Patreon Site Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) 
	{	
		global $cb_p6;
	    if($cb_p6->opt['sidebar_widgets']['hide_site_widget_on_single_post_page']=='yes')
		{
			// Dont show the site widget on single post page 
			return;
			
			
		}
		
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
								<?php if($message!='')
								{
								?>
								<div style="text-align: <?php echo $cb_p6->opt['sidebar_widgets']['insert_text_align']; ?> !important;font-size: <?php echo $cb_p6->opt['sidebar_widgets']['message_font_size']; ?>;margin-top: <?php echo $cb_p6->opt['sidebar_widgets']['message_over_post_button_margin']; ?>;margin-bottom: <?php echo $cb_p6->opt['sidebar_widgets']['message_over_post_button_margin']; ?>;"><?php echo $cb_p6->site_sidebar_widget_message($message); ?></div>
								<?php } ?>
							
          <?php echo $cb_p6->site_sidebar_widget(); ?>
     
						
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
		global $cb_p6;
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'message'=>'Support  {sitename} on Patreon!' ) );
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Message over Button'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message ?>" />
        </p>
		<p>
          <?php echo $cb_p6->site_sidebar_widget(); ?>
        </p>		
		
        <?php 
    }
	

}


function cb_p6_register_widgets()
{

	register_widget( 'cb_p6_sidebar_author_widget' );
	register_widget( 'cb_p6_sidebar_site_widget' );


}

add_action('widgets_init', 'cb_p6_register_widgets');


?>