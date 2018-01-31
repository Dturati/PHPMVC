<?php
// require_once __DIR__."/vendor/autoload.php";
//phpinfo();
// die('aqui');
//  use App\Rotas\RotasCollection;
//  use App\Rotas\Rotas;
//  $path_info = $_SERVER['PATH_INFO'] ?? '/';
//  $request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
// var_dump($path_info);
// echo "<br>";
// var_dump($request_method);
// echo "<br>";
// $rotas = new Rotas($path_info,$request_method);

//  $rotas->get("/hello/{id}",function($params){
//      return "Meu nome é " . $params[1];
//  });
//  $result = $rotas->run();    
//  var_dump($result['callback']($result['params']));
$valores = [
    ['name' => 'david','idade' => 32,'sexo' => 'M'],
    ['name' => 'jose','idade' => 60,'sexo' => 'M'],
    ['name' => 'maria','idade' => 25,'sexo' => 'F'],
    ['name' => 'renata','idade' => 20,'sexo' => 'F'],
];
// class Teste{
//     public function getValores($arg){
//         return function($user)use($arg){
//             return $user[$arg];
//         };
//     }
// }

// $obj = new Teste();

// $res = array_map($obj->getValores('name'),$valores);

// print_r($res);


// $teste = "david";

// $func = function()use($teste){
//     print_r($teste."\n");
//     $teste = "José";
// };

// $func();

// function umYeld($valores)
// {
//     foreach($valores as $dados)
//     {
//          yield  $dados;
//     }
// }
// //$gen = umYeld($valores);
// foreach(umYeld($valores) as $g)
// {
//     print_r($g);
// }

// $data = yield $valores;
class Teste{
    private $nome;
    private $idade;
    private $i;
    public function __construct($nome, $idade, $i)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->i = $i;
    }
}

function criaUmMonteDeDavid()
{
    $davids = [];
    for($i = 0; $i <= 100000 ; $i++)
    {
        $davids [] = new Teste('David',32,$i);
    }
    return $davids;
}

function criaUmMontedeDavidUsandoYeld()
{

    for($i = 0; $i <= 100000 ; $i++)
    {
        yield new Teste('David',32,$i);
    }

}

$valor = 0;
$yieldComWhile = function($inicio, $fim)use($valor)
{
    while($inicio <= $fim)
    {
      $valor++;
      yield $valor;
     
    }
};

$gen =  criaUmMontedeDavidUsandoYeld();
$wl = $yieldComWhile(0,100);

