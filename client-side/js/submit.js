// enter the URL of your web server!
var url = "../server-side/register.php";
console.log("a3");
$(function() {
  $('#registration').submit(function(e) {
    console.log("a6");
    e.preventDefault();
    send_request();
  });
});


// send POST request with all form data to specified URL
function send_request() {
  // remove messages
  //remove_msg();
  console.log($('#registration').serialize());
  
  // make request
  $.ajax({
    url: url,
    method: 'POST',
    data: $('#registration').serialize(),
    dataType: 'text',
    success: function(data) {
      // log user_id to console
      console.log("data",data);
      
      // display user_id on page
      //$('#server_response').addClass('success');
      $('.servermessage').html(data);
    },
    error: function(jqXHR) {
      // parse JSON
     /* try {
        var $e = JSON.parse(jqXHR.responseText);
        
        // log error to console
        console.log('Error from server: '+$e.error);
        
        // display error on page
        $('#server_response').addClass('error');
        $('#server_response span').text('Error from server: ' +$e.error);
      }
      catch (error) {
        console.log('Could not parse JSON error message: ' +error);
      }*/
      console.log(jqXHR.responseText,jqXHR.status);
    }
  });
}


// remove all messages displayed on page
function remove_msg() {
  var $server_response = $('#server_response');
  if ($server_response.hasClass('success')) {
    $server_response.removeClass('success');
  }
  else if ($server_response.hasClass('error')) {
    $server_response.removeClass('error');
  }
  $('#server_response span').text('');
}