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

For further information, please refer to the wiki. 