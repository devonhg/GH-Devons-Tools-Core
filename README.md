#Devons Tools Core Beta 1.3
This is a core wordpress plugin for developing other plugins upon. It includes many features/functions that streamline the plugin development process. 

##Setup
Do a "find/replace" accross the directory for "MYPLUGIN" and replace
with your plugin name. This replaces all the class/function names with your
plugins so it will avoid clashing with other plugins that may happen
to use this framework. 

Once that is complete, simply zip it and install it on your test wordpress website. 

##Usage
Use the core php file for all your commands and drive them with classes in the inc folder for best results. A couple of classes
are included that make adding some wordpress features a snap. The strength of this tool is the ability to modually add classes to
the inc folder and utilize them without any additional code. 

#Post-Type Class

##Usage
In the core php file, declare an instance of the post-type class like so:  
`$pt_books = new MYPLUGIN_post_type( "Books", "Book" );`  
This creates a "Books" post type. You can of course address any properties or methods using the "$pt_books" variable. The reg_tax and reg_meta methods can then be used to add taxonomies and meta to the post type. 

`$pt_books->reg_tax("Genres", "Genre" );`  
`$pt_books->reg_meta('Price', 'The Cost of Item');`  


##Dependencies:   
class-meta-box.php  
class-pt-shortcodes.php  
class-taxonomy.php  
functions.php  

##Properties  
$name : The name of the post type.  
$name_s : The name of the post type, singular.   
$pt_slug : The slug of the post type.   

##Methods  
__construct($name, $name_singular) : This function of course represents the fields that must be filled out when first creating the post type 

reg_tax($name, $name_singular) : This method registers a taxonomy to the post type, creates an instance of the taxonomy class. Returns the class object (refer to Taxonomy Class). 

reg_meta($title, $desc, $type="text", $options = null) : Registers a meta to a post type, basically allows for additional options to be filled in for a post type. This creates an instance of the meta-box class. Returns the class object (Refer to Meta Class). 

The type options are as follows:  

"text" : A simple text-box input field. Default Value.   
"radio" : Radio buttons, options can be defined under the "options" argument as an array, ex: array(option1, option2, ..).    
"textarea" : A larger text area, good for large bodies of text.    
"color" : Uses the wordpress color picker for a color.    

All meta fields associated with a post type is shown as a list.   

#Taxonomy Class

##Usage
In the core php file we can include a taxonomy to a post-type manually, example:  
` $var = new MYPLUGIN_pt_tax("Genres", "Genre", "pt_book" ); `
The example will add the "Genres" to the post type "pt_book". 

Generally though, you will simply use the post type method. 

##Properties
$name : The name of the taxonomy
$name_s : The singular name
$tax_slug : The slug of the taxonomy
$pt_slug : The slug of the post type it's assigned to. 

#Meta Box Class
In the core php file we can include a meta box to a post type, it can be done so manually like so. 
` $var = MYPLUGIN_pt_meta("Price", "Cost of Item", "pt_book", $type = "text", $options = null) `
This manually adds the meta box "Price" the "pt_book" post type. Returns the class object of the post type. 

#Properties

$id : The id of the meta box, essentially the slug. 
$title : The title of the meta box.
$pt : The post type it's associated with. 
$desc : The descripion of hte post type. 
$val_key : The value key, usable in the "$instance" variable
$met_nonce : nonce value
$cust_box : Custom box Value
$new_field : New Field Value
$type : The type of meta box
$options : The options array. 
