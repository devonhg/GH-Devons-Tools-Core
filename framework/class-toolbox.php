<?php
if ( ! defined( 'WPINC' ) ) { die; }

/*
	This is the toolbox class, it contains simple functions that makes things a little easier. 
*/

class MYPLUGIN_DFIW_tb{

	//Include or enqeue all files within a folder
    public static function include_folder( $dir, $ftype ){
    	$ftype = trim( $ftype, ".");

    	$dir = MYPLUGIN_DFIW_tb::validate_slashes( $dir ); 

    	foreach (glob( MYPLUGIN_HOME_DIR . $dir . "*." . $ftype ) as $filename){
			if ($ftype == "php"){
				include_once( $filename );
			}else if ($ftype == "css"){
				wp_enqueue_style( basename( $filename ) , MYPLUGIN_HOME_URL . $dir . basename( $filename ) );
			}else if ($ftype == "js"){
				wp_enqueue_script( basename( $filename ) , MYPLUGIN_HOME_URL . $dir . basename( $filename ) );
			}
		}
    }

    //This function takes an inputed directory and makes sure that 
    //there is no slash at the beginning and one at the end. 
    private static function validate_slashes( $dir ){
    	if ( $dir[0] == '/'){ $dir = ltrim ($dir, "/"); }
    	if ( substr($dir, -1) != "/"){ $dir .= "/"; }
    	return $dir; 
    }
}