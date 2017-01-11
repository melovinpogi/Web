<!DOCTYPE html>
<html>
<head>
    <title>IPIC Messenger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/ipic/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/ipic/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/ipic/css/messenger.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
 
    <body>
        <h1>TEst</h1>

        <form action="/" method="post" id="chat_form">
            <input type="text" name="message" id="message" placeholder="Your message..." size="50" autofocus />
            <input type="submit" id="send_message" value="Send" />
        </form>

        <section id="chat_zone">
            
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="fa fa-list"></span> Online</div>
                        <div class="list-group">
                            <a href="#" class="list-group-item"><span class="fa fa-user" id=""></span> Users</a>
                            <a href="#" class="list-group-item"><span class="fa fa-user-plus"></span> Customer Feedback</a>
                        </div>
                    </div>  
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2><span class="fa fa-users"></span> Users</h2><hr>
                </div>
            </div>
        </div>


        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="/socket.io/socket.io.js"></script>
        <script>

            // Connecting to socket.io
            var socket = io.connect('http://localhost:3000');

            // The username is requested, sent to the server and displayed in the title
            var username = 'pogi'; //prompt('What\'s your username?');
            socket.emit('new_client', username);
            document.title = username + ' - ' + document.title;

            // When a message is received it's inserted in the page
            socket.on('message', function(data) {
                insertMessage(data.username, data.message)
            })

            // When a new client connects, the information is displayed
            socket.on('new_client', function(username) {
                $('#chat_zone').append('<p><em>' + username + ' has joined the chat!</em></p>');
            })

            // When the form is sent, the message is sent and displayed on the page
            $('#chat_form').submit(function () {
                var message = $('#message').val();
                socket.emit('message', message); // Sends the message to the others
                insertMessage(username, message); // Also displays the message on our page
                $('#message').val('').focus(); // Empties the chat form and puts the focus back on it
                return false; // Blocks 'classic' sending of the form
            });
            
            // Adds a message to the page
            function insertMessage(username, message) {
                $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');
            }
        </script>
    </body>
</html>
