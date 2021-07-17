<?php
require 'vendor/autoload.php';
require 'db.php';

$app = new \Slim\App;

////GET - endpoints, api for the get requests
$app->get('/', function ($request,  $response, $args) {
    $response->getBody()->write("this is the root directory");

    return $response;
});

$app->get('/messages', function ($request,  $response, $args) {

    $sql = "SELECT * FROM messages";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $response->getBody()->write(json_encode($messages));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

$app->get('/notifications', function ($request,  $response, $args) {

    $sql = "SELECT * FROM notifications";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $notifications = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $response->getBody()->write(json_encode($notifications));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    }catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

$app->get('/messages/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM messages WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $message = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        $response->getBody()->write(json_encode($message));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

$app->get('/notifications/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM notifications WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $notification = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        $response->getBody()->write(json_encode($notification));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

$app->get('/messages/group/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM messages WHERE chat = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        $response->getBody()->write(json_encode($messages));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
});

$app->post('/messages',function($request, $response, $args){
    //connect to database

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $sender = $input["sender"];
    $chat = $input["chat"];
    $text = $input["text"];


    try {
        
        $sql = "INSERT INTO messages (sender, chat, text) VALUES (:sender, :chat, :text)";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':sender', $sender);
        $stmt->bindValue(':chat', $chat);
        $stmt->bindValue(':text', $text);
    
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
    
        $data = array(
            "status" => "success",
            "rowcount" =>$count
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')
        ->withAddedHeader('Access-Control-Allow-Origin', 'https://www.normalgroup.tk')
        ->withAddedHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withAddedHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withStatus(200);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
        
});

$app->run();