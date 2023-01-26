<?php




function nl_pru_plugin_activate(){

     do_action( 'load_pru_nl_plugin_activation' );

}

register_activation_hook( __FILE__, 'nl_pru_plugin_activate' );

function load_pru_nl_plugin_activation(){

    global $wpdb;

    $charset = $wpdb->get_charset_collate();

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


    if($wpdb->get_var("SHOW TABLES LIKE ". PRU_NL_SIGNUP_TABLE) != PRU_NL_SIGNUP_TABLE) {


        $sql = "CREATE TABLE  ". PRU_NL_SIGNUP_TABLE  . " (

            user_id int(10) unsigned NOT NULL AUTO_INCREMENT,
            username varchar(255) NOT NULL,
            user_email varchar(255) NOT NULL,
            ip_addr varchar(255) NOT NULL,

            PRIMARY KEY (user_id)

            ) ENGINE=InnoDB DEFAULT CHARSET=$charset;";


        $result = dbDelta( $sql );

    }

}

add_action('admin_init', 'load_pru_nl_plugin_activation');

