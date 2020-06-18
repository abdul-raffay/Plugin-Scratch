<?php 

/**
 * Plugin Name: Example Plugin
 * Description: Custom Plugin 
 * Version: 1.0
 * Author: Abdul Raffay Rizwan | Nytrotech
 */

 function example_function(){
     $content = "Basic Plugin";

     $content .= "<div>Div Tag</div>";
     $content .= "<p>P Tag</p>";

     return $content;
 }

 add_shortcode('example', 'example_function');

?>