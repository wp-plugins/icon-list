<div class="wrap kamn-iconlist-settings">
  
  <?php 
  /** Get the plugin data. */
  $kamn_iconlist_plugin_data = kamn_iconlist_plugin_data();
  screen_icon();
  ?>
  
  <h2><?php echo sprintf( __( '%1$s Settings', 'kamn-iconlist' ), $kamn_iconlist_plugin_data['Name'] ); ?></h2>    
  
  <?php settings_errors(); ?>

  <div class="kamn-iconlist-promo-wrapper">
    <a href="http://designorbital.com/premium-wordpress-themes/" class="button button-primary button-hero" target="_blank"><?php _e( 'Premium WordPress Themes', 'kamn-iconlist' ); ?></a>
    <a href="http://designorbital.com/free-wordpress-themes/" class="button button-hero" target="_blank"><?php _e( 'Free WordPress Themes', 'kamn-iconlist' ); ?></a>
  </div>
  
  <form action="options.php" method="post" id="kamn-iconlist-form-wrapper">
    
    <div id="kamn-iconlist-form-header" class="kamn-iconlist-clearfix">
      <input type="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'kamn-iconlist' ); ?>">
    </div>
	
	<?php settings_fields( 'kamn_iconlist_options_group' ); ?>
    
    <div id="kamn-iconlist-sidebar">
      
      <ul id="kamn-iconlist-group-menu">
        <li id="0_section_group_li" class="kamn-iconlist-group-tab-link-li active"><a href="javascript:void(0);" id="0_section_group_li_a" class="kamn-iconlist-group-tab-link-a" data-rel="0"><span><?php _e( 'Fonts Settings', 'kamn-iconlist' ); ?></span></a></li>
        <li id="1_section_group_li" class="kamn-iconlist-group-tab-link-li"><a href="javascript:void(0);" id="1_section_group_li_a" class="kamn-iconlist-group-tab-link-a" data-rel="1"><span><?php _e( 'General Settings', 'kamn-iconlist' ); ?></span></a></li>
      </ul>
    
    </div>
    
    <div id="kamn-iconlist-main">
    
      <div id="0_section_group" class="kamn-iconlist-group-tab">
        <?php do_settings_sections( 'kamn_iconlist_section_fonts_page' ); ?>
      </div>
      
      <div id="1_section_group" class="kamn-iconlist-group-tab">
        <?php do_settings_sections( 'kamn_iconlist_section_general_page' ); ?>
      </div>
      
    </div>
    
    <div class="kamn-iconlist-clear"></div>
    
    <div id="kamn-iconlist-form-footer" class="kamn-iconlist-clearfix">
      <input type="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'kamn-iconlist' ); ?>">
    </div>
    
  </form>

</div>