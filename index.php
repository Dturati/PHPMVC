<?php
require_once __DIR__."/vendor/autoload.php";
use App\Rotas\RotasController;

$rotas = new RotasController();
$rotas->add();