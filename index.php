<?php
/**
* Plugin Name: Pruderground Newsletter
* Plugin URI:
* Description: Pruderground Newsletter popup modal
* Version: 1.0
* Author: Vinz
* Author URI:
**/

global $wpdb;

define('PRU_NL_SIGNUP_TABLE', $wpdb->prefix . "nl_signup_users");
define('PRU_NL_PLUGIN_SLUG', "pruderground-newsletter");

// Upon Plugin activation - creation of custom tables etc.

include 'activation.php';

//* Modals and Plugin Initialization


if(!verify_is_user_registered()){

    // Only needed to load if user haven't registered yet

    include 'plugin_init.php';

    include 'modal_funcs.php';

    include 'signup_handle.php';

}

// verify if device user is regsitered via ip address


function verify_is_user_registered(){

    $ip_addr = $_SERVER['REMOTE_ADDR'];

    global $wpdb;

    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM ". PRU_NL_SIGNUP_TABLE."
                        WHERE ip_addr = '$ip_addr'
                        LIMIT 1");
    return $rowcount;
}