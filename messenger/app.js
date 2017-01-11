var app = require('express')(),
    server = require('http').createServer(app),
    io = require('socket.io').listen(server),
    ent = require('ent'), // Blocks HTML characters (security equivalent to htmlentities in PHP)
    fs = require('fs');

// Loading the page index.html
app.get('/', function (req, res) {
  res.sendFile(__dirname + '/index.html');
});

io.sockets.on('connection', function (socket, username) {

    var d = new Date();
  
    //var allConnectedClients = Object.keys(io.sockets.connected);
    //console.log(allConnectedClients)

    // When the username is received it’s stored as a session variable and informs the other people
    socket.on('new_client', function(username) {
        username = ent.encode(username);
        socket.username = username;
        //Broadcast new joined user
        socket.broadcast.emit('new_client', username);
        console.log(username +  ' is now active @ ' + d.toLocaleString());
    });

    //setInterval(IDLE, 1000)
    socket.on('recon',function(username){
      console.log(username + " is now re-active");
    });

     socket.on('idle',function(username,sec){
        if( sec >= 60 ){
            console.log(username + " is now IDLE");
        }
    });

    // When a message is received, the client’s username is retrieved and sent to the other people
    socket.on('message', function (message,uname) {
        message = ent.encode(message);
        socket.broadcast.emit('message', {username: socket.username, message: message});
        console.log(uname + ": " + message);
    }); 


    socket.on('forcedisconnect', function(username){
        socket.disconnect();
        console.log(username + " disconnected @ " + d.toLocaleString());
    });
});

server.listen(3000);
console.log("Server listening to " + 3000)
