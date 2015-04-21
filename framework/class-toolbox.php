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

        if ( file_exists( MYPLUGIN_HOME_DIR . $dir ) ){
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
    }

    //This function takes an inputed directory and makes sure that 
    //there is no slash at the beginning and one at the end. 
    private static function validate_slashes( $dir ){
    	if ( $dir[0] == '/'){ $dir = ltrim ($dir, "/"); }
    	if ( substr($dir, -1) != "/"){ $dir .= "/"; }
    	return $dir; 
    }

    //Creates a debug.txt file, enters values for testing. 
    public static function debug( $entry , $value ){
        $f = MYPLUGIN_HOME_DIR . "\debug.txt"; 
        if ( file_exists( $f ) ){
            $fc = file_get_contents( $f );

            //Convert string to associative array
            $mstr = explode("|",$fc);
            $a = array();
            foreach($mstr as $nstr )
            {   
                if (strpos($nstr, '=') !== FALSE ){
                    $narr = explode("=",$nstr);
                    $narr[0] = trim( str_replace("\x98","",$narr[0]) );
                    $ytr[1] = trim( $narr[1] );
                    $a[$narr[0]] =$ytr[1];
                }
            }

            $a[$entry] = $value;

            //Convert back to string
            $fo = http_build_query($a, '', '|'."\n");
            
            file_put_contents( $f , $fo );
        }else{
            file_put_contents( $f , $entry . '=' . $value . " | " );
        }
    }
}