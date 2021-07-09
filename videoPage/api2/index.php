<?php
require 'vendor/autoload.php';
require 'db.php';

$app = new \Slim\App;


//API menu
$app->get('/', function ($request,  $response, $args) {
    $response->getBody()->write("Welcome to videopage API!");

    return $response;
});




//Gets all contacts
$app->get('/allContacts', function ($request,  $response, $args) {
    

    $sql = "SELECT * FROM contacts";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $contact = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        
        $response->getBody()->write(json_encode($contact));
        return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
});

//Gets a certain contact
$app->get('/contact/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM contacts WHERE contact_id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    
});

//Adds a contact
$app->post('/addContacts',function($request, $response, $args){

    $contact_name = $request->getParam('name');
    $contact_location = $request->getParam('location');
    
    
        try {
            $sql = "INSERT INTO contacts (contact_name ,contact_location) VALUES (:contact_name ,:contact_location)";
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':contact_name', $contact_name);
            $stmt->bindParam(':contact_location', $contact_location);
        
            $result = $stmt->execute();
            
            $db = null;
        
            $response->getBody()->write(json_encode($result));
            return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
            
    
    
    });

//Deletes a contact
$app->delete('/deleteContact/{id}',function($request, $response, $args){

        $id = $args['id'];
        
        
            try {
                $sql = "DELETE FROM contacts WHERE contact_id = $id";
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
                
            
                $result = $stmt->execute();
                
                $db = null;
            
                $response->getBody()->write(json_encode($result));
                return $response->withHeader('content-type', 'application/json')->withStatus(200);
            
        }catch (PDOException $e) {
            $data = array(
                "message" => $e->getMessage()
            );
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('content-type', 'application/json')->withStatus(500);
        }
                
        
        
        });


//-------------------------------------------------------------------------------------------------
// Call History

//Gets all call history
$app->get('/allCallHistory', function ($request,  $response, $args) {
    

    $sql = "SELECT * FROM call_history";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $call_history = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        
        $response->getBody()->write(json_encode($call_history));
        return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
});

//Gets a certain call history
$app->get('/callHistory/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM call_history WHERE call_id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $call_history = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($call_history);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    
});

//Adds a call history
$app->post('/addCallHistory',function($request, $response, $args){

    $caller_name = $request->getParam('name');
    $call_duration = $request->getParam('call_duration');
    
    
        try {
            $sql = "INSERT INTO call_history (caller_name ,call_duration) VALUES (:caller_name ,:call_duration)";
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':contact_name', $caller_name);
            $stmt->bindParam(':contact_location', $call_duration);
        
            $result = $stmt->execute();
            
            $db = null;
        
            $response->getBody()->write(json_encode($result));
            return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
            
    
    
    });

//Deletes a call history
$app->delete('/deleteCallHistory/{id}',function($request, $response, $args){

        $id = $args['id'];
        
        
            try {
                $sql = "DELETE FROM call_history WHERE call_id = $id";
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
                
            
                $result = $stmt->execute();
                
                $db = null;
            
                $response->getBody()->write(json_encode($result));
                return $response->withHeader('content-type', 'application/json')->withStatus(200);
            
        }catch (PDOException $e) {
            $data = array(
                "message" => $e->getMessage()
            );
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('content-type', 'application/json')->withStatus(500);
        }
                
        
        
        });

//-------------------------------------------------------------------------------------
//Status
//Gets all status
$app->get('/allStatus', function ($request,  $response, $args) {
    

    $sql = "SELECT * FROM status";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $status = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        
        $response->getBody()->write(json_encode($status));
        return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
});

//Gets a certain status
$app->get('/status/{id}', function ($request,  $response, $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM status WHERE status_id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
    
        $stmt = $db->query($sql);
        $status = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($status);
    } catch(PDOException $e){
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    
});

//Adds a status
$app->post('/addStatus',function($request, $response, $args){

    $device_name = $request->getParam('name');
    $device_status = $request->getParam('status');
    
    
        try {
            $sql = "INSERT INTO status (device_name ,device_status) VALUES (:device_name ,:device_status)";
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':device_name', $device_name);
            $stmt->bindParam(':device_status', $device_status);
        
            $result = $stmt->execute();
            
            $db = null;
        
            $response->getBody()->write(json_encode($result));
            return $response->withHeader('content-type', 'application/json')->withStatus(200);
        
    }catch (PDOException $e) {
        $data = array(
            "message" => $e->getMessage()
        );
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('content-type', 'application/json')->withStatus(500);
    }
            
    
    
    });

//Deletes a status
$app->delete('/deleteStatus/{id}',function($request, $response, $args){

        $id = $args['id'];
        
        
            try {
                $sql = "DELETE FROM status WHERE status_id = $id";
                $db = new db();
                // Connect
                $db = $db->connect();
                $stmt = $db->prepare($sql);
                
            
                $result = $stmt->execute();
                
                $db = null;
            
                $response->getBody()->write(json_encode($result));
                return $response->withHeader('content-type', 'application/json')->withStatus(200);
            
        }catch (PDOException $e) {
            $data = array(
                "message" => $e->getMessage()
            );
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('content-type', 'application/json')->withStatus(500);
        }
                
        
        
        });


$app->run();