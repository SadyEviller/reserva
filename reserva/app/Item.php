<?php
namespace App;
Use PDO;
class Item{
    public $id;
    public $nome;
    public $descricao;
    public $patrimonio;
    public function alterar(){
        return (new DataBase ('item'))->update($this->id,[
            "nome"=> $this->nome,
            "descricao"  => $this->descricao,
            "patrimonio" => $this->patrimonio
        ]);
    }
    public function cadastrar(){
        
        $db = new DataBase('item');
        $db->insert([
            "nome"       => $this->nome,
            "descricao"  => $this->descricao,
            "patrimonio" => $this->patrimonio
        ]);
        return true;        
    } 
    public function excluir(){
        return (new DataBase ('item'))->delete('id='.$this->id);
    }
    public static function listar($where = null , $order = null , $limit = null){ //static permite chamar a classe sem o uso do new.
        return (new DataBase('item')) ->select()->fetchAll( PDO::FETCH_CLASS,self::class);
    }
}