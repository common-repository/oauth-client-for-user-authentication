jQuery("#copyLink").click(function(e) {
	copyToClipboard(document.getElementById("signin_url"));
});

function copyToClipboard(e) {
    var tempItem = document.createElement('input');

    tempItem.setAttribute('type','text');
    tempItem.setAttribute('display','none');
    
    let content = e;
    if (e instanceof HTMLElement) {
    		content = e.innerHTML;
    }
    
    tempItem.setAttribute('value',content);
    document.body.appendChild(tempItem);
    
    tempItem.select();
    document.execCommand('Copy');

    tempItem.parentElement.removeChild(tempItem);
}

function scrollto(eleid){

   
    document.getElementById(eleid).scrollIntoView();

}

function oc_copy_to_clipboard(ele){


    var textbox = jQuery( ele ).prev( 'input' )[0];
    console.log(textbox);
	textbox.select();
	textbox.setSelectionRange( 0, 99999 ); 
	var copied = textbox.value;
	
	navigator.clipboard.writeText( copied ).then( function(){
		
		jQuery( ele ).addClass( 'oc-copied' );
		
	} );
	
	setTimeout( function(){
		
		jQuery( ele ).removeClass( 'oc-copied' );
		
	}, 1000);

}

function addCustomFeilds(id){
    console.log(id);
    if( id === 'oauth_attribute_mapping'){
        // alert(add_custom_attribute(id))
        ele = document.getElementById(id+"_setup");
        let custom_attr = add_custom_attribute(id);
        ele.insertAdjacentHTML('afterend', custom_attr );

    }
    else if( id === "oauth_role_mapping"){
        ele = document.getElementById(id+"_setup");
        let custom_attr = add_custom_role(id)
        ele.insertAdjacentHTML('afterend', custom_attr );
    }
}

function add_custom_attribute(tagName){
    const id = document.querySelectorAll('.oauth_custom_attribute_item').length+1;
    let html = `<div style="display: flex; margin:2% 0%;" id="${tagName}_${id}" class="oauth_custom_attribute_item">
    <input type="input" class="disabled_mappingfields" placeholder="Enter Attribute Name in WP User Profile" disabled />
    <input type="input" class="disabled_mappingfields" placeholder="Enter OAuth Server attribute name" disabled />
    <input type="button" value="remove" class="oauth_remove_button" id="remove_attr_${id}" onclick="remove_item('${tagName}_${id}')"/>
</div>`;
    return html;
}


function add_custom_role(tagName){

    const id = document.querySelectorAll('.oauth_custom_role_item').length+1;

    let html =`  <div style="display: flex;margin:2% 0%;" id="${tagName}_${id}" class="oauth_custom_role_item">
    <select style="width: 50%;margin-right: 24px;" placeholder="Enter Attribute Name in WP User Profile">
    <option>Select WP Role.</option>
    <option value="subscriber">Subscriber</option>
    <option value="editor">Editor</option>
    <option value="contributor">Contributor</option>
    <option value="administrator">Administrator</option>
</select>
<input type="input" class="disabled_mappingfields" placeholder="Enter OAuth Server Group" disabled />
    <input type="button" value="remove" class="oauth_remove_button" id="remove_role_${id}" onclick="oauth_role_remove_item('${tagName}_${id}')"/>
</div>`

return html;

}

function remove_item(item){
    document.getElementById(item).remove();
    console.log("remove "+ item);
}