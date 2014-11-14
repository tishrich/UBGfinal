 $(function() {
   $('#contact-agent-form-submit').on('click', function(){

        //alert (dataString);return false;
        console.log('executing ajax call');
        request = $.ajax({
            url: "https://script.google.com/macros/s/AKfycbyeqQD3_9oUABcc3sIbOFJI5qeYpyR9MY9pnpGudboNyCDr4AQ/exec",
            type: "post",
            data: $('#contactform').serialize(),
          success: function(data) {
            $('#slideout_inner').html("<div id='message'></div>");
            $('#message').html("<h2>Contact Form Submitted!</h2>")
            .append("<p>An agent will be in contact with you soon.</p>")
            .hide()
            .fadeIn(1500, function() {
              $('#message').append("<i class='i-plain i-xlarge divcenter nobottommargin icon-check'></i>");
            });
            console.log(data);
          },
        });

        return false;
    });

     $('#contactsubmit').on('click', function(){

        //alert (dataString);return false;
        console.log('executing ajax call');
        request = $.ajax({
            url: "https://script.google.com/macros/s/AKfycbyeqQD3_9oUABcc3sIbOFJI5qeYpyR9MY9pnpGudboNyCDr4AQ/exec",
            type: "post",
            data: $('#contactform').serialize(),
          success: function(data) {
            $('#contactform').html("<div id='message'></div>");
            $('#message').html("<h2 style='color:#000'>Contact Form Submitted!</h2>")
            .append("<p style='color:#000'>We will be in contact with you soon.</p>")
            .hide()
            .fadeIn(1500, function() {
              $('#message').append("<i class='i-plain i-xlarge divcenter nobottommargin icon-check'></i>");
            });
            console.log(data);
          },
        });

        return false;
    });

     $('.qsearch').on('click', function(){
        $('#slideout_inner').show();


     })

  });

