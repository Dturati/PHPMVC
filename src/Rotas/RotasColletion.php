<?php
namespace App\Rotas;

class RotasColletion
{

    protected $colletion  = [];

    public function __construct(){
        echo 'RotasColletion';
    }

    public function add(string $method, string $path, $callback)
    {
            if(isset($this->colletion[$method])){
                
            }
    }
}