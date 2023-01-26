<?php

function pru_newsletter_plugin_scripts(){

    wp_enqueue_script( 'pru_newsletter-js', plugin_dir_url( __FILE__ ) .  'js/custom-script.js', array('jquery'));

    //* Check if User (via ip address) has already submit

    //wp_enqueue_script( 'pru_newsletter-js', plugin_dir_url( __FILE__ ) .  'js/custom-script.js');

    wp_enqueue_style( 'pru_newsletter-css', plugin_dir_url( __FILE__ ) .  'css/style.css');

    wp_localize_script( 'pru_newsletter-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php'), 'siteurl' => get_option('siteurl')));

}

add_action( 'wp_head', 'pru_newsletter_plugin_scripts' );
