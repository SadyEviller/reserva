<?php
namespace App;
use PDO;
class Servidor
{
    public $id;
    public $nome;
    public $matricula;
    public $cpf;
    public $telefone;
    public $email;
    public $endereco;
    public $dtn;

    public function cadastrar()
    {

        $db = new DataBase('servidor');
        $db->insert([
            "nome" => $this->nome,
            "matricula" => $this->matricula,
            "cpf" => $this->cpf,
            "telefone" => $this->telefone,
            "email" => $this->email,
            "endereco" => $this->endereco,
            "dtn" => $this->dtn
        ]);
        return true;
    }
    public function alterar()
    {
        return (new DataBase('servidor'))->update("id=".$this->id,[            
            "nome" => $this->nome,
            "matricula" => $this->matricula,
            "cpf" => $this->cpf,
            "telefone" => $this->telefone,
            "email" => $this->email,
            "endereco" => $this->endereco,
            "dtn" => $this->dtn
        ]);
    }
    public function excluir(){
        return (new DataBase('servidor'))->delete('id='.$this->id);

    }
    public static function listar($where = null, $order = null, $limit = null){
        return (new DataBase('servidor'))->select()->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('servidor'))->select('id = '.$id)->fetchObject(self::class);
    }
}