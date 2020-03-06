<?php
require 'vendor/autoload.php';

use Siler\Functional as λ;
use Siler\Route;
use Siler\Twig;

Twig\init('app/views');
Route\get('/', function(){
	echo Twig\render('home.html');
});
