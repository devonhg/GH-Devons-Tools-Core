<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

include_once( MYPLUGIN_HOME_DIR . '/framework/class-toolbox.php' ); 

//Include files in "includes" folder
MYPLUGIN_DFIW_tb::include_folder( "inc/" , "php" );

MYPLUGIN_DFIW_tb::include_folder( "inc/delay/" , "php" );

class MYPLUGIN_devons_tools_core {
    
    //All actions to be performed goes here. 
    public function __construct(){
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_css') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_js') );

        add_action( 'admin_print_scripts', array($this, 'enqueue_js_admin') );
        add_action( 'admin_print_styles', array($this, 'enqueue_css_admin') );
    }
    
    //Enqeue any css for the front end. 
    public function enqueue_css(){
		MYPLUGIN_DFIW_tb::include_folder( "css/" , "css" ); 
    }

    //Enqeue any css for dashboard.
    public function enqueue_css_admin(){
		MYPLUGIN_DFIW_tb::include_folder( "css/admin/" , "css" ); 
        wp_enqueue_style( 'wp-color-picker' ); 
    }    

    //Enqeue any js for the front end/
    public function enqueue_js(){ 
		MYPLUGIN_DFIW_tb::include_folder( "js/" , "js" ); 
    }

    //Enqeue any js for dashboard.
    public function enqueue_js_admin(){
		MYPLUGIN_DFIW_tb::include_folder( "js/admin/" , "js" ); 
        wp_enqueue_script( 'my-script-handle', MYPLUGIN_HOME_URL . "library/colorpicker.js" , array( 'wp-color-picker' ), false, true );	
    }
}

$dhg_core = new MYPLUGIN_devons_tools_core();