<?php
require 'vendor/autoload.php';

use Siler\Functional as λ;
use Siler\Route;
use Siler\Twig;
use Siler\Http\Request;
use Siler\Http\Response;

Twig\init('app/views');
$pdo = new \PDO( 'sqlite:database.sqlite' );
$db = new \LessQL\Database( $pdo );	

Route\get('/', function(){
	echo Twig\render('home.html');
});

Route\post('/', function() use ($db) {

	$row = $db->createRow('snippets',array(
	    'title' => Request\post('title'),
	    'snippet' => Request\post('code'),
	));	
	$row->save();

	Response\redirect('/'.$row->id);
});

Route\get('/{id}', function( array $routeParams ) use ($db){
	$snippet = $db->snippets()->where('id',$routeParams['id'])->fetch();
	// var_dump($snippet->snippet);
	echo Twig\render( 'edit.twig', ['code'=>$snippet->snippet] );
});