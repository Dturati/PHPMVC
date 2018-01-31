<?php
class Teste{
    
    private $atributos = [];

    public function __construct(){

    }

    public function __invoke($var){
        return function()use($var){
            return $var;
        };
     }
     
    public function __get($key){
        return $this->atributos[$key];
    }

    public function __set($key, $value){
        $this->atributos[$key] = $value;
    }

    public function returnYield($var = [])
    {
        foreach($var as $dado)
        {
            yield $dado;
        }
    }
    
}

$teste = new  Teste();
//$res = $teste(['vetor']);

//var_dump($res());

//$teste->nome    =  "josé";
//$teste->idade   = 60;

//var_dump($teste->nome);

//$fun = function(){};

//$teste->classeAberta = 'Teste';

//$teste->metodoAberto =  function(){
//    return "David";
//};

//print_r($teste->classeAberta);
//print_r($teste->metodoAberto());
$teste->idade = 32;
print_r($teste->idade);

var_dump($teste);

    
