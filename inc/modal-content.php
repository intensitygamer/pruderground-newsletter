
<div id ='pru_newsletter_modal' class= 'pru-newsletter-modal-container'>

    <div class='pru-newsletter-modal-content'>

            <div class='pru-newsletter-modal-header'>

                <!-- <span class="pru-newsletter-close-btn">&times;</span> -->

                <h4>PRUNDERGROUND NEWSLETTER</h4>


                <div class='pru-newsletter-modal-header-underscore'></div>

            </div>

            <div class='pru-newsletter-modal-body'>

                <form action="" id='pru_newsletter_form' method='POST'>
                    <div class='pru-nl-signup-message'></div>

                    <input type='text' placeholder="Your Name" name="name" id="pru_nl_name" />
                    <input type='text' placeholder="Email Address" name="email_address" id="pru_nl_email" />

                    <?php $ajax_nonce = wp_create_nonce( "pru-nr-security-code" ); ?>

                     <input type='hidden' value="<?php echo $ajax_nonce; ?>" id="ajax_nonce"/>

                    <button type='submit'>SIGNUP</button>
                </form>

            </div>

    </div>


</div>

