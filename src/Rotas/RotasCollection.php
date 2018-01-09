<?php
namespace App\Rotas;

use Illuminate\Support\Collection;

class RotasCollection
{

    protected $colletion  = [];

    public function __construct()
    {
        echo 'RotasColletion<br>';
    }

    public function add(string $method = null, string $path = null, $callback = null)
    {
        if (!isset($this->colletion[$method])) {
            $this->colletion[$method] =  new Collection();
        }
        $this->colletion[$method]->put($path, $callback);
    }

    public function filter($method)
    {
        if(!isset($this->colletion[$method])){
            $this->colletion[$method] = new Collection();
        }

        return $this->colletion[$method];
    }

    public function all()
    {
        return $this->colletion;
    }
}
