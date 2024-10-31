=== OAuth client Single Sign On for WordPress ( OAuth 2.0 SSO ) ===
Contributors: WP OAuth Client team
Tags: authentication, oauth, oauth2.0, oauth client, oauth server, sso, security, oauth login
Requires at least: 5.0
Tested up to: 6.1.1
Requires PHP: 7.2
Stable tag: 3.1.1
License: GPLv2

== Description ==
WordPress OAuth client SSO ( OAuth 2.0 & OpenID SSO ) plugin allows login ( Single Sign On ) with your OAuth Servers like  AWS Cognito, Amazon, Azure AD, Azure B2C, Clever, Discord, Google, Google Apps, GitHub, GitLab, Invision Community, Keycloak, LinkedIn, Office 365, Okta, OpenAM, PayPal, Ping Identity, Salesforce, WSO2 Identity Server, Zendesk or other custom OAuth 2.0 / OpenID Connect providers. It works with any OAuth Provider that complies with OAuth 2.0 Server and OpenID Connect (OIDC) 1.0 standards. With WP OAuth Client, no third-party is required. This plugin has everything you require.

= OAuth Client 2.0 / OpenID Features =

* Attribute Mapping
* Role Mapping
* Connectivity Test user validation by entering the credentials in the plugin using OAuth Client.
* Redirect to specific URL after Auto-Login / Register
* Redirect based on URL
* Allow only specific IP addresses to Login / Register based
* Allow only domains to Register based


= Supported list of OAuth Grant types ( Comming Soon ) =
* Authorization Code grant (currently support)
* OpenID Connect ( currently support )
* Implicit grant
* User Credentials
* Client Credentials
* Refresh Token
* OpenID Discovery
* Public Clients 
* Public Client Proof of Key Exchange ( PKCE )

== Supported list of popular OAuth Servers ==

== Our WordPress OAuth client Single Sign On ( WordPress SSO ) plugin supports any third-party / OAuth OpenID providers. Some OAuth providers are listed below. ==

* OAuth SSO Login with Azure AD
* OAuth SSO Login with AWS Cognito
* OAuth SSO Login with Amazon
* OAuth SSO Login with Azure AD
* OAuth SSO Login with Azure B2C
* OAuth SSO Login with Clever
* OAuth SSO Login with Discord
* OAuth SSO Login with Google
* OAuth SSO Login with Google Apps
* OAuth SSO Login with GitHub
* OAuth SSO Login with GitLab
* OAuth SSO Login with Invision Community
* OAuth SSO Login with Keycloak
* OAuth SSO Login with LinkedIn
* OAuth SSO Login with Office 365
* OAuth SSO Login with Okta
* OAuth SSO Login with OpenAM
* OAuth SSO Login with PayPal
* OAuth SSO Login with Ping Identity
* OAuth SSO Login with Salesforce
* OAuth SSO Login with Slack
* OAuth SSO Login wtth WSO2 Identity Server
* OAuth SSO Login with WHMC
* OAuth SSO Login with Zendesk 
* OAuth SSO Login with custom OAuth 2.0 / OpenID Connect providers
* It works with any OAuth Provider that complies with OAuth 2.0 Server and OpenID Connect ( OIDC )




== Support ==
* To assist with the setup, our team is only an email away from you. Please drop us an email at mysteve06@gmail.com so that one member of our team can reach you in no time to set up the plugin.

== About OAuth and SSO ==

= What is Single Sign-On ? =
Single sign-on (SSO) is a form of authentication that allows users to use just one set of credentials to safely authenticate several applications and websites. OAuth and OpenID Connect are token-based Single Sign-On (SSO) protocols that allow third-party applications to access an end user's account information without revealing the password.

= What is OAuth ? =
OAuth is an open-standard authorization protocol or mechanism that provides the "secure designated access" ability for applications. For example, without having to give example.com your OAuth Server password, you can tell your OAuth Server that it's OK for example.com to access the site(Using role mapping, you can limit access to content based on roles).

= What is OAuth Client? =
Application requesting access to a protected resource on behalf of the Resource Owner.

= What is OAuth Server? =
OAuth Server provides the user information without sharing the credentials.

= What is OAuth Scope? =
Scope is a feature in OAuth 2.0 to restrict the access of an application to a user's account. One or more scopes may be requested by an applicant, this information is then provided in the consent screen to the user, and the access token given to the application will be restricted to the scopes granted.

= Can you set this up for me on my current website? =
*Yes*, without a doubt. If you ever want assistance, please do not hesitate to contact us at mysteve06@gmail.com.


= Requirements =

* WordPress since 5.0 or higher
* PHP >= 7.2


== Installation ==
To install OAuth Client Plugin  you need at least WordPress 5.0 and PHP 7.2


== Frequently Asked Questions ( FAQ's )==

For support or troubleshooting help please email us at mysteve06@gmail.com.


== Screenshots ==

1. OAuth Configuration.
2. Attributes Mapping for WP users.


== Changelog ==


= 3.1.1 = 
Added missing files and fixed the error 

= 3.1.0 = 
Improved configuration setup as easy as possible
compatible with latest wordpress 6.1.1

= 3.0.6 = 
UI changes
usability improvements

= 3.0.6 = 
Usability imporvements
Compatible and Tested with latest WordPress version

= 3.0.5 =
Contact US API update

= 3.0.4 =
Resolved security flaws

= 3.0.3 =
Made changes to the file naming and classes

= 3.0.2 =
UI Changes.
Security related bug fixes
Added missed files.

= 3.0.1 =
Bug fixes. 
Compatible with more Servers.

= 3.0.0 =
Added instructions/Guides to configure the OAuth Server.
Option to restrict resgistration of new WordPress user after SSO.
UI updates
Delete the plugin database on uninstall.
Compatible with more OAuth Servers
Automaticall add SSO button on login form.

= 2.2.0 =

Fixed login related issues

= 2.1.0 =
Added a Test Configuration button to view information coming from the OAuth Server.
Fill end points for the specified OAuth server automatically using the auto fill feature.
Contact Us

= 2.0.0 =
Compatible with more Oauth server

= 1.0.1 =
Readme update

= 1.0.0 =
* this is the first release.

== Upgrade Notice ==

= 1.0.0 =
First version of plugin.