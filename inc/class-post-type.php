<?php
if ( ! defined( 'WPINC' ) ) { die; }
/*
    Dependencies
        class-meta-box.php
        class-taxonomy.php
        class-pt_shortcodes.php
        functions.php

    The reason for the Dependencies lies in the reg_* methods, which
    directly use these classes in order to register meta or taxes to the
    post type. 

    This class allows the easy addition of a post type to a wordpress
    installation. Example:

        $pt_books = new MYPLUGIN_post_type("Books", "Book", "pt_books");

    Will generate a post type for "books". Run this in the core plugin file. 



    Additional methods within the class can be ran to add more functionality,
    for instance...

        $pt_books->reg_tax("Authors", "Author", "tax_authors");

        $pt_books->reg_meta('Price', 'The Cost of Item');

    Using the methods reg_tax and reg_meta we just created new taxonomies and
    meta boxes for this post type. 


    The slug for the post type is generated as pt_name (singluar, all lower case). 

*/

if ( ! get_theme_support( 'post-thumbnails' )) add_theme_support('post-thumbnails');

class MYPLUGIN_post_type{

    var $name;
    var $name_s;
    var $pt_slug;  

    //All actions to be performed goes here. 
    //Name, Name Singular, Slug
    public function __construct($name, $name_s ){
        $this->name = $name;
        $this->name_s = $name_s;
        $this->pt_slug = "pt_" . trim(strtolower($name_s));
        new MYPLUGIN_pt_sc($this->pt_slug);//Creates Shortcodes

        add_action( 'init', array($this, 'initiate_cpt'), 0 );
    }

    public function reg_tax($name, $name_s ){
        new MYPLUGIN_pt_tax($name, $name_s, $this->pt_slug );
    }
    public function reg_meta($title, $desc, $typ = "text", $options = null){
        new MYPLUGIN_pt_meta($title, $desc, $this->pt_slug, $typ, $options );
    }

    public function initiate_cpt(){

        $name = $this->name;
        $name_s = $this->name_s;
        $pt_slug = $this->pt_slug; 

        $labels = array(
            'name'                => _x($name, 'Post Type General Name'), 
            'singular_name'       => _x($name_s, 'Post Type Singular Name', 'twentythirteen'),
            'menu_name'           => __($name, 'twentythirteen'),
            'parent_item_colon'   => __('Parent ' . $name_s, 'twentythirteen'),
            'all_items'           => __( 'All ' .  $name, 'twentythirteen' ),
            'view_item'           => __( 'View ' . $name_s, 'twentythirteen' ),
            'add_new_item'        => __( 'Add New ' . $name_s, 'twentythirteen' ),
            'add_new'             => __( 'Add New', 'twentythirteen' ),
            'edit_item'           => __( 'Edit ' . $name_s, 'twentythirteen' ),
            'update_item'         => __( 'Update ' . $name_s, 'twentythirteen' ),
            'search_items'        => __( 'Search ' . $name_s, 'twentythirteen' ),
            'not_found'           => __( 'There are currently no '. $name, 'twentythirteen' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
        );

        $args = array(
            'label'               => __( $name, 'twentythirteen' ),
            'description'         => __( 'Contains the post data for ' . $name_s . ".", 'twentythirteen' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'menu_icon'           => "dashicons-media-document",
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type( $pt_slug , $args );
    }
}