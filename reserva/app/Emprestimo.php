<?php
namespace App;
use PDO;
class Emprestimo{
    public $id;
    public $id_item;
    public $id_servidor;
    public $data_emprestimo;
    public $data_devolucao;

    public function cadastrar(){
        $db = new DataBase('Emprestimo');
        $db->insert([
            "id_item" => $this->id_item,
            "id_servidor" => $this->id_servidor,
            "data_emprestimo" => $this->data_emprestimo,
            "data_devolucao" => $this->data_devolucao
        ]);
    }
    public function alterar()
    {
        return (new DataBase('Emprestimo'))->update('id='.$this->id,[            
            "id_item" => $this->id_item,
            "id_servidor" => $this->id_servidor,
            "data_emprestimo" => $this->data_emprestimo,
            "data_devolucao" => $this->data_devolucao
        ]);
    }
    public function excluir(){
        return (new DataBase('Emprestimo'))->delete('id='.$this->id);

    }
    public static function listar($where = null, $order = null, $limit = null){
        return (new DataBase('Emprestimo'))->select()->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('Emprestimo'))->select('id = '.$id)->fetchObject(self::class);
    }
}
