let servers = serverslist;
let select = document.createElement("select");

select.name = "oauthservers";
select.id = "oauthserver";

servers.forEach(element => {
    
    var option = document.createElement("option");
    option.value = element.split(" ").join("_");
    option.value = option.value.split(".").join("_");
    option.text = element;
    select.appendChild(option);

});


document.getElementById("oc_oauthservernames").appendChild(select);

jQuery('#oauthserver').change(function (e) {
 

    let serverdetails = getlistvalues(e.target.value);
    let serverguides  = getguide(e.target.value+'_guide');
    document.getElementById("app_type").value = serverdetails.apptype;
    document.getElementById("client_scope").value = serverdetails.scope;
    document.getElementById("client_authorization").value = serverdetails.authorization_endpoint;
    document.getElementById("client_token_endpoint").value = serverdetails.token_endpoint;
    document.getElementById("rquest_in_header").checked = serverdetails.rquest_in_header;
    document.getElementById("rquest_in_body").checked = serverdetails.rquest_in_body;

       
    document.getElementById("oauth_guide").innerHTML= '<b style="font-size:20px">'+e.target.value+' :</b><br>'+serverguides.guide;

    
    
    if('undefined'!=typeof(serverdetails.userinfo_endpoint)){
        document.getElementById("oc_userinfo_field").style.display="";
        document.getElementById("client_userinfo_endpoint").value = serverdetails.userinfo_endpoint;
    }else{ 
        document.getElementById("oc_userinfo_field").style.display = "none";
        document.getElementById("client_userinfo_endpoint").value='';
    }
        
        

});
