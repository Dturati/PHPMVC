<?php
namespace App\Rotas;

use Illuminate\Support\Collection;

class RotasColletion
{

    protected $colletion  = [];

    public function __construct()
    {
        echo 'RotasColletion';
    }

    public function add(string $method, string $path, $callback)
    {
        if (isset($this->colletion[$method])) {
            $this->colletion[$method] =  new Collection();
        }

        $this->colletion[$method]->put($path, $callback);
    }
}
