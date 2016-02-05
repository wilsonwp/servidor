<?php
/*Create a server variable with the link to the tcp IP and custom port you need to
specify the Homestead IP if you are using homestead or, for local environment using
WAMP, MAMP, ... use 127.0.0..1*/

$server = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('tcp://127.0.0.1')
);

//Manages the message event to get send data for each client using the broadcast method
$server->on('message', function ( Hoa\Core\Event\Bucket $bucket ) {
    $data = $bucket->getData();
    echo 'message: ', $data['message'], "\n";
    $bucket->getSource()->broadcast($data['message']);
    return;
});
//Execute the server
$server->run();