<?php
 
/*
 
Plugin Name: Kovalibre Social Network Widget
 
Plugin URI: https://kovalibre.com/
 
Description: Plugin to show a widget with link to social netwokr.
 
Version: 1.0
 
Author: Vanessa Kovalsky
 
Author URI: https://github.com/vanessakovalsky
 
License: GPLv2 or later
 
Text Domain: kovalibre
 
*/

class KovalibreSocialNetwork_Widget extends WP_Widget {
     
    // widget constructor
    public function __construct(){
        parent::__construct(
            'kovalibresocialnetwork_widget',
            __( 'Kovalibre Social Network Widget', 'kovalibresocialnetwork' ),
            array(
                'classname'   => 'kovalibresocialnetwork_widget',
                'description' => __( 'A widget to display links to social network.', 'kovalibresocialnetwork' )
            )
          );
           
          load_plugin_textdomain( 'kovalibresocialnetwork', false, basename( dirname( __FILE__ ) ) . '/languages' );  
    }
      
/**  
  * Front-end display of widget.
  *
  * @see WP_Widget::widget()
  *
  * @param array $args     Widget arguments.
  * @param array $instance Saved values from database.
  */
  public function widget( $args, $instance ) {    
     
    extract( $args );
     
    $title     = apply_filters( 'widget_title', $instance['title'] );
    $facebook  = $instance['facebook'];
    $twitter   = $instance['twitter'];

     
    echo $before_widget; //<div class='fjgkdgh'>
     
    if ( $title ) {
        echo $before_title . $title . $after_title;
    }
                         
    printf('<a href="%1$s">Facebook</a><br />',$facebook);
    printf('<a href="%1$s">Twitter</a>',$twitter);

    echo $after_widget;//</div>
     
}
      
/**
  * Back-end widget form.
  *
  * @see WP_Widget::form()
  *
  * @param array $instance Previously saved values from database.
  */
  public function form( $instance ) {    
 
    $title      = esc_attr( $instance['title'] );
    $facebook    = esc_attr( $instance['facebook'] );
    $twitter    = esc_attr( $instance['twitter'] );
    ?>
     
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook link'); ?></label> 
        <input class="facebook" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter link'); ?></label> 
        <input class="twitter" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
    </p>
     
    <?php 
    }
      
 /**
  * Sanitize widget form values as they are saved.
  *
  * @see WP_Widget::update()
  *
  * @param array $new_instance Values just sent to be saved.
  * @param array $old_instance Previously saved values from database.
  *
  * @return array Updated safe values to be saved.
  */
public function update( $new_instance, $old_instance ) {        
     
    $instance = $old_instance;
     
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['facebook'] = strip_tags( $new_instance['facebook'] );
    $instance['twitter'] = strip_tags( $new_instance['twitter'] );
     
    return $instance;
     
  }
}

add_action( 'widgets_init', function() {
    register_widget( 'KovalibreSocialNetwork_Widget' );
});