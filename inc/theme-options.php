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
        'title'       => 'Front Page',
        'id'          => 'front_page'
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
        'title'       => 'Big Callout Box',
        'id'          => 'big_callout'
      ),
    array(
        'title'       => 'Three Small Callout Boxes',
        'id'          => '3_callout'
      ),

    ),
    'settings'        => array(
      //skins
       array(
        'label'       => 'Skin',
        'id'          => 'skin',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Skin One',
            'value'       => 'skin1'
          ),
          array(
            'label'       => 'Skin Two',
            'value'       => 'skin2'
          )
        ),
        'std'         => 'skin1',
        'section'     => 'skins'
      ),
      array(
        'label'       => 'Skin One Background Image',
        'id'          => 'sk1_bg_img',
        'type'        => 'upload',
        'desc'        => 'Change the background image for skin one.',
        'std'         => get_stylesheet_directory_uri().'/images/bg.png',
        'section'     => 'skins'
      ),
      array(
        'label'       => 'Skin Two Background Image',
        'id'          => 'sk2_bg_img',
        'type'        => 'upload',
        'desc'        => 'Change the background image for skin one.',
        'std'         => get_stylesheet_directory_uri().'/images/bg.jpg',
        'section'     => 'skins'
      ),
      //header
        array(
        'label'       => 'Stick Header Top Of Page?',
        'id'          => 'stick',
        'type'        => 'select',
        'desc'        => 'Select yes to prevent the header from scrolling with the page.',
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
       'std'         => 'unstick',
    	'section'     => 'header'
      ),
       array(
        'label'       => 'Header Image',
        'id'          => 'header_img',
        'type'        => 'upload',
        'desc'        => 'Upload Header Image',
        'std'         => get_stylesheet_directory_uri().'/images/default-header.jpg',
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
        'label'       => 'Full Width Footer?',
        'id'          => 'footer_width',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
       'std'         => 'yes',
    	'section'     => 'footer'
      ),

//front page 
      array(
        'label'       => 'Show Posts On Front Page?',
        'id'          => 'front_posts',
        'type'        => 'select',
        'desc'        => 'If set to no, be sure to select an alternate page for posts from the settings menu.',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
       'std'         => 'yes',
    	'section'     => 'front_page'
      ),
//big callout
      array(
        'label'       => 'Show Big Callout Box On Front Page?',
        'id'          => 'big_callout_use',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'yes',
    	'section'     => 'front_page'
      ),
        array(
            'label'       => 'Big Callout Title',
            'id'          => 'big_callout_title',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => 'Big Callout Box Title',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
          array(
            'label'       => 'Big Callout Content',
            'id'          => 'big_callout_content',
            'type'        => 'textarea',
            'desc'        => 'Text for the big callout box.',
            'std'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis arcu ut tortor ullamcorper, vel sodales lacus tristique. Pellentesque gravida rutrum lectus, a lacinia leo. Etiam lobortis, sapien nec imperdiet pulvinar, nisl nisl volutpat ante, in aliquam augue eros a nibh. Nulla sollicitudin suscipit malesuada. Suspendisse vel egestas urna, in tempor dolor. Phasellus tincidunt tempor lectus. Ut adipiscing, risus ac sodales cursus, diam justo rutrum dolor, in tincidunt mauris tortor quis tellus. Aliquam erat volutpat. Ut et lectus ut arcu bibendum interdum eu sit amet ipsum. Aliquam libero eros, vulputate fermentum felis vitae, pellentesque vulputate velit. Fusce dictum condimentum fringilla. Phasellus aliquet ultricies purus, id tincidunt nibh varius et. Aliquam pulvinar turpis at ipsum lobortis sodales. Pellentesque fermentum ligula ut arcu adipiscing cursus. Nam bibendum at massa sit amet venenatis. Duis aliquet gravida justo, egestas mollis nulla.',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
            array(
            'label'       => 'Big Callout Call To Action',
            'id'          => 'big_callout_cta',
            'type'        => 'textarea-simple',
            'desc'        => 'Call to action in the big callout box.',
            'std'         => 'Call To Action',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
           array(
            'label'       => 'Big Callout CTA Button Label',
            'id'          => 'big_callout_ctaLabel',
            'type'        => 'textarea-simple',
            'desc'        => 'Label for big callout\'s call to action button.',
            'std'         => 'CTA Button',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
        
           array(
            'label'       => 'Big Callout CTA link',
            'id'          => 'big_callout_ctaLink',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for big callout\'s call to action button..',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
        array(
        'label'       => 'Big Callout Box Image',
        'id'          => 'big_callout_img',
        'type'        => 'upload',
        'desc'        => 'Image to display inside of the callout box.',
        'std'         => 'http://placekitten.com/600/800',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'big_callout'
      ),
// 3 callout boxes
          array(
        'label'       => 'Show Three Small Callout Boxes On Front Page?',
        'id'          => '3_callout_use',
        'type'        => 'select',
        'desc'        => '',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
       'std'         => 'yes',
    	'section'     => 'front_page'
    ),
    //box 1
    	array(
            'label'       => 'Small Callout Box 1 Title',
            'id'          => '3_callout_title_1',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => 'Small Callout 1 Title',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 1 Link',
            'id'          => '3_callout_link_1',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the first small callout box.',
            'std'         => '#',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 1 Content',
            'id'          => '3_callout_content_1',
            'type'        => 'textarea',
            'desc'        => 'Text for the first callout box.',
            'std'         => 'Small Callout Box 1 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 1 Background Image',
        'id'          => '3_callout_img_1',
        'type'        => 'upload',
        'desc'        => 'Background image for the first small callout box.',
        'std'         => '',
        'rows'        => '10',
        'post_type'   => '',
       
        'taxonomy'    => '',
        'class'       => '',
        'section'     => '3_callout'
      ),
      //box 2
    	array(
            'label'       => 'Small Callout Box 2 Title',
            'id'          => '3_callout_title_2',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the first small callout box',
            'std'         => 'Small Callout 2 Title',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 2 link',
            'id'          => '3_callout_link_2',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the second small callout box.',
            'std'         => '#',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 2 Content',
            'id'          => '3_callout_content_2',
            'type'        => 'textarea',
            'desc'        => 'Text for the second callout box.',
            'std'         => 'Small Callout Box 2 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 2 Background Image',
        'id'          => '3_callout_img_2',
        'type'        => 'upload',
        'desc'        => 'Background image for the second small callout box.',
        'std'		=> '',
        'rows'        => '40',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => '3_callout'
      ),
      //box 3
    	array(
            'label'       => 'Small Callout Box 3 Title',
            'id'          => '3_callout_title_3',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => 'Small Callout 3 Title',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 3 Link',
            'id'          => '3_callout_link_3',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the third small callout box.',
            'std'         => '#',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 3 Content',
            'id'          => '3_callout_content_3',
            'type'        => 'textarea',
            'desc'        => 'Text for the third callout box.',
            'std'         => 'Small Callout Box 3 Content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mi justo, bibendum non consectetur quis, adipiscing sit amet nulla. Praesent nibh libero, consequat eget sodales nec, varius ut tellus.',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 3 Background Image',
        'id'          => '3_callout_img_3',
        'type'        => 'upload',
        'desc'        => 'Background image for the third small callout box.',
        'std'		=> '',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => '3_callout'
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