<?php

/*
Plugin Name: Advanced Custom Fields: Test Conditional
Plugin URI: -
Description: -
Version: 1.0.0
Author: -
Author URI: -
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'MyTestConditional' ) ) :

    class MyTestConditional {

        var $settings;

        function __construct() {

            $this->settings = [

                'version'   => '1.1.0',
                'url'       => plugin_dir_url( __FILE__ ),
                'path'      => plugin_dir_path( __FILE__ )

            ];

            add_action( 'acf/include_field_types', [ $this, 'include_field' ] );

        }

        function include_field( $version = false ) {

            load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ).'/lang' );

            include_once( 'fields/field.php' );

        }

    }

    new MyTestConditional;

endif;
