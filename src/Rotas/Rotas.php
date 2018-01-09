<?php
namespace App\Rotas;
use App\Rotas\RotasCollection;

class Rotas
{   
    private $colletion;
    private $path;
    private $method;

    public function __construct(string $path,string $method)
    {
       $this->colletion = new RotasCollection();   
       $this->path = $path;
       $this->method = $method;
    }
    
    public function get($path, $fn)
    {
        $this->request('GET',$path,$fn);
    }

    public function post($path, $fn)
    {
        $this->request('POST',$path,$fn);
    }

    public function request($method, $path, $callBack)
    {
        $this->colletion->add($method,$path,$callBack);
    }

    public function getCollection()
    {
        print_r($this->colletion);
    }

    public function run()
    {
        $data = $this->colletion->filter($this->method);

        foreach($data as $key => $value){
            $result = $this->checkUrl($key, $this->path);
            $callBack = $value;
            if($result['result']){
                break;
            }
        }
        
        if(!$result['result']){
            $callBack = null;
        }

        return [
            'params' => $result['params'],
            'callback' => $callBack
        ];
    
    }

    private function checkUrl(string $toFind, $subjetc)
    {
        preg_match_all('/\{([^\}]*)\}/',$toFind, $variables);
        $regex = str_replace('/','\/',$toFind);

        foreach($variables[1    ] as $k => $variable){
            $as = explode(":",$variable);
            $replacement = $as[1] ?? '([a-zA-Z0-9\-\_\ ]+)';
            $regex = str_replace($variables[$k], $replacement, $regex);
            
        }
        
        $regex = preg_replace('/{([a-zA-Z]+)}/','([a-zA-Z0-9+])',$regex);
        
        $result = preg_match('/^'.$regex.'$/',$subjetc, $params);
        
        return compact('result','params');
    }

}   