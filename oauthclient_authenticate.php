<?php
//page can't get direct access
class OAuthClientauthenticate
{

    public static function authorizationendpoint()
    {

        $auth_code_url = get_option('oc_client_authorization');
        $client_id     = get_option('oc_clientid');
        $scope         = get_option('oc_clientscope');
        $state         = 'asdfghjklkjhgfdsa';

        $authorizationUrl = $auth_code_url . "?client_id=" . $client_id . "&scope=" . $scope . "&redirect_uri=" . home_url() . "&response_type=code&state=" . $state;

        if (session_id() == '' || !isset($session) && !headers_sent())
            session_start();

        header('Location: ' . $authorizationUrl);
        exit;
    }

    public static function getIdToken($token_endpoint_url, $redirect_uri, $client_id, $client_secret, $code, $grant_type)
    {
        $response = self::call_to_token_endpoint($token_endpoint_url, $redirect_uri, $client_id, $client_secret, $code, $grant_type);

        if (is_array($response))
            $data = $response;
        else
            $data = json_decode($response, true);
        if (isset($data["id_token"]) || isset($data["access_token"])) {
            return $data;
            exit;
        } else {
            echo 'Invalid response received from OpenId Provider.<br><br> <hr> Response :' . esc_attr($response);
            exit;
        }
    }


    public static function call_to_token_endpoint($token_endpoint_url, $redirect_uri, $client_id, $client_secret, $code, $grant_type)
    {

      
        $clientsecret =  $client_secret;
        if (get_option('oc_client_request_in_body')) {
            $body = array(
                'grant_type'    => $grant_type,
                'code'          => $code,
                'client_id'     => $client_id,
                'client_secret' => $clientsecret,
                'redirect_uri'  => $redirect_uri,
            );
        }else{

            $body = array(
                'grant_type'    => $grant_type,
                'code'          => $code,
                'client_id'     => NULL,
                'client_secret' => NULL,
                'redirect_uri'  => $redirect_uri,
            );

        }
        $headers = array(
            'Accept'  => 'application/json',
            'charset'       => 'UTF - 8',
            'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
            'Content-Type' => 'application/x-www-form-urlencoded',

        );


        $response   = wp_remote_post($token_endpoint_url, array(
            'method'      => 'POST',
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => $headers,
            'body'        => $body,
            'cookies'     => array(),
            'sslverify'   => false
        ));

        $response =  $response['body'];

        $response = json_decode($response, true);

      
        //$access_token = $response['access_token'];

        return $response;
    }

    public static function get_user_info_from_IdToken($id_token)
    {

        $id_array = explode(".", $id_token);
        if (isset($id_array[1])) {
            $id_body = base64_decode(str_pad(strtr($id_array[1], '-_', '+/'), strlen($id_array[1]) % 4, '=', STR_PAD_RIGHT));
            if (is_array(json_decode($id_body, true))) {
                return json_decode($id_body, true);
            }
        }
        
        echo 'Invalid response received.<br><b>Id_token : </b>' . esc_attr($id_token);
        exit;
    }

    public static function call_to_user_info_endpoint($resourceownerdetailsurl, $access_token)
    {


        $headers = array();
        $headers['Authorization'] = 'Bearer ' . $access_token;

        $response   = wp_remote_post($resourceownerdetailsurl, array(
            'method'      => 'GET',
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => $headers,
            'cookies'     => array(),
            'sslverify'   => false
        ));

        

        $response =  $response['body'];

        if (!is_array(json_decode($response, true))) {
            $response = addcslashes($response, '\\');
            if (!is_array(json_decode($response, true))) {
                echo "<b>Response : </b><br>";
                print_r($response);
                echo "<br><br>";
                exit("Invalid response received.");
            }
        }

        $data = json_decode($response, true);
        if (isset($data["error_description"])) {
            exit($data["error_description"]);
        } else if (isset($data["error"])) {
            exit($data["error"]);
        }

        


        return $data;
    }


    public static function genratestate()
    {

        return 0;
    }
}