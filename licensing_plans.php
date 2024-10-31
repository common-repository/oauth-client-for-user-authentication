<?php

function licensing_plans(){

    wp_enqueue_style("css_styles", plugins_url('/Assets/css/layout.css', __FILE__));

    ?>

    <a  class=" button back_button" href="<?php echo add_query_arg(array('tab' => 'oauthclientconfig'), $_SERVER['REQUEST_URI']); ?>" >back</a>
    


    
    <div class="licensing_title">
        <h1>Licensing Plans</h1>
    </div>

    <div class="licensing_layout">
        <div class="plans_card">
            <div class="card_header">
                <h3>Free Plan</h3>
                <p>(User Authentication and <br/>Restrict to create new User)</p>
                <h1>€ 0</h1> 
                <button class="heading" > Contact us</button>
            </div>

            <div class="card_body">
                <table class="card_table">
                    <tr><td>Unlimited SSO Authentications</td></tr>
                    <tr><td>Auto-create SSO User</td></tr>
                    <tr><td>Basic Attribute Mapping</td></tr>
                    <tr><td>Default Role Mapping</td></tr>
                    <tr><td>Test Configuration</td></tr>
                    <tr><td><br></td> </tr>
                    <tr><td><br></td> </tr>
                    <tr><td><br></td> </tr>
                    <tr><td><br></td> </tr>
                    <tr><td><br></td> </tr>
                </table>
            </div>
        </div>
        <div class="plans_card align_card">
            <div class="card_header">
                <h3>Advance Plan</h3>
                <p>(Role Mapping and <br> Attribute Mapping)</p>
                <h1>€ 169</h1>
                <button class="heading" > Contact us</button>
            </div>

            <div class="card_body">
                <table  class="card_table">
                <tr><td>Unlimited SSO Authentications</td></tr>
                <tr><td>Auto-create SSO User</td></tr>
                <tr><td>Basic Attribute Mapping</td></tr>
                <tr><td>Default Role Mapping</td></tr>
                <tr><td>Test Configuration</td></tr>
                <tr><td>Advance Attribute Mapping</td> </tr>
                <tr><td>Advance Role Mapping</td> </tr>
                <tr><td>Custom Redirect URL after Auto-Login</td> </tr>
                <tr><td><br/></td></tr>
                <tr><td><br/></td></tr>
                </table>
            </div>
        </div>
        <div class="plans_card align_card"> 
            <div class="card_header">
                <h3>Custom Plan</h3>
                <p>(we build custom features <br> as per Request)</p>
                <h1>-</h1>
                <button class="heading" > Contact us</button>
            </div>
            <div class="card_body">
                <table  class="card_table">
                <tr><td>Third Party Integrations</td></tr>
                <tr><td>Sync Information</td></tr>
                <tr><td>Custom Details</td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td> </tr>
                <tr><td></td> </tr>
                <tr><td></td> </tr>
                <tr><td></td> </tr>
                <tr><td></td> </tr>
                </table>
            </div>
        </div>
    </div>
    
    
    
    <?php
}
?>