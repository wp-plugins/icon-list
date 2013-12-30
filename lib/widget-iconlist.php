<?php
/**********************************************
* Icon List Widget
**********************************************/

class Kamn_Widget_Iconlist extends WP_Widget {
	
	/**
	 *  Set up the widget's unique name, ID, class, description, and other options.
	 */	
	function __construct() {
		
		/* Set up the widget options. */
		$widget_options = array( 
			'classname' => 'widget-iconlist-kamn', 
			'description' => esc_html__( 'A widget to display list using icons.', 'kamn-iconlist' )
		);
		
		/* Set up the widget control options. */
		$control_options = array(
			'width' => 300,
			'height' => 250
		);
		
		/* Create the widget. */
		$this->WP_Widget( 'widget-iconlist-kamn', __( 'Icon List', 'kamn-iconlist'), $widget_options, $control_options );
		
	}
	
	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	
	function widget( $args, $instance ) {
		
		/** Global Data */
		global $post;
		
		/** Extract Args */
		extract( $args );
		
		/** Set up the default form values. */
		$defaults = $this->kamn_iconlist_defaults();
		
		/** Merge the user-selected arguments with the defaults. */
		$instance = wp_parse_args( (array) $instance, $defaults );

		/** Open the output of the widget. */
		echo $before_widget;
		
?>
		<div class="widget-iconlist-global-wrapper">        
			<div class="widget-iconlist-container">

				<?php if( !empty( $instance['title'] ) ): ?>
				<div class="widget-iconlist-row">
				  <div class="widget-iconlist-col">
					<?php echo $before_title . '<span>' . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . '</span>' . $after_title; ?>
				  </div>
				</div>
				<?php endif; ?>            
	          
	          	<div class="widget-iconlist-row">
		          	<div class="widget-iconlist-col">
			          
						<ul class="widget-iconlist <?php echo $widget_id; ?>">
							<?php foreach( $instance['iconlist_skeleton'] as $val ) : ?>
							<li><span class="iconlist-icon fa <?php echo $val['icon']; ?>"></span><?php echo $val['title']; ?></li>
							<?php endforeach; ?>
						</ul>	          
	          		
	          		</div>
          		</div>
          	
          	</div> <!-- End .widget-global-wrapper -->        
        </div>
        
<?php		
		
		/** Close the output of the widget. */
		echo $after_widget;
	
	}
	
	/** Updates the widget control options for the particular instance of the widget.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {

		/** Default Args */
		$defaults = $this->kamn_iconlist_defaults();
		
		/** Update Logic */		
		$instance = $old_instance;
		foreach( $defaults as $key => $val ) {		
			if( $key != 'iconlist_skeleton' ) {			
				$instance[$key] = strip_tags( $new_instance[$key] );			
			}		
		}
		$instance['iconlist_skeleton'] = $new_instance['iconlist_skeleton'];
		return $instance;

	}
	
	/**
	 *
	 * Displays the widget control options in the Widgets admin screen. 
	 *
	 * @param array $instance Current settings
	 */
	function form( $instance ) {

		/** Set up the default form values. */
		$defaults = $this->kamn_iconlist_defaults();
		
		/** Merge the user-selected arguments with the defaults. */
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = strip_tags( $instance['title'] );
		$iconlist_number = range( 1, 50 );
		$icon_utilities = array( 'fa' => 'Font Awesome' );
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kamn-iconlist' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>


		<p><strong><?php _e( 'Icon List Settings', 'kamn-iconlist' ); ?></strong></p>
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'iconlist_number' ); ?>"><?php _e( 'Number of icon list to display:', 'kamn-iconlist' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'iconlist_number' ); ?>" name="<?php echo $this->get_field_name( 'iconlist_number' ); ?>">
              <?php foreach ( $iconlist_number as $val ): ?>
			    <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $instance['iconlist_number'], $val ); ?>><?php echo esc_html( $val ); ?></option>
			  <?php endforeach; ?>
            </select>
		</p>
        
        <?php 
		foreach ( $iconlist_number as $val ):		
		$title = isset( $instance['iconlist_skeleton'][$val]['title'] )? $instance['iconlist_skeleton'][$val]['title']: '';
		$icon_utility = isset( $instance['iconlist_skeleton'][$val]['icon_utility'] )? $instance['iconlist_skeleton'][$val]['icon_utility']: 'fa';
		$icon = isset( $instance['iconlist_skeleton'][$val]['icon'] )? $instance['iconlist_skeleton'][$val]['icon']: '';		
		?>
        
        <p><strong><?php _e( 'Icon List', 'kamn-iconlist' ); ?> <?php echo $val; ?></strong></p>
        
        <p>
			<label><?php _e( 'Title:', 'kamn-iconlist' ); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'iconlist_skeleton' ); ?>[<?php echo $val; ?>][title]" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label><?php _e( 'Icon Utility:', 'kamn-iconlist' ); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'iconlist_skeleton' ); ?>[<?php echo $val; ?>][icon_utility]">
              <?php foreach ( $icon_utilities as $key2 => $val2 ): ?>
			    <option value="<?php echo esc_attr( $key2 ); ?>" <?php selected( $icon_utility, $key2 ); ?>><?php echo esc_html( $val2 ); ?></option>
			  <?php endforeach; ?>
            </select>
		</p>
        
        <p>
			<label><?php _e( 'Icon Code:', 'kamn-iconlist' ); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'iconlist_skeleton' ); ?>[<?php echo $val; ?>][icon]" value="<?php echo esc_attr( $icon ); ?>" />
			<small><?php printf( __( 'For Font Awesome: <strong>fa-adjust</strong> - <a href="%1$s" target="_blank">Choose Font Awesome Icons</a>', 'kamn-iconlist' ), kamn_iconlist_external_link( 'fa-icons' ) ); ?></small><br />
		</p>
        
        <?php 
		if( $val >= $instance['iconlist_number'] ) {
			break;
		}
		endforeach;
		?>

<?php		
	}
	
	/** Set up the default form values. */	
	function kamn_iconlist_defaults() {
		
		$defaults = array(
			'title' => esc_attr__( 'Icon List', 'kamn-iconlist'),
			'iconlist_number' => 1,
			'iconlist_skeleton' => array( '1' => array( 
				'title' => 'Address: Fusce arcu mauris, convallis amet. Dignissim ultrices odio.',
				'icon_utility' => 'fa',
				'icon' => 'fa-map-marker' ) )
		);
		
		return $defaults;
		
	}
	
}