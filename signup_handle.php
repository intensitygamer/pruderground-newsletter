<?php


add_action("wp_ajax_nr_pru_signup", "nr_pru_signup");

add_action("wp_ajax_nopriv_nr_pru_signup", "nr_pru_signup");

function nr_pru_signup(){

    if ( !check_ajax_referer( 'pru-nr-security-code', 'security' ) ) {
        exit("Intruder Alert");
     }

    header('Content-type: application/json');


    if(empty($_POST['pru_nl_name']) || empty($_POST['pru_nl_email'])){

        $result['is_success']   = false;
        $result['message']      = "All fields are required!";
        echo json_encode($result);

        exit;
    }

    $pru_nl_name    =   esc_attr($_POST['pru_nl_name']);
    $pru_nl_email   =   esc_attr($_POST['pru_nl_email']);
    $ip_addr        =   $_SERVER['REMOTE_ADDR'];

    //* Insert to DB After verification

    global $wpdb;

    $wpdb->query("INSERT INTO ". PRU_NL_SIGNUP_TABLE ."(username, user_email, ip_addr)

                                    VALUES('$pru_nl_name', '$pru_nl_email', '$ip_addr')

                ");

    $result['is_success']   = true;
    $result['message']      = "You have successfully signed up!";

    echo json_encode($result);

    exit;
}