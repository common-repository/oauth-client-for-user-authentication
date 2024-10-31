let serverslist = [
    "select server",
    "Aws Cognito",
    'ADFS',
    'Amazon',
    'Azure AD',
    'Azure AD 2.0',
    'Azure B2C',
    'Bitrix24',
    'Clever',
    'Discord',
    'Google',
    'GitHub',
    'GitLab',
    'Invision Community',
    'Keycloak',
    'LinkedIn',
    'Ofice 365',
    'Okta',
    'onelogin',
    'OpenAM',
    'PayPal',
    'Ping Identity',
    'Salesforce',
    'Slack',
    'WSO2 Identity Server',
    'WHMCS',
    'Wildapricot',
    'Spotify',
    'Zendesk',
    'Custom OAuth',
    'Custom OpenID'
];



let Aws_Cognito = {
    apptype: "OAuth",
    scope: "openid",
    authorization_endpoint: "https://<cognito-app-domain>/oauth2/authorize",
    token_endpoint: "https://<cognito-app-domain>/oauth2/token",
    userinfo_endpoint: "https://<cognito-app-domain>/oauth2/userInfo",
    rquest_in_header: true,
    rquest_in_body: true,
    guide:"<ol><li>step 1</li><li>step 2</li></ol>",
};

let ADFS = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://{yourADFSDomain}/adfs/oauth2/authorize/",
    token_endpoint: "https://{yourADFSDomain}/adfs/oauth2/token/",
    rquest_in_header: true,
    rquest_in_body: true,
    guide:"<ol><li>step 3</li><li>step 4</li></ol>",
};

let Amazon = {
    apptype: "OAuth",
    scope: "profile",
    authorization_endpoint: "https://www.amazon.com/ap/oa",
    token_endpoint: "https://api.amazon.com/auth/o2/token",
    userinfo_endpoint: "https://api.amazon.com/user/profile",
    rquest_in_header: true,
    rquest_in_body: true,
    guide:"<ol><li>step 5</li><li>step 6</li></ol>",
};


let Azure_AD = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://login.microsoftonline.com/[tenant-id]/oauth2/authorize",
    token_endpoint: "https://login.microsoftonline.com/[tenant]/oauth2/token",
    rquest_in_header: true,
    rquest_in_body: true,
    guide:"<ol><li>step 7</li><li>step8</li></ol>",
};

let Azure_AD_2_0 = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://login.microsoftonline.com/{tenant}/oauth2/v2.0/authorize",
    token_endpoint: "https://login.microsoftonline.com/{tenant}/oauth2/v2.0/token",
    rquest_in_header: true,
    rquest_in_body: true,
};

let Azure_B2C = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://{tenant}.b2clogin.com/{tenant}.onmicrosoft.com/{policy}/oauth2/v2.0/authorize",
    token_endpoint: "https://{tenant}.b2clogin.com/{tenant}.onmicrosoft.com/{policy}/oauth2/v2.0/token",
    rquest_in_header: true,
    rquest_in_body: true,
}


