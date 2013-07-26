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
        'title'       => 'Big Callout Box',
        'id'          => 'big_callout'
      ),
    array(
        'title'       => 'Three Small Callout Boxs',
        'id'          => '3_callout'
      ),
      array(
        'title'       => 'Post Format Styles',
        'id'          => 'post_formats'
      ),
      array(
        'title'       => 'Other',
        'id'          => 'other'
      ),
      array(
        'title'       => 'Front Page',
        'id'          => 'front_page'
      )
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
        'std'         => get_stylesheet_directory_uri().'/images/bg.jpg',
        'section'     => 'skins'
      ),
      array(
        'label'       => 'Skin Two Background Image',
        'id'          => 'sk2_bg_img',
        'type'        => 'upload',
        'desc'        => 'Change the background image for skin one.',
        'std'         => get_stylesheet_directory_uri().'/images/bg-dark.jpg',
        'section'     => 'skins'
      ),
      //header
       array(
        'label'       => 'Full width header on all pages',
        'id'          => 'full-header',
        'type'        => 'select',
        'desc'        => 'If set to yes, you will see the full header on all pages. Otherwise you will just see a simple topbar.',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
           array(
            'label'       => 'No',
            'value'       => 'no'
          ),
        ),
        'std'         => 'Yes',
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

//other
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
//big callout
      array(
        'label'       => 'Show Big Callout Box On Front Page? ?',
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
    	'section'     => 'big_callout'
      ),
        array(
            'label'       => 'Big Callout Title',
            'id'          => 'big_callout_title',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => '',
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
            'std'         => '',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => 'big_callout'
          ),
           array(
            'label'       => 'Big Callout CTA Label',
            'id'          => 'big_callout_ctaLabel',
            'type'        => 'textarea-simple',
            'desc'        => 'Label for big callout\'s call to action button.',
            'std'         => '',
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
        'std'         => '',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'big_callout'
      ),
// 3 callout boxes
          array(
        'label'       => 'Show Three Small Callout Boxes On Front Page? ?',
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
    	'section'     => '3_callout'
    ),
    //box 1
    	array(
            'label'       => 'Small Callout Box 1 Title',
            'id'          => '3_callout_title1',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 1 Link',
            'id'          => '3_callout_Link1',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the first small callout box.',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 1 Content',
            'id'          => '3_callout_content1',
            'type'        => 'textarea',
            'desc'        => 'Text for the first callout box.',
            'std'         => '',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 1 Background Image',
        'id'          => '3_callout_img1',
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
            'id'          => '3_callout_title2',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 2 Link',
            'id'          => '3_callout_Link2',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the second small callout box.',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 2 Content',
            'id'          => '3_callout_content2',
            'type'        => 'textarea',
            'desc'        => 'Text for the second callout box.',
            'std'         => '',
            'rows'        => '40',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 2 Background Image',
        'id'          => '3_callout_img2',
        'type'        => 'upload',
        'desc'        => 'Background image for the second small callout box.',
        'std'         => '',
        'rows'        => '40',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => '3_callout'
      ),
      //box 3
    	array(
            'label'       => 'Small Callout Box 3 Title',
            'id'          => '3_callout_title3',
            'type'        => 'textarea-simple',
            'desc'        => 'Title For the big callout box',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 3 Link',
            'id'          => '3_callout_Link3',
            'type'        => 'textarea-simple',
            'desc'        => 'Link for title of the third small callout box.',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
            'label'       => 'Small Callout Box 3 Content',
            'id'          => '3_callout_content3',
            'type'        => 'textarea',
            'desc'        => 'Text for the third callout box.',
            'std'         => '',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'section'     => '3_callout'
          ),
        array(
        'label'       => 'Small Callout Box 3 Background Image',
        'id'          => '3_callout_img3',
        'type'        => 'upload',
        'desc'        => 'Background image for the third small callout box.',
        'std'         => '',
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