<?php
namespace App;
use PDO;
class Emprestimo{
    public $id;
    public $item;
    public $servidor;
    public $data_emprestimo;
    public $data_devolucao;

    public function cadastrar(){
        $db = new DataBase('Emprestimo');
        $db->insert([
            "id_item" => $this->item->id,
            "id_servidor" => $this->servidor->id,
            "data_emprestimo" => $this->data_emprestimo,
            "data_devolucao" => $this->data_devolucao
        ]);
    }
    public function alterar()
    {
        return (new DataBase('Emprestimo'))->update('id='.$this->id,[            
            "id_item" => $this->item->id,
            "id_servidor" => $this->servidor->id,
            "data_emprestimo" => $this->data_emprestimo,
            "data_devolucao" => $this->data_devolucao
        ]);
    }
    public function excluir(){
        return (new DataBase('Emprestimo'))->delete('id='.$this->id);

    }
    public static function listar($where = null, $order = null, $limit = null){
        $emprestimos = (new DataBase('Emprestimo'))->select()->fetchAll(PDO::FETCH_CLASS, self::class);
        foreach ($emprestimos as $em){
            $em->item = Item::buscarPorId($em->id_item);
            $em->servidor = Servidor::buscarPorId($em->id_servidor);
        }
        return $emprestimos; 
    }
    public static function buscarPorId($id){
        $emprestimo = (new DataBase('Emprestimo'))->select('id = '.$id)->fetchObject(self::class);;
        $emprestimo->item = Item::buscarPorId($emprestimo->id_item);
        $emprestimo->servidor = Servidor::buscarPorId($emprestimo->id_servidor);
        return $emprestimo;
    }
}
