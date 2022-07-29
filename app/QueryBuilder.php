<?php
namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder{
    private $pdo;
    private $queryFactory;
    public function __construct()
    {
        $this->pdo =  new PDO("mysql:host=localhost;dbname=coral;charset=utf8", "root", "root");
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table){

        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])->from($table);


        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function query($sql){

    }
}
