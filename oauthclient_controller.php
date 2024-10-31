<?php
/*
Plugin Name: OAuth client login for WordPress.
Plugin URI: https://www.securiseweb.com
Description: Login and authenticate Wordpress users using OAuth Server credentials
Version: 3.1.1
Author: steve06
Author URI: https://www.securiseweb.com
*/

require_once 'oauthclient_layout.php';
require_once 'oauthclient_authenticate.php';
require_once 'oauthclient_feedback_form.php';
require_once 'licensing_plans.php';
require_once 'Assets/services/customerUtility.php';
require_once(ABSPATH . 'wp-admin/includes/plugin.php');



class oc_oauthclient_controller
{

  protected static $instance = NULL;

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  public function __construct()
  {

    add_action('admin_menu', array($this, 'addMenuPage'));
    add_action('init', array($this, 'save_oauthclient_config'));

    register_uninstall_hook(__FILE__, 'deletePluginDB');
    add_action('admin_footer', array($this, 'feedbackDisplay_form'), 20);
    register_activation_hook(__FILE__, array($this, 'lwliad_activate_oauth_plug'));

    add_action('login_form', array($this, 'wp_sso_login_form_button'));
    register_uninstall_hook(__FILE__, 'deletePluginDB');
  }

  function addMenuPage()
  {
    add_menu_page('oauthclient', 'OAuth Client', 'manage_options', 'OAuth Client authentication intergrating with OAuth Server', 'oc_oauthclient_layout');
  }

  function lwliad_activate_oauth_plug()
  {
    $user = wp_get_current_user()->user_login;
    $userEmail = wp_get_current_user()->user_email;
    contact::contactUs($user, $userEmail, 'Activated', 'User has activated the plugin.');
    wp_redirect('plugins.php');
  }



