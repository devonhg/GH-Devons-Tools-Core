#Devons Tools Core Beta 1.3
This is a core wordpress plugin for developing other plugins upon. It includes many features/functions that streamline the plugin development process. 

##Setup
Do a "find/replace" accross the directory for "MYPLUGIN" and replace
with your plugin name. This replaces all the class/function names with your
plugins name and will avoid and clashing with other plugins that may happen
to use this framework. 

Once that is complete, simply zip it and install it on your test wordpress website. 

##Usage
Use the core php file for all your commands and drive them with classes in the inc folder for best results. A couple of classes
are included that make adding some wordpress features a snap. The strength of this tool is the ability to modually add classes to
the inc folder and utilize them without any additional code. 

#Built-In Features and Classes

##Post-Type Class
Dependencies: class-meta-box.php, class-pt-shortcodes.php, class-taxonomy.php, functions.php

Properties
$name : The name of the post type.
$name_s : The name of the post type, singular. 
$pt_slug : The slug of the post type. 

Methods
__construct($name, $name_singular) : This function of course represents the fields that must be filled out when first creating the post type 

reg_tax($name, $name_singular) : This method registers a taxonomy to the post type, creates an instance of the taxonomy class. 

reg_meta($title, $desc, $type="text", $options = null) : Registers a meta to a post type, basically allows for additional options to be filled in for a post type. The type optoisn are as follows: 
`
"text" : A simple text-box input field. 
"radio" : Radio buttons, options can be defined under the "options" argument as an array, ex: array(option1, option2, ..).
"textarea" : A larger text area, good for large bodies of text.
"color" : Uses the wordpress color picker for a color. 
`
All meta fields associated with a post type is shown as a list. 

