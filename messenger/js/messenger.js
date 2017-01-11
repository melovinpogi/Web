/**
 * Declarations of variables
 */

var chatbox = $("#message");
var str     = $(location).attr('search');
var param   = str.replace("chat?user=", "");
var x       = param.replace("?user=", "");
var recipient = x = '' ? 0 : x;

/**
 * Add a new chat message
 * 
 * @param {string} message
 */
function send_message(recipient,message) {
  $.ajax({
    url: 'ajax/SendMessage.php',
    method: 'post',
    data: {userto: recipient,msg: message},
    success: function(data) {

      chatbox.val('');
     get_messages();
    }
  });
}


/**
 * Get's the chat messages.
 */
function get_messages() {
  var height = 0;

  $.ajax({
    url: 'ajax/GetMessage.php',
    method: 'post',
    data: {userto: recipient},
    success: function(data) {
      $('#chat-box').html(data);

      /* Auto adjust div */
      $('.chat').each(function(i, value){
           height += parseInt($(this).height());
      });
            height += '';
      $('div').animate({scrollTop: height + 30});
    }
  });
}


/**
 * Initializes the chat application
 */
function boot_chat() {
  // Load the messages every 3 seconds
 /* if(recipient == 0 || recipient == ''){
    return false;
}*/
//console.log(param.replace("?user=", ""))

  //setInterval(get_messages, 3000);

  // Bind the keyboard event
  chatbox.bind('keydown', function(event) {
    // Check if enter is pressed without pressing the shiftKey
    if (event.keyCode === 13 && event.shiftKey === false) {
      var message = chatbox.val();
      // Check if the message is not empty
      if (message.length !== 0) {
        send_message(recipient,message);
        event.preventDefault();
      } else {
        alert('Provide a message to send!');
        chatbox.val('');
      }
    }
  });
}

// Initialize the chat
boot_chat();