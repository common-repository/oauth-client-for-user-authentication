let Aws_Cognito_guide = {
    
    guide:"<ol><li>To configure AWS Cognito, first go to Amazon Console and sign up/login with your account.</li><li>Use the AWS Services search bar to look for Cognito.</li><li>To get a list of your user pools, click the Manage User Pools option.</li><li>To make a new user pool, click Create a user pool. Ignore if already created.</li><li>To proceed, enter a Pool name and click the Review Defaults option.</li><li>Scroll down to the Add App Client option in front of App Clients and click it.</li><li>Select Add an App Client from the drop-down menu. To create an App client, type a name for it and then click <b>Create app client</b>.</li><li>To return to your setup, click <b>Return to Pool Details</b>.</li><li>To save your settings and establish a user pool, click the <b>Create Pool button</b>.</li><li>Click the <b>App Client Settings</b> option under the App Integration menu in the navigation bar on the left side.</li><li>Under the CallBack URLs text-field, enable Identity provider as Cognito user pool and add your <b>Callback/Redirect URL</b> obtained from the <i>OAuth Client plugin</i>. Under the <b>Allowed OAuth Flows</b> option, choose the <i>Authorization code grant</i> checkbox, as well as the openid and profile checkboxes under the Allowed OAuth Scopes option (Please refer to the image below). Click on the <b>Save Changes</b> button to save your configurations.</li><li>To choose a domain name for your app, go to the <b>Choose Domain Name</b> option.</li><li>To save your domain name, type your domain name in the <b>Domain Prefix</b> text field and click <b>Save Changes</b>.</li><li>In the left side navigation bar, select <b>App Clients</b> from the General Settings menu. Then, to see your App's data, such as <i>Client ID</i> and <i>Client Secret</i>, click the <b>Show Details</b> button.</li><li>Copy the <b><i>App Client Id</i></b> and <b>App Client Secret</b> text field values and save them under your OAuth Client plugin present on the client side under the <b>Client Id</b> and the <b>Client Secret</b> text fields respectively.</li><li>In the left side navigation bar, select <b>Users and Groups</b> from the General Settings menu. Then, to create a new user, click the <b>Create user</b> button.</li><li>Fill in all of the essential information and then <b>click Create user</b>.</li><li>You can see the new user created.</li></ol>",
};


let ADFS_guide = {
  
    guide:"guide details"
};

let Amazon_guide = {
    
    guide:"<ol><li>Go to <a href='https://developer.amazon.com/' target='_blank' <b style='color:blue;'>https://developer.amazon.com/</a> and signup / login to your Amazon developer account.</li><li>Go to <a href='https://developer.amazon.com/dashboard' target='_blank' <b style='color:blue;'>Amazon dashboard</a> and click on <b style='color:red;'>Login with Amazon</b>.</li><li>Now click on the <b  style='color:red;'>Create A New Security Profile</b> button on the Login with Amazon dashboard.</li><li>Enter <b>App Details</b> and click on <b>Save</b>.</li><li>Under <b style='color:red'>Manage</b>, click the <b style='color:red'>Settings</b> icon and then select <b style='color:red'>Security profile</b>.</li><li>Go to the <b style='color:red'>Web Settings</b> Click on Edit button.</li><li>Click on <b style='color:red'> Web Settings</b> Click on <b style='color:red'> Edit</b> button.</li><li>Enter the <b style='color:red;'>Callback URL/Redirect URL</b> from the OAuth client plugin and then click on <b>Save</b>.</li><li>Click on <b style='color:red;'>Show Secret</b>, then copy <b style='color:red;'>Client ID</b> and <b style='color:red;'>Client Secret</b> to configure on the OAuth Client plugin</li></ol>"
};




let Azure_AD_guide = {
    
    guide:"<ol><li>Sign in to <a href='https://portal.azure.com' target='_blank'><b style='color:blue;'>Azure portal</b></a>. </li><li>Click on <b>App Services</b> and go to <b>Manage Azure Active Directory</b>.</li><li>In the left-hand navigation pane, click the <b>App registrations</b> service, and click <b>New registration</b> from the top. </li><li>When the Create page appears, enter your application's registration information. Select <b>Web</b> under <b>Redirect URI (Optional)</b> and provide the CallBack URL/ Redirect URL from the WordPress OAuth Client plugin.</li><li>When finished, click <b>Register</b>. Azure AD assigns a unique Application ID to your application. Copy <b>Application ID</b>(Client ID) and the <b>Directory ID</b> (tenant-id) , this will be your Client ID and Tenent ID. </li><li>Go to <b>Certificates and Secrets</b> from the left <i>navigation pane</i> and click on <b>New Client Secret</b>. Enter <b>description</b> and <b>select expiration time</b> and click on <b>ADD</b> option.</li><li>Please copy<b> Value</b>, but not Secret ID. The value you copied will be your Secret key.</li><li>You have successfully configured Azure AD as OAuth Provider</li><li>Now the Client-ID, Client Secret and Tenant-ID you copied should be configure in the WordPress OAuth Client plugin.</li></ol>"
 
 };

 
 

