var $ = jQuery.noConflict();


$(function() {

  var newsletter_form   = $("#pru_newsletter_form");


   console.log(ajax_object);

  newsletter_form.submit(function(event){

    $(".pru-nl-signup-message").html('');

    var pru_nl_name       = $("#pru_nl_name").val();
    var pru_nl_email      = $("#pru_nl_email").val();

    $.post(ajax_object.ajax_url , {
          action: "nr_pru_signup",
          pru_nl_name: pru_nl_name,
          pru_nl_email: pru_nl_email,
          security: $("#ajax_nonce").val(),

      },

      function(data, status){

          console.log(data);

          $(".pru-nl-signup-message").text(data.message);

          if(data.is_success){

            $(".pru-nl-signup-message").addClass("pru-nl-success-text");
            $(".pru-newsletter-modal-container").fadeOut(2000);

          }else{
            $(".pru-nl-signup-message").addClass("pru-nl-error-text");

          }

      });

    event.preventDefault()
    return false;

  });

});