  function save_oauthclient_config()
  {

    if (isset($_GET['loginaction']))
      if ('oauthclientlogin' == $_GET['loginaction']) {


        if (isset($_GET['getattributes']) && $_GET['getattributes'] == true)
          setcookie("getattributes", true);
        else
          setcookie("getattributes", false);


        OAuthClientauthenticate::authorizationendpoint();
      }


    if (isset($_GET['code'])) {
      $token_endpoint_url = get_option('oc_client_token_endpoint');
      $base_url = home_url();

      if (get_option('oc_apptype') != NULL && get_option('oc_apptype') == 'OpenIdConnect') {
        //OpenId flow

        $tokenIdResponse = OAuthClientauthenticate::getIdToken($token_endpoint_url, $base_url, get_option('oc_clientid'),  get_option('oc_clientsecret'), $_GET['code'], 'authorization_code');

        $idToken = isset($tokenIdResponse["id_token"]) ? $tokenIdResponse["id_token"] : $tokenIdResponse["access_token"];

        if (!$idToken)
          exit('Invalid token received.');
        else
          $user_info = OAuthClientauthenticate::get_user_info_from_IdToken($idToken);
      } else {

        //OAuth Flow
        $oauth_access_token = OAuthClientauthenticate::call_to_token_endpoint($token_endpoint_url, $base_url,  get_option('oc_clientid'), get_option('oc_clientsecret'), $_GET['code'], 'authorization_code');

        if (isset($oauth_access_token)) {
          $userinfo_endpoint_url = get_option('oc_client_userinfo_endpoint');
          $user_info = OAuthClientauthenticate::call_to_user_info_endpoint($userinfo_endpoint_url, $oauth_access_token['access_token']);
        }
      }


      if (isset($user_info) && $user_info && isset($_COOKIE['getattributes'])) {
        update_option('test_configuration', 'success');
        update_option('test_data_format', $user_info);

        self::showAttributeslist($user_info);
        unset($_COOKIE['getattributes']);

        exit;
      } else if (isset($user_info) && $user_info) {

        $user_info = self::makeNonNested($user_info);
        self::lwliad_jylhalvysvnpu($user_info);
      }
    }

    if (self::oc_is_site_admin() && isset($_POST['action'])) {
      if ($_POST['action'] == 'oauthconfig') {


        if (isset($_POST['OAuthConfig_nonce']) && !empty($_POST['OAuthConfig_nonce']) && wp_verify_nonce(sanitize_key($_POST['OAuthConfig_nonce']), 'OAuthConfig_nonce')) {



          update_option('oc_selectedserver', isset($_POST['oauthservers']) ? sanitize_text_field($_POST['oauthservers']) : '');
          update_option('oc_appname', isset($_POST['app_name']) ? sanitize_text_field($_POST['app_name']) : '');
          update_option('oc_apptype', isset($_POST['app_type']) ? sanitize_text_field($_POST['app_type']) : '');
          update_option('oc_clientid', isset($_POST['client_id']) ? sanitize_text_field($_POST['client_id']) : '');
          update_option('oc_clientsecret', isset($_POST['client_secret']) ? sanitize_text_field($_POST['client_secret']) : '');
          update_option('oc_clientscope', isset($_POST['client_scope']) ? sanitize_text_field($_POST['client_scope']) : '');
          update_option('oc_client_authorization', isset($_POST['client_authorization']) ? sanitize_text_field($_POST['client_authorization']) : '');
          update_option('oc_client_token_endpoint', isset($_POST['client_token_endpoint']) ? sanitize_text_field($_POST['client_token_endpoint']) : '');
          update_option('oc_client_userinfo_endpoint', isset($_POST['client_userinfo_endpoint']) ? sanitize_text_field($_POST['client_userinfo_endpoint']) : '');
          update_option('oc_client_request_in_header', isset($_POST['rquest_in_header']) ? sanitize_text_field($_POST['rquest_in_header']) : '');
          update_option('oc_client_request_in_body', isset($_POST['rquest_in_body']) ? sanitize_text_field($_POST['rquest_in_body']) : '');

          update_option('settings_saved', 'saved');
          $attbtn = '<input type="button" class="buttons_style" style="text-decoration: none;width: auto;border-radius: 4px !important; background-color: #ea530be8;" onclick="scrollto(\'basicattributemapping\');" value="fill attributes"/>';
          self::success('Successfully saved the OAuth configuration. Before you can enable SSO, you must first configure the email and username attributes by clicking on ', $attbtn);
        }
      } else if ($_POST['action'] == 'attributemapping') {

        if (isset($_POST['attributemapping_nonce']) && !empty($_POST['attributemapping_nonce']) && wp_verify_nonce(sanitize_key($_POST['attributemapping_nonce']), 'attributemapping_nonce')) {

          update_option('oc_uname', isset($_POST['uname']) ? sanitize_text_field($_POST['uname']) : '');
          update_option('oc_uemail', isset($_POST['uemail']) ? sanitize_text_field($_POST['uemail']) : '');
          update_option('saved_attribute_mapping', 'success');

          $ssolink = 'The SSO button link can be found on the <b style="font-size:1rem">Login Settings</b> tab';
          self::success('The Attribute Mapping was successfully saved. ', $ssolink);
        }
      } else if ($_POST['action'] == 'saveSettingsForm') {
        if (isset($_POST['saveSettingsForm_nonce']) && !empty($_POST['saveSettingsForm_nonce']) && wp_verify_nonce(sanitize_key($_POST['saveSettingsForm_nonce']), 'saveSettingsForm_nonce')) {
          update_option('restrictWPUserCreation', isset($_POST['restrictWPUserCreation']) ? sanitize_text_field($_POST['restrictWPUserCreation']) : '');
          if (get_option('restrictWPUserCreation') == 'on') {
            self::success('Enabled the check to restrict WP User Creation.');
          } else {
            self::success('Disabled the check to restrict WP User Creation.');
          }
        }
      } elseif ($_POST['action'] == 'contactUsForm') {

        if (isset($_POST['contactUs_nonce']) && !empty($_POST['contactUs_nonce']) && wp_verify_nonce(sanitize_key($_POST['contactUs_nonce']), 'contactUs_nonce')) {

          $customer_name = "";
          $customer_email = "";
          $email_title = "";
          $customer_message = "";


          if (isset($_POST['customer_name'])) {
            $customer_name = str_replace(array("\r", "\n", "%0a", "%0d"), '', sanitize_text_field($_POST['customer_name']));
          }
          if (isset($_POST['customer_email'])) {
            $customer_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', sanitize_text_field($_POST['customer_email']));
            $customer_email = filter_var($customer_email, FILTER_VALIDATE_EMAIL);
          }
          if (isset($_POST['email_title'])) {
            $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
          }
          if (isset($_POST['customer_message'])) {
            $customer_message = sanitize_text_field($_POST['customer_message']);
          }
          $result = contact::contactUs($customer_name, $customer_email, $email_title, $customer_message);
          if (isset($result) && $result === "Email sent!!") {
            self::success("successfully email sent...");
          } else {
            self::error("Sending failed. Please try again or drop mail directly to the mail-id securiseweb@gmail.com");
          }
        }
      } elseif ($_POST['action'] == 'feedbackform') {

        if (isset($_POST['feedback_nonce']) && !empty($_POST['feedback_nonce']) && wp_verify_nonce(sanitize_key($_POST['feedback_nonce']), 'feedback_nonce')) {

          $customer_name = "";
          $customer_email = "";
          $customer_message = "";



          if (isset($_POST['hasskiped'])  && !empty($_POST['hasskiped'])) {
            $user = wp_get_current_user()->user_login;
            $userEmail = wp_get_current_user()->user_email;
          }


          if (isset($_POST['customer_name']) && !empty($_POST['customer_name'])) {
            $customer_name = str_replace(array("\r", "\n", "%0a", "%0d"), '', sanitize_text_field($_POST['customer_name']));
          } else {
            if (isset($_POST['hasskiped'])) {
              $customer_name = $user;
            }
          }
          if (isset($_POST['customer_email'])  && !empty($_POST['customer_email'])) {
            $customer_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', sanitize_text_field($_POST['customer_email']));
            $customer_email = filter_var($customer_email, FILTER_VALIDATE_EMAIL);
          } else {
            if (isset($_POST['hasskiped'])) {
              $customer_email = $userEmail;
            }
          }

          if (isset($_POST['customer_message'])  && !empty($_POST['customer_message'])) {
            $customer_message = json_encode(sanitize_text_field($_POST['customer_message']));
          } else {
            if (isset($_POST['hasskiped'])) {
              $customer_message = 'skipped';
            }
          }

          contact::feedback($customer_name, $customer_email, $customer_message);
          deactivate_plugins(__FILE__);
          wp_redirect('plugins.php');
        }
      }
    }
  }


