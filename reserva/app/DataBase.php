<?php
namespace App;
use PDO;
use PDOException;
class DataBase{
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'reserva';
    private $connection;
    private $table;
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }
    private function setConnection(){
        try{
            $this->connection = new PDO
            ('mysql:host='.self::HOST.';dbname='.self::DB,self::USER,self::PASS);
            //$this->connection->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }        
    }
    public function execute($query, $values = null){
        try{
            echo "<pre>";
            print_r($query);
            echo "</pre>";
            $statement = $this->connection->prepare($query);
            $statement->execute($values);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
    public function insert($array){
        $fields = array_keys($array);
        $binds = array_pad([], count($array),'?');
        $query = "INSERT INTO ".$this->table." (".implode(', ',$fields).")
        VALUES(".implode(', ',$binds).")";
        $this->execute($query,array_values($array));
        return $this->connection->lastInsertId();
        
    }
    public function update($where,$array){
        $query = "Update".$this->table." SET ".implode('=? , $fields').'WHERE'.$where; 
        $this->execute($query,array_values($array));
        return true;
    }
    public function delete($where){
        $query ="DELETE FROM ".$this->table." WHERE ". $where;
        $this->execute($query);
        return true;
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where)? " WHERE ". $where : '';   // é o mesmo que usar if($where = '') ! =se não existe    ? = se existir
        $order = strlen($order)? " Order by ". $order : '';   
        $limit = strlen($limit)? " Limit ". $limit : '';   
        
        $query = " SELECT  ". $fields." FROM ".$this->table . $where . $order . $limit; //SELECT * From Item Where nome = "caixa de som" orderBY nome Desc; -O asterisco(*) serve para buscar tudo. $fields = o campo de busca 
        return $this->execute($query);              
    }
}