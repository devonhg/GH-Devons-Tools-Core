<?php
if ( ! defined( 'WPINC' ) ) { die; }
/*
 * Plugin Name:       Devons Tools - Core
 * Plugin URI:        
 * Description:       This is the Core for Devons Tools Framework
 * Version:           1.3
 * Author:            Devon Godfrey
 * Author URI:        http://playfreygames.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

	Plugin is based on Devons Tools 1.1

	*IMPORTANT*
	do a "find/replace" accross the directory for "MYPLUGIN" and replace
	with your plugin name. 

	Any files put into the js, inc, or css folders automatically get 
	included or enqeued. Files put into the root of these folders for 
	js or css get enqeued to the front end, while anything put into
	'admin' folder gets enqeued into the back-end. 

	This file, as the core file, is where you address and utilize the 
	classes in the inc folder. In order to separate engine from commands
	do not have any "development" code in the inc folder, do all that here. 

	**Functions and Shortcodes***

		Functions

		MYPLUGIN_single( $archive = false, $display = null , $pt = null, $post_slug = null ) 
			This function will display the specified single post. Should be
			used in the themes single.php file to generate content. Do note 
			that $post_slug can also be an id. 

			This is probably the most important function, as it's used to display
			the custom post type for single.php and archive.php

			For each one, a simple conditional must be set up.

			//This is for single.php

				if ($post->post_type == 'post'){
					//original content
				}else{
					echo MYPLUGIN_single( false );
				}

				For archive.php, set the "archive" argument to true. 

		Values

			PT Slug: Post Type slug is always pt_PTNAMESINGULAR

			So for instance a post type for "books" would be pt_book. 

		Shortcodes

			[ptslug_single entry='2']

			This shortcode displays an single entry, an ID or slug can be passed.

			[ptslug_archive args='argument']

			This shortcode displays an archive of the specified post type. Args goes
			straight into a WP_Query function so you can customize the output. 


*/

define("MYPLUGIN_HOME_DIR", plugin_dir_path( __FILE__ ));
define("MYPLUGIN_HOME_URL", plugin_dir_url( __FILE__ ));

include_once( MYPLUGIN_HOME_DIR . "framework/class-devons_tools_core.php" );

/*
===========================================
	Edit everything below this comment!
===========================================
*/



$pt_books = new MYPLUGIN_post_type( "Books", "Book" );

//echo $pt_books->pt_slug; 

$pt_books->reg_tax("Genres", "Genre" );
$pt_books->reg_tax("Authors", "Author" );

$pt_books->reg_meta('Price', 'The Cost of Item');
$pt_books->reg_meta('Weight', 'The Weight of Item');
$pt_books->reg_meta('Cover', 'The Cover Type', "radio", array("Hardcover", "Softcover"));
$pt_books->reg_meta('Color', 'The Color', "color");