  function feedbackDisplay_form($array)
  {
    oc_feedbackForm();
  }

  function lwliad_jylhalvysvnpu($userinfo)
  {


    $user_id = Self::lwliad_joljr_DW_bzly($userinfo[get_option('oc_uemail')]);


    if (get_option('restrictWPUserCreation') == 'on' && $user_id == NULL) {
      wp_redirect(site_url('wp-login.php?registration=disabled'));
      exit;
    } else {
      $user_info = array();
      $user_info['first_name'] = $userinfo[get_option('oc_uname')];
      $user_info['user_email'] = $userinfo[get_option('oc_uemail')];
      $user_info['user_login'] = $userinfo[get_option('oc_uname')];

      if ($user_id) {
        $user_info['ID'] = $user_id;
        $user = wp_update_user($user_info);
      } else {
        $user_info['user_pass'] =  wp_generate_password(12, false);
        $user = wp_insert_user($user_info);
      }

      wp_set_current_user($user);
      wp_set_auth_cookie($user);
      $user  = get_user_by('ID', $user);
      update_option('user_sso', 'success');
      do_action('wp_login', $user->user_login, $user);
      wp_redirect(home_url());
      exit;
    }
  }

  function showAttributeslist($user_info)
  {

    $attribute_keys = array();
    if ($user_info) {
      echo'<div  id="wrapper">';
      echo '<tr><td colspan="2"> <b>Note: </b>You need to copy the <b>Attribute Name</b> and save in the Attribute Mapping which is below the configuration</td></tr><br><br>';
      echo '<table style="width: 90%" >';
      echo '<tr style="background-color: #009879; border: 1px solid #999; color: #ffffff; padding: 0.5rem; text-align: center;"><td >Attribute Name</td><td >Attribute Value</td></tr>';



      $user_info = self::makeNonNested($user_info);

      foreach ($user_info as $key => $value) { {
          $attribute_keys[] = $key;
          echo "<tr><td style='border: 1px solid #999; padding: 0.5rem; text-align: left;'>" . esc_attr($key) . "</td><td style='border: 1px solid #999; padding: 0.5rem;text-align: left;'>" . implode('<br/>', (array)esc_attr($value)) . "</td></tr>";
        }
      }
      echo '<tr><td colspan="2"  style="padding-left: 40%"><input type="button" onClick="closeAndRefresh();" class="buttons_style" style="text-decoration: none;width: auto;border-radius: 4px !important; background-color: #ea530be8; cursor: pointer " id ="attribute-close-btn" value="Close"/></td></tr>';
      echo '</table></div> ';
?>
      <script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
        }
        function closeAndRefresh(){
          window.opener.location.reload();
          self.close();
        }
      </script>
      <?php
    }

