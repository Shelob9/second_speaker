<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>'
    ),
    'sections'        => array(
      array(
        'title'       => 'Skins',
        'id'          => 'skins'
      ),
      array(
        'title'       => 'Header Options',
        'id'          => 'header'
      ),
      array(
        'title'       => 'Footer Options',
        'id'          => 'footer'
      ),
      array(
        'title'       => 'Other',
        'id'          => 'other'
      )
    ),
    'settings'        => array(
      //skins
       array(
        'label'       => 'Skin',
        'id'          => 'skin',
        'type'        => 'select',
        'desc'        => 'Like Luke at Cloud City, you must choose between the dark side and the light side skin for your website.',
        'choices'     => array(
          array(
            'label'       => 'Light Side',
            'value'       => 'light'
          ),
          array(
            'label'       => 'Dark Side',
            'value'       => 'dark'
          )
        ),
        'std'         => 'Light Side',
        'section'     => 'skins'
      ),
      array(
        'label'       => 'Light Side Background Image',
        'id'          => 'light_bg_img',
        'type'        => 'upload',
        'desc'        => 'Change the background image for the Light Side skin.',
        'std'         => get_stylesheet_directory_uri().'/images/bg.jpg',
        'section'     => 'skins'
      ),
      array(
        'label'       => 'Dark Side Background Image',
        'id'          => 'dark_bg_img',
        'type'        => 'upload',
        'desc'        => 'Change the background image for the Dark Side skin.',
        'std'         => get_stylesheet_directory_uri().'/images/bg-dark.jpg',
        'section'     => 'skins'
      ),
      //header
       array(
        'label'       => 'Logo Position',
        'id'          => 'logo_pos',
        'type'        => 'select',
        'desc'        => 'Location for logo. Above menu is best for banners, to the side of the tagline is best for smaller logos.',
        'choices'     => array(
          array(
            'label'       => 'None',
            'value'       => 'none'
          ),
          array(
            'label'       => 'Left of Tagline',
            'value'       => 'left'
          ),
          array(
            'label'       => 'Right of Tagline',
            'value'       => 'right'
          ),
           array(
            'label'       => 'Above Menu',
            'value'       => 'above'
          ),
        ),
        'std'         => 'none',
        'section'     => 'header'
      ),
       array(
        'label'       => 'Logo',
        'id'          => 'logo_img',
        'type'        => 'upload',
        'desc'        => 'Upload a logo.',
        'std'         => '',
        'section'     => 'header'
      ),
       array(
        'label'       => 'Header Scripts',
        'id'          => 'header_scripts',
        'type'        => 'textarea-simple',
        'desc'        => 'Add any scripts, such as your analytics code, or CSS you would like added to the header. Be sure to use style or script tags as needed.',
        'std'         => '',
        'rows'        => '20',
        'section'     => 'header'
      ),
      
      //footer
      array(
        'label'       => 'Remove Theme Credit Link?',
        'id'          => 'remove_credit',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'No',
            'value'       => 'no'
          ),
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          )
        ),
       'std'         => 'no',
    	'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Text',
        'id'          => 'footer_text',
        'type'        => 'textarea_simple',
        'desc'        => 'Enter any custom text you would like to show in the footer area. You may use html. If you are keeping the credit link, you should avoid wrapping in <p> tags.',
        'std'         => '',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'footer'
      ),
       array(
        'label'       => 'Footer Scripts',
        'id'          => 'footer_scripts',
        'type'        => 'textarea-simple',
        'desc'        => 'Add any scripts you would like added to the footer. Be sure to use script tags as needed.',
        'std'         => '',
        'rows'        => '20',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Stick Menu To Top Of Page?',
        'id'          => 'stick',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'stick'
          ),
          array(
            'label'       => 'No',
            'value'       => 'unstick'
          )
        ),
       'std'         => 'stick',
    	'section'     => 'other'
      ),
      array(
        'label'       => 'Show Sidebar?',
        'id'          => 'sidebar',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'value1'
          ),
          array(
            'label'       => 'No',
            'value'       => 'value3'
          )
        ),
       'std'         => 'value1',
    	'section'     => 'other'
      ),
		
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}