let Azure_AD_2_0_guide = {
  
    guide:"guide details"
};

let Azure_B2C_guide = {
    
    guide:"guide details"
}


let Bitrix24_guide = {
    guide:"guide details"
}

let Clever_guide = {
    guide:"guide details"
}

let Discord_guide = {
    guide:"guide details"
}

let Google_guide = {
    guide:"<ol><li>Go to <a href='https://console.developers.google.com/' target='_blank' style='color:blue'>https://console.developers.google.com/</a> and sign up/login.</li><li>Click on <b  style='color:red'>Select Project</b> to create a new Google Apps Project, Enter your <b>project name</b> under the <b style='color:red'>project Name</b> field and click on <b style='color:blue'>Create</b>.</li> <li>Go to <b style='color:red'> Navigation Menu </b> --> <b style='color:red'>APIs</b> --> <b style='color:red'>Services</b> --> <b style='color:red'>Credentials</b>.</li><li>Click on <b style='color:red'>CREATE CREDENTIALS </b> button and then select <b style='color:red'>OAuth Client ID</b> from the options provided.</li><li>In case you are facing some warning saying that in order to create an OAuth Client ID, you must set a product name on consent screen. Click on the <b  style='color:red'>Configure consent screen</b> button.</li><li>Choose your target users from the <b style='color:red'>User Type</b> and click on <b style='color:blue'> Create</b> button. Fill the required details in <b>App information</b> such as App Name, User Support Email. and click on <b style='color:blue'>Save and Continue</b> button.</li><li>Now for configuring scopes, click on <b style='color:red'>Add or Remove the Scopes</b> button.</li><li>Now, Select the <b style='color:red'>Scopes</b> to allow your project to access specific types of private user data from their Google Account and click on <b style='color:blue'> Update</b> button.</li><li>Now for configuring scopes, click on <b style='color:red'> Add or Remove the Scopes</b> button.</li><li>Now, Select the <b style='color:red'>Scopes</b> to allow your project to access specific types of private user data from their Google Account and click on <b style='color:red'>Update</b> button.</li><li>Go to the <b style='color:red'>Credentials</b> tab and click on <b style='color:red'>Create Credentials</b> button. Select <b style='color:red'>Web Application</b> from dropdown list to create new application. </li><li>Click to the style='color:red'Credentials</b> tab and click on <b style='color:red'>CREATE CREDENTIALS</b> button. Select  style='color:red'>OAuth client ID </b>. Select Web Application from dropdown list to create new application. </li><li>Enter the name you want for your Client ID under the name field and enter the <b style='color:red'> Callback URL/ Redirect URL</b> from WordPress OAuth Client plugin/module under the <b style='color:red'>Authorized redirect URIs</b> field and click on <b style='color:red'>Create</b> button.</li></ol>"
}


let GitHub_guide = {

    guide:"<ol><li>Go to <a href='https://github.com/settings/developers' target='_blank' style='color:blue'>https://github.com/settings/developers </a>and log into your GitHub account.</li><li>You will be presented with a screen. Click on <b style='color:red'> Register a new application</b></li><li>You will be shown a form where you have to enter <b style='color:red'>Application Name</b> and <b style='color:red'>Callback URL</b>. Callback URL / Redirect URL is avaibale in the WordPress OAuth Client plugin Fill the form with appropriate information and click on the <b style='color:red'>Register Application</b>.</li><li>After registering the application, you will be given <b  style='color:red'>Client ID</b> and <b  style='color:red'>Client Secret</b>. Copy these credentials and paste in the WordPress OAuth Client plugin</li></ol>"
   
}