    update_option('oc_attributes_names_received', $attribute_keys);
  }

  function lwliad_joljr_DW_bzly($username)
  {

    global $wpdb;

    $user_id = $wpdb->get_var($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_email= %s", $username));


    if ($user_id) {
      return $user_id;
    } else {
      return null;
    }
  }


  /* Notifications on success and error messages */


  public static function success($message, $button = NULL)
  {

    $class = 'notethick';
    printf('<div class="%1$s " style="margin-left:12rem;margin-top:2rem"><p>%2$s %3$s</p></div>', esc_attr($class), esc_html($message), $button);
  }


  function error($message)
  {
    $class = 'errornote';
    printf('<div class="%1$s" style="margin-left:12rem; margin-top:2rem"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
  }

  /**
   * Function wp_sso_login_form_button
   *
   * Add login button for SSO on the login form.
   * @link https://codex.wordpress.org/Plugin_API/Action_Reference/login_form
   */
  function wp_sso_login_form_button()
  {
?>
    <a style="color:#FFF; width:100%; text-align:center; margin-bottom:1em;" class="button button-primary button-large" href="<?php echo site_url('?loginaction=oauthclientlogin'); ?>"><?php echo esc_html('OAuth Single Sign On'); ?></a>
    <div style="clear:both;"></div>
<?php
  }

  function makeNonNestedRecursive(array &$out, $key, array $in)
  {
    foreach ($in as $k => $v) {
      if (is_array($v)) {
        self::makeNonNestedRecursive($out, $key . $k . '_', $v);
      } else {
        $out[$key . $k] = $v;
      }
    }
  }

  function oc_is_site_admin()
  {
    return in_array('administrator',  wp_get_current_user()->roles);
  }


  function makeNonNested(array $in)
  {
    $out = array();
    self::makeNonNestedRecursive($out, '', $in);

    return $out;
  }

  function deletePluginDB()
  {
    delete_option('test_configuration');
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
    delete_option('oc_uname');
    delete_option('oc_uemail');
    delete_option('saved_attribute_mapping');
    delete_option('settings_saved');
    delete_option('restrictWPUserCreation');
    delete_option('user_sso');
    delete_option('test_data_format');
    delete_option('oc_attributes_names_received');
  }
}

$OAuth_Client = oc_oauthclient_controller::getInstance();
