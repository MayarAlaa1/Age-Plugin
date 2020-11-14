<?php
/**
 * @package AgePlugin
 */
/*
Plugin Name: Age Plugin
Plugin URI: GIT URL
Description: Age custom plugin 
Version: 1.0.0
Author: Mayar Alaa
Author URI: www.linkedin.com/in/mayar-alaa-803083150
*/


add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu()
{
    add_menu_page('Test Plugin Page', 'Age Plugin', 'manage_options', 'test-plugin', 'test_init');
}

function api_func(){
    global $wpdb;
    $myArr = array();
    $wp_user_search = $wpdb->get_results('SELECT * FROM $wpdb->users');
    
    foreach ( $wp_user_search as $userid ) {
    
    $myArr[] = stripslashes($userid->display_name);
    
    }
    $myJSON = json_encode($myArr);
    echo $myJSON;
    die();

}

function test_init()
{
    add_action('rest_api_init', function () {

            register_rest_route('wl/v1', '/getusers', array(
            'methods' => WP_REST_Server::ALLMETHODS ,
            'callback' => 'api_func',
            'show_in_rest' => true,
            'args' => array(),
              'permission_callback' => function () {
               return true;
    }
          
        ));
    });
    alter_age();
    test_handle_post();
?>
    <h1>User Update!</h1>
    <h2>Add Age</h2>

    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form name="frm" action="#" method="post">
                <tr>
                    <td>User Email:</td>
                    <td>
                        <select name="user_id">
                            <?php
                            global $wpdb;
                            $getTest = "SELECT * FROM $wpdb->users";
                            $users = $wpdb->get_results($wpdb->prepare($getTest));
                            foreach ($users as $user) {
                            ?>
                                <option value=<?php echo $user->ID; ?>><?php echo $user->user_login; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> age:</td>
                    <td><input type="number" min="0" name="age"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Insert" name="ins"></td>
                </tr>
            </form>
        </tbody>
    </table>
    <?php
}

function alter_age()
{
    global $wpdb;
    $myUsers = $wpdb->get_row("SELECT * FROM wp_users");
    //Add column if not present.
    if (!isset($myUsers->age)) {
        $wpdb->query("ALTER TABLE wp_users ADD age INT(1)");
    }
}

function test_handle_post()
{
    if (isset($_POST['ins'])) {
        global $wpdb;

        $u_id = $_POST['user_id'];
        $age = $_POST['age'];
        if ($age > 0) {
            global $wpdb;
            $getTest = "
            UPDATE $wpdb->users SET age=$age WHERE id=$u_id
            ";
            $wpdb->get_results($wpdb->prepare($getTest));
    ?>
            <script>
                alert("User Updated");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("age should be a positive number");
            </script>
        <?php
        }

        ?>
        <meta http-equiv="refresh" content="1" />
<?php
        exit;
    }
}
