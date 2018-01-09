<?php
require_once __DIR__."/vendor/autoload.php";

use App\Rotas\RotasCollection;
use App\Rotas\Rotas;
$path_info = $_SERVER['PATH_INFO'] ?? '/';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$rotas = new Rotas($path_info,$request_method);

$rotas->get("/hello/{name}",function($params){
    return "Meu nome é " . $params[1];
});
$result = $rotas->run();    
var_dump($result['callback']($result['params']));