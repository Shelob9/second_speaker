<?php
    /**
     * I am The Great Deactivator. I can be used to remove unneeded stuff from the parent theme.

     * @since 1.2
     **/

    /**
     * Class to disable many things from _second-foundation parent theme
     *
     * @since 1.4
     */

    class _sf_great_deactivator {
        function __construct() {
            add_filter( '_sf_files_to_include', array($this, 'remover') );
            add_action( 'init', array($this, 'uncustom') );
            add_action( 'init', array($this, 'remove_scripts_styles') );
        }

        /**
         * Create an array of files included in parent functions.php to disallow
         *
         * @var array $removes Files to be disallowed.
         * @since 1.4
         */
        public $removes = array (

        );

        /**
         * Function to remove files when hooked to _sf_files_to_include filter from parent theme
         *
         * @var $files comes from the parent theme
         * @since 1.4
         */
        function remover( $files){
            if( ! empty($this->removes) ) {
                foreach ($this->removes as $remove) {
                    $bar_key = array_search( $remove, $files );
                }
                if ( FALSE !== $bar_key )
                    unset( $files[ $bar_key ] );
            }
            return $files;

        }

        /**
         * Get rid of parent theme's customizer related actions
         *
         * @since 1.4
         */
        public function uncustom() {
            remove_action('customize_register', '_sf_customize_register');
            remove_action( 'wp_before_admin_bar_render', '_sf_add_admin_bar_options_menu' );
            remove_action('admin_menu', '_sf_add_options_menu');
            remove_action('tha_header_top', '_sf_header');
        }

        /**
         * Array that determines which actions that add scripts/styles from parent theme are about to be removed.
         *
         * @since 1.4
         */
        public $what = array(
            'foundation'	=> false,
            'infScroll'		=> true,
            'masonry'		=> true,
            'backstretch' 	=> false,
            'ajaxMenu'		=> true,
            'imagesLoaded'	=> true,
        );

        /**
         * Remove Scripts and Styles
         *
         * @since 1.4
         */
        public function remove_scripts_styles() {
            /**Foundation**/
            if ($this->what['foundation'] != false) {
                remove_action( 'wp_enqueue_scripts', '_sf_scripts_foundation' );
                remove_action( 'wp_footer', '_sf_js_init_foundation' );
            }
            if ($this->what['infScroll'] != false) {
                /**Infinite Scroll**/
                remove_action( 'wp_enqueue_scripts', '_sf_scripts_infScroll' );
                remove_action( 'wp_footer', '_sf_js_init_infScroll' );
            }
            if ($this->what['masonry'] != false) {
                /**Masonry**/
                remove_action( 'wp_enqueue_scripts', '_sf_scripts_masonry' );
                remove_action( 'wp_footer', '_sf_js_init_masonry' );
            }
            if ($this->what['backstretch'] != false) {
                /**Backstretch**/
                remove_action( 'wp_enqueue_scripts', '_sf_scripts_backstretch' );
                remove_action( 'wp_footer', '_sf_js_init_backstretch' );
            }
            if ($this->what['ajaxMenu'] != false) {
                /**AJAX Menu**/
                remove_action( 'wp_enqueue_scripts', '_sf_scripts_ajaxMenus' );
                remove_action( 'wp_footer', '_sf_js_init_ajaxMenus' );
            }
        }


    }

    /**
     * Initialize
     *
     * @since 1.4
     */
    new _sf_great_deactivator;

