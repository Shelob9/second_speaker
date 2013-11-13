<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 11/13/13
 * Time: 12:37 AM
 */

    /**
     * Open it 12 wide
     *
     * @since 0.4
     */

    //functions for opening and closing .primary, .content
    if (! function_exists('_sf_open') ) :
    function _sf_open() {
                echo   '<div id="primary" class="content-area row primary-sidebar-none">';
                do_action( 'tha_content_before' );
                echo   '<div id="content" class="site-content large-12 columns" role="main">';
                do_action( 'tha_content_top' );


    }
    endif; //! _sf_open exists
    /**
     * Still add the sidebar, so we can hide it.
     *
     * @since 0.4
     */
    if (! function_exists('_sf_close') ) :
    function _sf_close() {
                do_action( 'tha_content_bottom' );
                echo   '</div><!-- #content -->';
                do_action( 'tha_content_after' );
                echo  get_sidebar();
                echo   '</div><!-- #primary -->';
                echo  get_footer();

    }
    endif; //! _sf_close exists
    /**
     * put sidebar on left
     *
     * @since 0.4
     */
    if (! function_exists('_sf_sidebar_starter') ) :
    function _sf_sidebar_starter($sidebar = 'value1') {
                echo '<div id="secondary" class="widget-area large-3 pull-9 columns" role="complementary">';


    }
    endif; // ! _sf_sidebar_starter exists