let Bitrix24 = {
    apptype: "OAuth",
    scope: "user",
    authorization_endpoint: "https://{your-id}.bitrix24.com/oauth/authorize",
    token_endpoint: "https://{your-id}.bitrix24.com/oauth/token",
    userinfo_endpoint: "https://{your-id}.bitrix24.com/rest/user.current.json?auth=",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Clever = {
    apptype: "OAuth",
    scope: "read:students read:teachers read:user_id",
    authorization_endpoint: "https://clever.com/oauth/authorize",
    token_endpoint: "https://clever.com/oauth/tokens",
    userinfo_endpoint: "https://api.clever.com/v1.1/me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Discord = {
    apptype: "OAuth",
    scope: "identify email guilds",
    authorization_endpoint: "https://discordapp.com/api/oauth2/authorize",
    token_endpoint: "https://discordapp.com/api/oauth2/token",
    userinfo_endpoint: "https://discordapp.com/api/users/@me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Google = {
    apptype: "OAuth",
    scope: "profile email",
    authorization_endpoint: "https://accounts.google.com/o/oauth2/auth",
    token_endpoint: "https://www.googleapis.com/oauth2/v4/token",
    userinfo_endpoint: "https://www.googleapis.com/oauth2/v1/userinfo",
    rquest_in_header: true,
    rquest_in_body: true,
}

let GitHub = {
    apptype: "OAuth",
    scope: "user repo",
    authorization_endpoint: "https://github.com/login/oauth/authorize",
    token_endpoint: "https://github.com/login/oauth/access_token",
    userinfo_endpoint: "https://api.github.com/user",
    rquest_in_header: true,
    rquest_in_body: true,
}

let GitLab = {
    apptype: "OAuth",
    scope: "read_user",
    authorization_endpoint: "https://gitlab.com/oauth/authorize",
    token_endpoint: "http://gitlab.com/oauth/token",
    userinfo_endpoint: "https://gitlab.com/api/v4/user",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Invision_Community = {
    apptype: "OAuth",
    scope: "Email",
    authorization_endpoint: "https://{invision-community-domain}/oauth/authorize/",
    token_endpoint: "https://{invision-community-domain}/oauth/token/",
    userinfo_endpoint: "https://{invision-community-domain}/oauth/me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Keycloak = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "{your-domain}/auth/realms/{realm}/protocol/openid-connect/auth",
    token_endpoint: "{your-domain}/auth/realms/{realm}/protocol/openid-connect/token",
    rquest_in_header: true,
    rquest_in_body: true,
}

let LinkedIn = {
    apptype: "OAuth",
    scope: "r_basicprofile",
    authorization_endpoint: "https://www.linkedin.com/oauth/v2/authorization",
    token_endpoint: "https://www.linkedin.com/oauth/v2/accessToken",
    userinfo_endpoint: "https://api.linkedin.com/v2/me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Ofice_365 = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://login.windows.net/common/oauth2/authorize",
    token_endpoint: "https://login.windows.net/common/oauth2/token",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Okta = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://{yourOktaDomain}.com/oauth2/default/v1/authorize",
    token_endpoint: "https://{yourOktaDomain}.com/oauth2/default/v1/token",
    rquest_in_header: true,
    rquest_in_body: true,
}

let onelogin = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://<site-url>.onelogin.com/oidc/2/auth",
    token_endpoint: "https://<site-url>.onelogin.com/oidc/2/token",
    rquest_in_header: true,
    rquest_in_body: false,
}

let OpenAM = {
    apptype: "OpenIdConnect",
    scope: "Write",
    authorization_endpoint: "https://openam.example.com:8443/openam/oauth2/realms/root/authorize",
    token_endpoint: "https://openam.example.com:8443/openam/oauth2/realms/root/realms/customers/access_token",
    rquest_in_header: true,
    rquest_in_body: true,

}

let PayPal = {
    apptype: "OpenIdConnect",
    scope: "openid",
    authorization_endpoint: "https://www.paypal.com/signin/authorize",
    token_endpoint: "https://api.paypal.com/v1/oauth2/token",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Ping_Identity = {
    apptype: "OpenIdConnect",
    scope: "edit",
    authorization_endpoint: "https://localhost:9031/as/authorization.oauth2",
    token_endpoint: "https://localhost:9031/as/token.oauth2",
    rquest_in_header: true,
    rquest_in_body: true,

}

let Salesforce = {
    apptype: "OAuth",
    scope: "email",
    authorization_endpoint: "https://login.salesforce.com/services/oauth2/authorize",
    token_endpoint: "https://login.salesforce.com/services/oauth2/token",
    userinfo_endpoint: "https://login.salesforce.com/services/oauth2/userinfo",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Slack = {
    apptype: "OAuth",
    scope: "users.profile:read",
    authorization_endpoint: "https://slack.com/oauth/authorize",
    token_endpoint: "https://slack.com/api/oauth.access",
    userinfo_endpoint: "https://slack.com/api/users.profile.get",
    rquest_in_header: true,
    rquest_in_body: true,
}

let WSO2_Identity_Server = {
    apptype: "OAuth",
    scope: "openid",
    authorization_endpoint: "https://<wso2-app-domain>/wso2/oauth2/authorize",
    token_endpoint: "https://<wso2-app-domain>/wso2/oauth2/token",
    userinfo_endpoint: "https://<wso2-app-domain>/wso2/oauth2/userinfo",
    rquest_in_header: true,
    rquest_in_body: true,
}

let WHMCS = {
    apptype: "OAuth",
    scope: "openid profile email",
    authorization_endpoint: "https://{yourWHMCSdomain}/oauth/authorize.php",
    token_endpoint: "https://{yourWHMCSdomain}/oauth/token.php",
    userinfo_endpoint: "https://{yourWHMCSdomain}/oauth/userinfo.php?access_token=",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Wildapricot = {
    apptype: "OAuth",
    scope: "auto",
    authorization_endpoint: "https://<your_account_url>/sys/login/OAuthLogin",
    token_endpoint: "https://oauth.wildapricot.org/auth/token",
    userinfo_endpoint: "https://api.wildapricot.org/v2.1/accounts/<account_id>/contacts/me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Spotify = {
    apptype: "OAuth",
    scope: "user-read-private user-read-email",
    authorization_endpoint: "https://accounts.spotify.com/authorize",
    token_endpoint: "https://accounts.spotify.com/api/token",
    userinfo_endpoint: "https://api.spotify.com/v1/me",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Zendesk = {
    apptype: "OAuth",
    scope: "read",
    authorization_endpoint: "https://{subdomain}.zendesk.com/oauth/authorizations/new",
    token_endpoint: "https://{subdomain}.zendesk.com/oauth/tokens",
    userinfo_endpoint: "https://{subdomain}.zendesk.com/api/v2/users",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Custom_OAuth = {
    apptype: "OAuth",
    scope: "",
    authorization_endpoint: "",
    token_endpoint: "",
    userinfo_endpoint: "",
    rquest_in_header: true,
    rquest_in_body: true,
}

let Custom_OpenID = {
    apptype: "OpenIdConnect",
    scope: "",
    authorization_endpoint: "",
    token_endpoint: "",
    rquest_in_header: true,
    rquest_in_body: true,
}


function getlistvalues(sname) {
    return eval(sname);
}


