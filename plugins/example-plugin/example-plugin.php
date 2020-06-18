<?php 

/**
 * Plugin Name: Example Plugin
 * Description: Custom Plugin 
 * Version: 1.0
 * Author: Abdul Raffay Rizwan | Nytrotech
 */


//  Example Plugin
function example_function(){
    $content = "Basic Plugin";

    $content .= "<div>Div Tag</div>";
    $content .= "<p>P Tag</p>";

    return $content;
}
add_shortcode('example', 'example_function');



//  Site Script Plugin
function site_script_plugin(){

    // First Arg: Title of Admin Plugin Page
    // Second Arg: Name of Plugin
    // Third Arg: User access to manage options
    // Fourth Arg: Slug
    // Fifth Arg: Call Back Function to show how the page should be look like
    // Sixth Arg: Dashicon  (blanks mean setting icon default)
    // Seventh Arg: Position where to show
    add_menu_page(
        'Header and Footer Scripts', 
        'Site Scripts', 
        'manage_options', 
        'site-script',
        'header_footer_function_page',
        '',
        99
    );
}
add_action('admin_menu', 'site_script_plugin');
    // Callback Function
function header_footer_function_page(){

    if(isset($_POST['update_scripts'])){
        update_option('header_scripts', $_POST['header']);
        update_option('footer_scripts', $_POST['footer']);
        ?>

        <!-- WP Default Classes -->
        <div id="setting-error-settings-updated" class="updated settings-error notice is-dismissible">
            <h5>Scripts has been updated</h5>
        </div>

        <?php
    }

    // Retrieve Value from dB, 
        // if there is no value then the second argument is called which is to be default value
    $header_scripts = get_option('header_scripts', '');
    $footer_scripts = get_option('footer_scripts', '');

?>
    <!-- // Html here -->
    <div class="wrap">   <!-- Default Page Wrap Class by WP -->
        <h2>Update Scripts.</h2>
        <hr>

        <form method="post" action="#">
            <label for="header"><h4>Header Scripts</h4></label>
            <!-- Default Class by WP for large textarea -->
            <textarea name="header" id="header" class="large-text"><?php echo $header_scripts; ?></textarea>   
            
            <label for="footer"><h4>Footer Scripts</h4></label>
            <!-- Default Class by WP for large textarea -->
            <textarea name="footer" id="footer" class="large-text"><?php echo $footer_scripts; ?></textarea>  

            <hr>
            <!-- Default Class by WP for Button are used button button-primary -->
            <input type="submit" name="update_scripts" value="<?php echo ((!empty($header_scripts)) && (!empty($footer_scripts))) ? "Update" : "Insert"; ?> Scripts" class="button button-primary">
        </form>
    </div>

<?php 
}


?>