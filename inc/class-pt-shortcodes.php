<?php
if ( ! defined( 'WPINC' ) ) { die; }
/*
	The purpose of this class is to register post-type specific shortcodes.
	Using the structure below these shortcodes become available and associated
	with the specified post type. 
*/

add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

class MYPLUGIN_pt_sc{
    
	var $pt;

    //This is the method that actually applies the shortcodes. 
    public function __construct($pt){
    	$this->pt = $pt;

        add_shortcode( $pt . '_archive', array( $this, 'display_archive_f'));
        add_shortcode( $pt . '_single', array( $this, 'display_single_f'));
    }
    
    //This shortcode runs and shows the archive of a 
    //given post type. 
    public function display_archive_f($atts){
         extract( shortcode_atts( array(
            'wpargs' => '',
            'title' => true,
            'fi' => true, 
            'meta' => true,
            'content' => true,
            'cats' => true,  
        ), $atts ) );       

        $args = array(
            'isTitle' => ($title == 'true' ),
            'isFI' => ($fi == 'true'),
            'isMeta' => ($meta == 'true'),
            'isContent' => ($content == 'true'),
            'isCats' => ($cats == 'true'), 
        );

    	return MYPLUGIN_archive( $args , $wpargs , $this->pt); 
    }

    public function display_single_f($atts){

        extract( shortcode_atts( array(
            'entry' => '',
            'title' => true,
            'fi' => true, 
            'meta' => true,
            'content' => true,
            'cats' => true,  
        ), $atts ) );

        $args = array(
            'isTitle' => ($title == 'true' ),
            'isFI' => ($fi == 'true'),
            'isMeta' => ($meta == 'true'),
            'isContent' => ($content == 'true'),
            'isCats' => ($cats == 'true'), 
        );

        return MYPLUGIN_single( false, $args , $this->pt, $entry );

    }

}

