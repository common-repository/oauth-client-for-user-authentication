<?php

class contact
{

    public static function  contactUs($username, $email, $subject, $message)
    {
        
        $browser_details =  isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Not Available';
        $wordpressVersion = isset(get_site_transient('update_core')->updates[0]->download)?get_site_transient('update_core')->updates[0]->download:'Not available';
        
      

        $url = 'https://2texq35kaj.execute-api.us-east-1.amazonaws.com/default/ContactUs?email=' . $email . '&name=' . $username . '&query=' . urlencode('[PHP Version: ' . phpversion() . "|  WP version: " . $wordpressVersion . ']:    ' . $message . ' <br> <b>HostName</b>: ' . home_url() . ' <br> browser_details  =' . $browser_details) . '&subject=' . urlencode($subject) . '&pluginName=' . urlencode('WP OAuth Client');

        $headers = array(
            'Accept'  => 'application/json',
            'charset'       => 'UTF - 8',
            'Content-Type' => 'application/x-www-form-urlencoded',

        );


        $response   = wp_remote_post($url, array(
            'method'      => 'POST',
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => $headers,
            //'body'        => $body,
            'cookies'     => array(),
            'sslverify'   => false
        ));

        return $response['body'];
    }

    public static function  feedback($username, $email, $message)
    {

        
        $browser_details =  isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Not Available';
        
        $user_sso = get_option('user_sso');
        $scope = get_option('oc_clientscope');
        $authorization_endpoint = get_option('oc_client_authorization');
        $current      = get_site_transient('update_core');

        $feedback_data_for_improvement = '<b>WordPress version :</b>  ' . $current->version_checked . '<br> <b>PHP version :</b> ' . phpversion() . '<br><b>App Name :</b> ' . get_option('oc_appname') . '<br><b>App Type : </b>' . get_option('oc_apptype') . '<br><b>Settings Saved :</b>' . get_option('settings_saved') . '<br><b>Test Configuration : </b>' . get_option('test_configuration') . '<br><b>Test Data Format : </b>' . json_encode(get_option('test_data_format'), true) . '<br> <b>Attribute Mapping:</b> ' . get_option('oc_uname') . '\'  \' ' . get_option('oc_uemail').'<br> <b>user_sso</b>:'.$user_sso.'<br> <b>browser details</b>: '.$browser_details.'<br><b>Scope: </b>'. $scope.'<br> <b> Authorization Endpoint:  '.$authorization_endpoint;

        //$curl = curl_init();
        $url = 'https://2texq35kaj.execute-api.us-east-1.amazonaws.com/default/ContactUs?email=' . $email . '&name=' . $username . '&query=' . urlencode($message . ' <br> <b>HostName:</b> ' . home_url() . '<br>' . $feedback_data_for_improvement) . '&subject=' . urlencode('FeedBack') . '&pluginName=' . urlencode('WP OAuth Client');

        $headers = array(
            'Accept'  => 'application/json',
            'charset'       => 'UTF - 8',
            'Content-Type' => 'application/x-www-form-urlencoded',

        );


        $response   = wp_remote_post($url, array(
            'method'      => 'POST',
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => $headers,
            //'body'        => $body,
            'cookies'     => array(),
            'sslverify'   => false
        ));

        return $response['body'];
    }
}
