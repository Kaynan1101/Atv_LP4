<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{
    /**
     * @var string
     */
    const HOST = 'localhost';

    /**
     * @var string
     */
    const NAME = 'crud_cpv';

    /**
     * @var string
     */
    const USER = 'root';

       /**
     * @var string
     */
    const PASS = '';


    /**
     * @var string
     */
    private $table;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param string
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }

    }


    /**
     * @param string
     * @param array
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }

    }

    /**
     * @param array
     * @return interger
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        //MONTAGEM DA QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';



        //executa o insert
        $this->execute($query,array_values($values));
        return $this->connection->lastInsertId();


    }

    /**
     * @param string
     * @param string
     * @param string
     * @param string
     * @return PDOStatement
     * 
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT' .$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);

    }

}