let GitLab_guide = {
    guide:"<ol><li>Go to <a href='https://gitlab.com/-/profile/preferences' target='_blank', style='color:blue'>https://gitlab.com/-/profile/preferences</a> and sing-up / log into your box account.</li><li>Click on <a style='color:blue' href='https://gitlab.com/-/profile/applications'>Applications tab</a> from the left nav-bar</li><li>Give a Name to your <b>application</b> and add <b style='color:red'> Redirect URI</b>. CallBack URL/ Redirect URL can be find from the WordPress OAuth Client plugin.</li><li>Choose the <b style='color:red'>scopes</b> according to need or choose read_user and click on <b style='color:blue'>save application</b></li><li>Copy the <b style='color:red'>Application ID </b> and <b style='color:red'>Client Secret</b> and configure in the WordPress OAuth Client plugin as <b>ClientID</b> and <b>Client Secret</b>.</li></ol>"
}



let Invision_Community_guide = {
    guide:"guide details"
}

let Keycloak_guide = {
    guide:"guide details"
}

let LinkedIn_guide = {
    guide:"guide details"
}

let Ofice_365_guide = {
    guide:"guide details"
}

let Okta_guide = {
    guide:"guide details"
}

let onelogin_guide = {

    guide:"<ol><li>Go to <a href='https://app.onelogin.com/login' target='_blank' style='color:blue'>https://app.onelogin.com/login </a> and log into your Onelogin account.</li><li>You will be presented a screen. Hover on <b style='color:red'>Applications</b> and then click on <b style='color:red'>Applications</b>.</li><li>In <b>search bar</b>. Search for “OIDC” and click on the search result as <b style='color:red'>OpenID Connect(OIDC)</b>.</li><li>Now, go to the Configuration tab and enter Fill the <b style='color:red'>application name</b> and other details as required, then click on <b style='color:red'>Save</b>.</li><li>You will be redirected to the app details page. Now, go to the Configuration tab and enter <b style='color:red'>CallBack URL/ Redirect URL</b> and click on <b>save</b></li><li>Go to <b>SSO</b> tab. There you will find the <b style='color:red'>Client ID </b>, <b style='color:red'> Client Secret</b> fields and <b>site-url</b> from the issuer URLs. Copy them and configure in the wordpress oauth client plugin.</li></ol><ol>Assign the <b style='color:red'>users</b> to <b>OneLogin SSO Application</b>: <br><br> <li>Hover on the <b style='color:red'>Users</b> from top nav-bar and click on the <b>Users</b> option from the dropdown.</li><li>You will be shown the users list available on your onelogin platform. Select a user you want to give access to your application.</li><li>Now for selected user, go to the <b style='color:red'>Applications</b> tab from the left menu and click on blue + icon from right to add the application.</li><li>Select the <b>application</b> from the drop down list for which you want to allow SSO for that user and click on <b style='color:red'>Continue</b>.</li><li>Complete the configurations and click on the Save button. </li><li>The application will be listed in the user profile and now this user can SSO into your WordPress site using his OneLogin credentials for this application. </li></ol>"
   
}




let OpenAM_guide = {
    guide:"guide details"

}

let PayPal_guide = {
    guide:"guide details"
}

let Ping_Identity_guide = {
    
    guide:"guide details"
}

let Salesforce_guide = {
    guide:"guide details"
}

let Slack_guide = {
    guide:"<ol><li>Go to <a href='https://api.slack.com/apps' target='_blank' style='color:blue'>https://api.slack.com/apps</a> and log into your Slack account.</li><li>Click on <b>Create new</b> App.</li><li> Enter <b> Application Name</b> and <b>Development Slack Workspace</b>. Fill the form with appropriate information and click on <b>Create App</b>.</li><li>Scroll down to <b>App Credentials</b> section. Here you will find given <b>Client ID</b> and <b>Client Secret</b> for your slack application. This need to copy and fill in the WordPress OAuth Client plugin</li><li>Go to <b>OAuth & Permissions</b>. </li><li>In slack application\'s goto <b>Redirect URLs</b> section, Click on <b>Add New Redirect URL</b> and enter the <b>CallBack URL/ Redirect URL</b> from the WordPress OAuth Client for user authentication plugin. Click on <b>Save URLs</b>.</li></ol>"
}



let WSO2_Identity_Server_guide = {
    guide:"guide details"
}

let WHMCS_guide = {
    guide:"guide details"
}

let Spotify_guide = {
    guide:"guide details"
}

let Wildapricot_guide = {
    guide:"guide details"
}

let Zendesk_guide = {
    guide:"guide details"
}


let Custom_OAuth_guide = {
    
    guide:"guide details"
}

let Custom_OpenID_guide = {
    
    guide:"guide details"
}


function getguide(guidename) {
    
    return eval(guidename);
}




