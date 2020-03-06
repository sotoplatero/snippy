<?php
require 'vendor/autoload.php';

use Siler\Route;
use Siler\Twig;
use Siler\Http\Request;
use Siler\Http\Response;
	
$curl = curl_init('https://snippets-f1de.restdb.io/rest/snippets');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Cache-Control: no-cache',
  'X-Apikey: d9138783c9c70b15a9201763949b9d10d5de5',
  'Content-Type: application/json'	
]);


Twig\init('app/views');

Route\get('/', function(){
	echo Twig\render('home.html');
});

Route\post('/', function() use ($curl) {

	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode(['code' => Request\post('code')] ));

	try {
		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response) ;

		Response\redirect('/'.$response->_id);
		
	} catch (HttpException $ex) {
	  echo $ex;
	}

});

Route\get('/{id}', function( array $routeParams ) {

	$curl = curl_init('https://snippets-f1de.restdb.io/rest/snippets/'.$routeParams['id']);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
	  'Cache-Control: no-cache',
	  'X-Apikey: d9138783c9c70b15a9201763949b9d10d5de5',
	  'Content-Type: application/json'	
	]);
	$response = curl_exec($curl);
	curl_close($curl);
	$response = json_decode($response) ;

	echo Twig\render( 'edit.twig', [ 'code' => $response->code ] );
});