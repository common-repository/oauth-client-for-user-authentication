<?php

function oc_oauthclient_layout()
{
    wp_enqueue_script("serverlist", plugins_url('/Assets/js/serverslist.js', __FILE__));
    wp_enqueue_script("guides", plugins_url('/Assets/js/guides.js', __FILE__));
    wp_enqueue_script("servernames", plugins_url('/Assets/js/select_server.js', __FILE__));
    wp_enqueue_script("scripts", plugins_url('/Assets/js/scripts.js', __FILE__));
    wp_enqueue_style("css_styles", plugins_url('/Assets/css/layout.css', __FILE__));



    isset($_GET['tab']) ? $active_tab = sanitize_text_field($_GET['tab']) : $active_tab = 'oauthclientconfig';

    if ($active_tab != 'license') {
?>


        <div class="wrap">

            <h2>Log into WordPress using OAuth Server Credentials <p class="errornote" style="color:red">We are always improving our product to provide you with a better experience. Any recommendations related to new features you're looking for, usability or report of bugs are always appreciated, and we strive to improve the product by implementing/fixing them. Please send us your suggestions via the contact Us form.</p>
            </h2>

            <h2 class="nav-tab-wrapper" style="border:none;">
                <!-- <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'accountSetup'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'accountSetup' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;">Account Setup</a> -->
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'oauthclientconfig'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'oauthclientconfig' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('OAuth Client Configuration'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'settings'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('Login Settings'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'registration'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'registration' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('Registration'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'attributemapping'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'attributemapping' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('Attribute Mapping'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'rolemapping'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'rolemapping' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('Role Mapping'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'help'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'help' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;"><?php echo esc_html('Help / Feature Request'); ?></a>
                <a href="<?php echo esc_url_raw(add_query_arg(array('tab' => 'license'), $_SERVER['REQUEST_URI'])); ?>" class="nav-tab <?php echo $active_tab == 'license' ? 'nav-tab-active' : ''; ?>" style="border-bottom:1px solid #ccc;">License Plan</a>


            </h2>

        </div>

        <!--better CSS purpose like container -->
    <?php
    }
    if ($active_tab === 'oauthclientconfig') oauthclientconfig();
    else if ($active_tab === 'settings') settings();
    else if ($active_tab === 'registration') wpoc_registration();
    else if ($active_tab === 'attributemapping') attributemapping();
    else if ($active_tab === 'rolemapping') rolemapping();
    else  if ($active_tab === 'help') oauth_help();
    else if ($active_tab === 'accountSetup') wpoc_accountSetup();
    else if ($active_tab === 'license') licensing_plans();

    ?>
    <div>
        <?php

        help_us(); ?>
    </div>


<?php }
function oauthclientconfig()
{

?>
    <div class="card_row">
        <div class="card">
            <h3> Configuration to OAuth Client </h3>
            <div class="sessionborder">
                <form id="oauthconfig" method="post" action="">
                    <input type="hidden" name="action" value="oauthconfig" />
                    <?php wp_nonce_field('OAuthConfig_nonce', 'OAuthConfig_nonce') ?>
                    <table class="server_config_table">
                        <tr>
                            <td>OAuth Server</td>
                            <td id="oc_oauthservernames">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" id="app_type" name="app_type" value="<?php echo esc_attr(get_option('oc_apptype')); ?>" hidden />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="app_name">App Name</label></td>
                            <td><input type="text" id="app_name" name="app_name" placeholder="Name your application" value="<?php echo esc_attr(get_option('oc_appname')); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>CallBack URL/ Redirect URL</td>
                            <td> <input type="text" id="callback_url" name="callback_url" style="width:25rem;" placeholder='.home_url().' value="<?php echo home_url(); ?>" readonly /> <button type="button" class="button gray oc-copy-to-clipboard" title="Copy to clipboard" onclick="oc_copy_to_clipboard( this )"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Client ID / Application ID</td>
                            <td> <input type="text" id="client_id" name="client_id" style="width:25rem;" placeholder="Enter the client ID received from the OAuth Server" value="<?php if (get_option('oc_clientid')) echo esc_attr(get_option('oc_clientid')); ?>" required />
                            </td>
                        </tr>

                        <tr>
                            <td>Client Secret</td>
                            <td> <input type="text" id="client_secret" name="client_secret" style="width:25rem;" placeholder="Enter the client Secret key received from the OAuth Server" value="<?php if (get_option('oc_clientsecret')) echo esc_attr(get_option('oc_clientsecret')); ?>" required />
                            </td>
                        </tr>

                        <tr>
                            <td>Scope</td>
                            <td> <input type="text" id="client_scope" name="client_scope" style="width:25rem;" placeholder="Enter the scope to receive the infromation/data from Server" value="<?php if (get_option('oc_clientscope')) echo esc_attr(get_option('oc_clientscope')); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>Authorization Endpoint</td>
                            <td> <input type="text" id="client_authorization" name="client_authorization" style="width:25rem;" placeholder="Enter the Authorization Endpoint URL from the Server" value="<?php if (get_option('oc_client_authorization')) echo esc_attr(get_option('oc_client_authorization')); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td>Token Endpoint</td>
                            <td> <input type="text" id="client_token_endpoint" name="client_token_endpoint" style="width:25rem;" placeholder="Enter the Token Endpoint URL from the server" value="<?php if (get_option('oc_client_token_endpoint')) echo esc_attr(get_option('oc_client_token_endpoint')); ?>" />
                            </td>
                        </tr>

                        <tr id="oc_userinfo_field">
                            <td>Userinfo Endpoint</td>
                            <td> <input type="text" id="client_userinfo_endpoint" name="client_userinfo_endpoint" style="width:25rem;" placeholder="Enter the Userinfo Endpoint URL" value="<?php if (get_option('oc_client_userinfo_endpoint')) echo esc_attr(get_option('oc_client_userinfo_endpoint')); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="opacity:0;"><input type="checkbox" name="rquest_in_header" id="rquest_in_header" value="send_with_header" <?php if (get_option('oc_client_request_in_header')) echo "checked" ?>>Send data with Header</td>
                            <td style="opacity:0;"><input type="checkbox" name="rquest_in_body" id="rquest_in_body" value="send_with_body" <?php if (get_option('oc_client_request_in_body')) echo "checked" ?>> Send data with Body</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="frame_for_button"><input class="buttons_style" type="submit" id="clientconfig" value="Save Configuration" /></td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php
            if ('OAuth' != get_option('oc_apptype')) { ?>
                <script>
                    document.getElementById("oc_userinfo_field").style.display = "none";
                </script>

            <?php } ?>
            <hr>
            <h3> Attribute Mapping</h3>
            <div class="sessionborder" id="basicattributemapping">

                <h4 style="color:red">(You need to fill in the attribute mapping to perform SSO. So the plugin can login/create the user in the wordpress using those attributes)</h4>

                <input type="button" class="buttons_style get_attr_button" value="Get Attributes" <?php if (!get_option('oc_clientsecret')) echo "disabled"; ?>onclick="getattributes();" />
                <p>To see the which attributes are coming from the oauth server, please click the button <i><b>Get Attributes</b></i> and log in with a user. You can change the scope to receive more attributes relatively.</p><br>
                <hr>
                <p style="color:red"><b>When the test configuration is successful, kindly reload the page. So, the dropdown will now provide a list of the available attributes from OAuth Server.</b></p>

                <form id="attributemapping" method="post" action="">
                    <input type="hidden" name="action" value="attributemapping" />
                    <?php wp_nonce_field('attributemapping_nonce', 'attributemapping_nonce') ?>
                    <table style="width: 100%;">

                        <tr>
                            <td> <label>username</label></td>
                            <td>

                                <select id="uname" name="uname" style="width:15rem;" placeholder="Select Attriubte Names">
                                    <?php

                                    $ADoptions = get_option('oc_attributes_names_received');
                                    if ($ADoptions) {
                                        foreach ($ADoptions as $option) {
                                    ?>

                                            <option value="<?php echo $option; ?>" <?php if ($option == esc_attr(get_option('oc_uname'))) {
                                                                                        echo "selected";
                                                                                    } ?>> <?php echo esc_attr($option); ?> </option>
                                    <?php

                                        }
                                    }
                                    ?>


                                </select>

                            </td>
                        </tr>


                        <tr>
                            <td>Email</td>


                            <td>

                                <select id="uemail" name="uemail" style="width:15rem;" placeholder="Select Attriubte Names">
                                    <?php

                                    $ADoptions = get_option('oc_attributes_names_received');


                                    if ($ADoptions) {
                                        foreach ($ADoptions as $option) {
                                    ?>

                                            <option value="<?php echo $option; ?>" <?php if ($option == esc_attr(get_option('oc_uemail'))) {
                                                                                        echo "selected";
                                                                                    } ?>> <?php echo esc_attr($option); ?> </option>
                                    <?php

                                        }
                                    }
                                    ?>


                                </select>



                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="frame_for_button"> <input class="buttons_style" type="submit" id="clientmapping" value="Save Attribute mapping" /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <br>
           

        </div>
        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">
            <p class="note"> <strong style="font-size: 18px;">Guide: </strong> Select the OAuth Server from the left panel drop down to find the relavent guide.</p>
            <p id="oauth_guide" class="note"><?php contactus() ?></p>
        </div>
    </div>

    <script>
        function getattributes() {

            let testWindow = window.open('<?php echo site_url(); ?>' + '/?loginaction=oauthclientlogin&getattributes=true', "Test Attribute Configuration", "width=600, height=600");
        }
    </script>

<?php
}


function oauth_help()
{
?>
    <div class="card_row">
        <div class="card">
            <div>
                <p class="notethick">For support or troubleshooting help please email us at <a href="mailto:mysteve06@gmail.com">mysteve06@gmail.com</a>.</p>

                <p> If you're looking for a new or specific functionality, please contact us. We would be happy to help and create for you.</p>
            </div>
        </div>
        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">

            <?php contactus() ?>
        </div>
    </div>


<?php
}
function help_us()
{ ?>
    <section class="container">
        <div class="outer-col">
            <div class="heading">Click for help with configuration.</div>
            <form action="" method="POST" id="contactUs" class="form-col">
                <input type="hidden" name="action" value="contactUsForm" />
                <h3 style="color:red"> Contact Us: We respond shortly and assist you with configuration.</h3>
                <?php wp_nonce_field('contactUs_nonce', 'contactUs_nonce') ?>
                <div class="elem-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="customer_name" name="customer_name" placeholder="username" required>
                </div>
                <div class="elem-group">
                    <label for="email">Your E-mail:</label>
                    <input type="email" id="customer_email" name="customer_email" placeholder="username@example.com" required>
                </div>
                <div class="elem-group">
                    <label for="title">Subject:</label>
                    <input type="text" id="email_title" name="email_title" required>
                </div>
                <div class="elem-group">
                    <label for="message">Write your Query:</label>
                    <textarea id="customer_message" name="customer_message" placeholder="" required style="height:5rem;"></textarea>
                </div>
                <button type="submit" class="contactUsButton ">Send Query</button>
            </form>

        </div>
    </section>


    <script>
        jQuery(function() {
            var hidden = true;
            jQuery(".heading").click(function() {
                if (hidden) {
                    if (jQuery(this).parent('.outer-col').length > 0) {
                        jQuery(this).parent('.outer-col').animate({
                            bottom: "0"
                        }, 1200);
                    } else {
                        jQuery('.outer-col').animate({
                            bottom: "0"
                        }, 1200);
                    }

                } else {
                    if (jQuery(this).parent('.outer-col').length > 0) {
                        jQuery(this).parent('.outer-col').animate({
                            bottom: "-399px"
                        }, 1200);
                    } else {
                        jQuery('.outer-col').animate({
                            bottom: "-399px"
                        }, 1200);
                    }

                }
                hidden = !hidden;
            });
        });
    </script>

<?php }

function settings()
{
?>
    <div class="card_row">
        <div class="card">
            <div style="margin-bottom:1.5rem;">
                <h3>Sign in URL</h3>
                <p class="notethick"> You can use the URL below to sign in using OAuth Server credentials. <b style="color:red">Please make sure you fill the Attribute Mapping from <i>OAuth Client Configuratin</i> Tab</b>. </p>
                <div class="signin_url">
                    <input type="text" id="sso_url" name="sso_url" style="width:25rem;" value="<?php echo site_url() . '/?loginaction=oauthclientlogin' ?>" readonly />

                    <button type="button" class="button gray oc-copy-to-clipboard" title="Copy to clipboard" onclick="oc_copy_to_clipboard( this )"></button>

                </div>
            </div>
            <hr />

            <div class="row" style="margin-bottom:1.5rem;">
                <div>

                    <div style="display: flex;">
                        <h3>Redirect after Auto-Login</h3>
                        <p style="color: red;">(It is being worked on and will be ready shortly)</p>
                    </div>
                    <div>
                        <input type="radio" id="redirect_dashboard" name="redirect" class="disabledOption" value="" disabled />
                        <label for="redirect_dashboard">Dashboard</label>
                        <br />
                        <input type="radio" id="redirect_homepage" name="redirect" class="disabledOption" value="" disabled />
                        <label for="redirect_homepage">Homepage</label>
                        <br />
                        <input type="radio" id="no_redirect" name="redirect" class="disabledOption" value="" disabled />

                        <label for="no_redirect">None</label>
                        <br />
                        <input type="radio" id="redirect_custom" name="redirect" class="disabledOption" value="" checked disabled />
                        <label for="redirect_custom">Custom</label>
                        <br /><br />
                        <input type="text" id="redirect_url" name="redirect_url" style="width:60%;" class="disabledOption" placeholder="Example: https://www.your-site.com/sample-page" disabled />
                        <p>After a successful SSO, the user will be forwarded to the page based on the above selected option.</p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row" style="margin-bottom:1.5rem;">
                <div>
                    <div>

                        <div style="display: flex;">
                            <h3>Redirect based on URL:</h3>
                            <p style="color: red;">(It is being worked on and will be ready shortly)</p>
                        </div>
                        <input type="checkbox" name="allow_usage_redirect_parameter" id="allow_usage_redirect_parameter" value="0" disabled class="disabledOption" />
                        <label for="allow_usage_redirect_parameter">
                            If 'redirect_Url' is specified in the request, allow redirect to a specific URL. This option will override any previously specified redirects.
                        </label>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="section-title">Only the following IP addresses are permitted to login:</h3>
                        <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                    </div>
                    <div class="form-group">
                        <input type="text" id="register_ip" name="register_ip" class="disabledOption" value="" placeholder="Enter IP here" disabled />
                        <p>
                            If you want to add more IPs, use a semicolon to separate them. To allow all IP addresses, leave the field blank.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">

            <?php contactus() ?>
        </div>
    </div>

<?php

}

function contactus()
{

?>
    <div class="note">
        <form action="" method="POST" id="contactUs" class="form-col" style="overflow:hidden; height:auto; border:none">
            <input type="hidden" name="action" value="contactUsForm" />
            <h3> Contact Us</h3>
            <?php wp_nonce_field('contactUs_nonce', 'contactUs_nonce') ?>
            <div class="elem-group">
                <label for="name">Your Name:</label>
                <input type="text" id="customer_name" name="customer_name" placeholder="username" required>
            </div>
            <div class="elem-group">
                <label for="email">Your E-mail:</label>
                <input type="email" id="customer_email" name="customer_email" placeholder="username@example.com" required>
            </div>
            <div class="elem-group">
                <label for="title">Subject:</label>
                <input type="text" id="email_title" name="email_title" required>
            </div>
            <div class="elem-group">
                <label for="message">Write your Query:</label>
                <textarea id="customer_message" name="customer_message" placeholder="" required style="height:5rem;"></textarea>
            </div>
            <button type="submit" class="contactUsButton">Send Query</button>
        </form>
    </div>
<?php
}
function attributemapping()
{
?>
    <div class="card_row">
        <div id="attributeTab" class="card">

            <div style="margin-top:0.5rem;">
                <div>
                    <h3> Map OAuth Server attributes to WP attributes </h3>
                    <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                </div>

                <form method="POST" action="">
                    <input type="hidden" name="action" value="attributeMappingSettings" />
                    <?php wp_nonce_field('attributeMappingSettings_nonce', 'attributeMappingSettings_nonce') ?>
                    <table style="width: 100%;">
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" id="ldapemail" name="ldapemail" style="width:100%;" value="" class="disabledOption" disabled placeholder="Enter OAuth Server attribute name" />
                            </td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>
                                <input type="text" id="oauthFirstName" name="ldapFirstName" style="width:100%;" class="disabledOption" value="" disabled placeholder="Enter OAuth Server attribute name" />
                            </td>


                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>
                                <input type="text" id="oauthLastName" name="ldapLastName" style="width:100%;" class="disabledOption" value="" disabled placeholder="Enter OAuth Server attribute name" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="frame_for_button"> <input type="submit" id="config" value="Save" class="buttons_style" disabled /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <hr />
            <div>
                <div style="display: flex;">
                    <h3> Customize Attribute Mapping</h3>
                    <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                </div>

                <div style="display: flex; flex-direction:row-reverse;">
                    <input type="button" value="Add Additional Attributes" style="width:fit-content;cursor:pointer;" class="buttons_style" onclick="addCustomFeilds('oauth_attribute_mapping')" />
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="testCustomizeMapping" />
                    <?php wp_nonce_field('testCutomizeMapping_nonce', 'testCutomizeMapping_nonce') ?>
                    <div id="oauth_attribute_mapping_setup">
                        <p>Add extra attributes in user WP profile.</p>
                        <div style="display: flex;" id="oauth_attribute_mapping_1" class="oauth_custom_attribute_item">
                            <input type="input" class="disabled_mappingfields" placeholder="Enter Attribute Name in WP User Profile" disabled />
                            <input type="input" class="disabled_mappingfields" placeholder="Enter OAuth Server attribute name" disabled />
                            <input type="button" value="remove" class="oauth_remove_button" id="remove_role_1" />
                        </div>
                    </div>

                    <div style="display: flex; margin-top:5%; justify-content:center; min-height:30px;">
                        <input type="button" value="Save Advance Attribute Mapping" style=" border-radius:8px;" disabled>
                    </div>
                </form>

            </div>
        </div>

        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">

            <?php contactus() ?>
        </div>
    </div>

<?php
}
function rolemapping()
{
?>
    <div class="card_row">
        <div class="card">

            <div>
                <div>
                    <form id="groups" method="POST" action="">
                        <input type="hidden" name="action" value="groupMappingSettings" />
                        <?php wp_nonce_field('groupMappingSettings_nonce', 'groupMappingSettings_nonce') ?>

                        <div style="display: flex;">
                            <h3> Role Mapping </h3>
                            <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                        </div>
                        <div>
                            <input type="checkbox" id="oauth_enabledefaultRole" name="oauth_enabledefaultRole" class="disabledOption" disabled> Enabling Role Mapping
                            <p style="font-style:italic;font-size:13px;">Default Role Mapping automatically maps users with the default WordPress role selected from below dropdown on SSO.</p>

                        </div>
                        <div>
                            <table style="width:100%;">
                                <tr>
                                    <td>Default Role:</td>
                                    <td>
                                        <select id="deaultRole" name="deaultRole" style="width: 93%; max-width:93%; margin-left: 39px;min-height: 30px;">
                                            <option value="none">Select Default user role</option>
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="contributor">Contributor</option>
                                            <option value="administrator">Administrator</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="frame_for_button"><input type="submit" value="Save" class="buttons_style" disabled></td>
                                </tr>

                            </table>
                        </div>
                    </form>


                </div>
            </div>

            <hr />

            <script>
                let temp = <?php echo (json_encode(get_option('ADgroups'))); ?>;
            </script>



            <div style="width: 100%; max-width:100%; margin-right:0%">
                <div style="display: flex;">
                    <h3> Customize Role Mapping</h3>
                    <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                </div>

                <div style="display: flex; flex-direction:row-reverse;">

                    <input type="button" value="Add Roles" style="width:fit-content; cursor:pointer;" class="buttons_style" onclick="addCustomFeilds('oauth_role_mapping')" />
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="oauth_testCustomizeMapping" />
                    <?php wp_nonce_field('testCutomizeMapping_nonce', 'testCutomizeMapping_nonce') ?>
                    <div id="oauth_role_mapping_setup">
                        <p> Map OAuth server Groups to Wordpress Roles.</p>
                        <div style="display: flex;" id="custom_role_1" class="oauth_custom_role_item">
                            <select style="width: 50%;margin-right: 24px;" placeholder="Enter Attribute Name in WP User Profile">
                                <option>Select WP Role.</option>
                                <option value="subscriber">Subscriber</option>
                                <option value="editor">Editor</option>
                                <option value="contributor">Contributor</option>
                                <option value="administrator">Administrator</option>
                            </select>
                            <input type="input" class="disabled_mappingfields" placeholder="Enter OAuth Server Group" disabled />
                            <input type="button" value="remove" class="oauth_remove_button" id="oauth_role_remove_item_1" />
                        </div>
                    </div>
                    <div style="display: flex; margin-top:5%; justify-content:center">
                        <input type="button" value="Save Role Mapping" class="buttons_style" disabled>
                    </div>
                </form>

            </div>
        </div>
        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">

            <?php contactus() ?>
        </div>



    </div>



    <script>
        jQuery('#ldapLogin').click(function() {
            if (jQuery('#ldapLogin').prop("checked") == true) {
                jQuery('#disableWPLogin').attr("disabled", false);
            } else {
                jQuery('#disableWPLogin').attr("disabled", true);
            }
        });
    </script>
<?php
}

function wpoc_registration()
{
?>
    <div class="card_row">
        <div class="card">
            <div style="margin-top:1.5rem;">
                <form action="" method="POST" id="saveSettings">
                    <input type="hidden" name="action" value="saveSettingsForm" />
                    <?php wp_nonce_field('saveSettingsForm_nonce', 'saveSettingsForm_nonce') ?>
                    <h3> Restrict new User to register.</h3>
                    <input type="checkbox" id="restrictWPUserCreation" name="restrictWPUserCreation" <?php if (get_option('restrictWPUserCreation') == 'on') {
                                                                                                            echo esc_attr('checked');
                                                                                                        } ?> /> Enable to restrict the user to create/Login
                    if user already not exist in WP.
                    <!-- <div style="display:flex; margin:1rem;">
                    <textarea id="reasonToRestrictWPUser" name="reasonToRestrictWPUser" style="padding:0px 8px; margin-bottom:0px;"><?php echo get_option('reasonToRestrictWPUser'); ?></textarea>
                    </div> -->
                    <div style="display: flex;
                                    text-align: center;
                                    justify-content: center;
                                    margin: 0.5rem;">
                        <button type="submit" class="buttons_style">Save Settings</button>
                    </div>
                </form>
            </div>
            <hr />
            <div class="row">
                <div>
                    <div>
                        <h3>Only the following IP addresses are permitted to register:</h3>
                        <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                    </div>
                    <div>
                        <input type="text" id="register_ip" name="register_ip" class="disabledOption" value="" disabled placeholder="Enter IP here" />
                        <p>If you want to add more IP's, separate them by semicolon. Leave blank to allow all IP addresses.
                        </p>
                    </div>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-md-12">

                    <div>
                        <h3> Only the following Domains are permitted to register :</h3>
                        <p style="color: red;">(It is being worked on and will be ready shortly.)</p>
                    </div>
                    <div>
                        <input type="text" id="register_domain" name="register_domain" class="disabledOption" value="" placeholder="Email domain" disabled />
                        <p>
                            For example, if you want to allow registration only for users that use their gmail account, add `gmail.com`.
                            For multiple domains, separate them by semicolon. Leave blank to allow all domains
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card " style="width: 40%; height: 24%; margin-left: 2rem;">

            <?php contactus() ?>
        </div>
    </div>


<?php
}
function wpoc_accountSetup()
{
?>
    <div class="card">
        <div>
            <form id="accountSetup" method="POST" action="">
                <input type="hidden" name="action" value="accountSetupSettings" />
                <?php wp_nonce_field('accountSetupSettings_nonce', 'accountSetupSettings_nonce') ?>

                <div style="display: flex;">
                    <h3> Account Setup </h3>
                </div>
                <table>
                    <tr>
                        <td><label>email:</label></td>
                        <td>
                            <input type="text" id="customer_email" name="customer_email" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label> password: </label></td>
                        <td><input type="password" id="customer_password" name="customer_password" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="buttons_style">Activate</button>
                        </td>
                    </tr>
                </table>


            </form>

            <form id="regsiter" method="POST" action="" style="display: none;">
                <input type="hidden" name="action" value="registerSetupSettings" />
                <?php wp_nonce_field('accountSetupSettings_nonce', 'accountSetupSettings_nonce') ?>
                <div style="display: flex;">
                    <h3>Register</h3>
                </div>
                <table>
                    <tr>
                        <td><label>username:</label></td>
                        <td>
                            <input type="text" id="customer_username" name="customer_username" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>email:</label></td>
                        <td>
                            <input type="text" id="customer_email" name="customer_email" />
                        </td>
                    </tr>
                    <tr>
                        <td><label> password: </label></td>
                        <td><input type="password" id="customer_password" name="customer_password" /></td>
                    </tr>
                    <tr>
                        <td><label> Confirm password: </label></td>
                        <td><input type="password" id="confirm_customer_password" name="confirm_customer_password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="buttons_style">Activate</button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
<?php
}
