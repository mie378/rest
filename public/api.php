<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('participants.db');
    }
}

 

$app = new \Slim\App;

$app->post(
	'/api/participants',
	
	function(Request $request, Response $response, array $args){
	$requestData = $request->getParsedBody();
	$db = new MyDB();
	
	$imie="'".$requestData['name']."'";
	$nazw="'".$requestData['surname']."'";
	if($imie=="''" || $nazw=="''")
	return $response->withStatus(400);
	$sql='INSERT INTO participant(firstname,lastname) VALUES('.$imie.','.$nazw.')';
	$db->query($sql);
	$db->close();
	return $response->withStatus(201);
	}
);



$app->run();