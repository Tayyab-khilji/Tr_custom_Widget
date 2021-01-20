<?php
/*
Plugin Name: Custom Widget Plugin
Plugin URI: 
Description: This plugin will add a widget to Webiste that will display's name and description on front end  
Version: 1.0
Author: Tayyab Rehman
Author URI: 
*/
    class TrCustomWidget extends WP_widget {
        public function __construct() {
            parent::WP_Widget(false,"Tr Custom Widget");
        }
        public function form( $instance ){
            $title = $instance['title'];
            $description = $instance['description'];
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
    <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php $this->get_field_id('title'); ?>" value="<?php echo ($title); ?>" >
    <label for="<?php echo $this->get_field_id( 'description' ); ?>">Description:</label>
    <textarea name="<?php echo $this->get_field_name('description'); ?>" id ="<?php echo $this->get_field_id('description'); ?>"><?php echo ($description); ?></textarea> 
    </p> 
    <?php
      }
      public function update($new_instance, $old_instance){
          $instance = $old_instance;
          $instance['title'] = $new_instance['title'];
          $instance['description'] = $new_instance['description'];
          return $instance;
      }
      public function widget($args, $instance){
          echo "<h1>".$instance['title']."</h1>";
          echo "<p>".$instance['description']."</p>";
      }
    }
    function Tr_custom_widget_register() {
        register_widget( 'TrCustomWidget' );
    }
    add_action( "widgets_init","Tr_custom_widget_register");