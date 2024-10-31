<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

    // global $wpdb;
    // $wpdb->query( "DROP TABLE IF EXISTS TABLE_NAME" );

    delete_option('oc_selectedserver');
    delete_option('oc_appname');
    delete_option('oc_apptype');
    delete_option('oc_clientid');
    delete_option('oc_clientsecret');
    delete_option('oc_clientscope');
    delete_option('oc_client_authorization');
    delete_option('oc_client_token_endpoint');
    delete_option('oc_client_userinfo_endpoint');
    delete_option('oc_client_request_in_header');
    delete_option('oc_client_request_in_body');
    delete_option('settings_saved');
    delete_option('oc_uname');
    delete_option('oc_uemail');
    delete_option('restrictWPUserCreation');
    delete_option('test_configuration');
    delete_option('test_data_format');
    