<?php

function oc_feedbackForm()
{

?>

     <style>
        div.elem-group {
            margin: 5px 0;
        }

        #feedbackform label {
            display: block;
            font-family: 'Aleo';
            padding-bottom: 4px;
            font-size: 1.25em;
        }

        #feedbackform input,
        #feedbackform select,
        #feedbackform textarea {
            border-radius: 2px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 1.20em;
            font-family: 'Aleo';
            width: 400px;
            padding: 1px;
        }

        textarea {
            height: 80px;
        }

        #submitFeedback {

            height: 35px;
            background: green;
            color: white;
            border: 2px solid darkgreen;
            font-size: 1.20em;
            font-family: 'Aleo';
            border-radius: 4px;
            cursor: pointer;
        }

        #skipFeedback {

            height: 35px;
            background: green;
            color: white;
            border: 2px solid darkgreen;
            font-size: 1.20em;
            font-family: 'Aleo';
            border-radius: 4px;
            cursor: pointer;
        }

        #submitFeedback:hover {
            border: 2px solid black;
        }
    </style>
    <div class="card" id="feedbackfrm" style="margin-left:30%;position:fixed;z-index:999; top:0px; margin-top:8rem;max-width:36rem;display: none;">
        <div>
            <form action="" method="POST" id="feedbackform">
                <input type="hidden" name="action" value="feedbackform" />
                <h3> Your Feedback </h3>
                <h4 style="color:red">Please take a moment to provide feedback, our team will contact you to ensure that the plugin is working properly on your website.</h4>
                <?php wp_nonce_field('feedback_nonce', 'feedback_nonce') ?>
                <div class="elem-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="customer_name" name="customer_name" placeholder="username" required>
                </div>
                <div class="elem-group">
                    <label for="email">Your E-mail:</label>
                    <input type="email" id="customer_email" name="customer_email" placeholder="username@example.com" required>
                </div>
                <div class="elem-group">
                    <label for="message">Write your Feedback:</label>
                    <textarea id="customer_message" name="customer_message" placeholder="" required></textarea>
                </div>
                <input id="hasskiped" name="hasskiped" hidden />
                <div style="text-align:center;">
                    <button id="submitFeedback" type="submit">Send </button>
                   <button id="skipFeedback" type="button" onclick='skipfeedback()'>Skip </button>
                </div>
            </form>

        </div>
    </div>

    
    <script>
            
            function skipfeedback() {
                jQuery('#hasskiped').val('skipped');
                jQuery('#feedbackform').submit();

            }
            
            jQuery('#deactivate-oauth-client-for-user-authentication').on('click', function(e) {
                console.log('button clicked')
                var feedbackfrm = document.getElementById('feedbackfrm');
                feedbackfrm.style.display = 'block';

                return false;
            });
        </script>


<?php
}