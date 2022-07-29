<?php
namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder{
    private $pdo;
    private $queryFactory;
    public function __construct()
    {
        $this->pdo =  new PDO("mysql:host=localhost;dbname=simple;charset=utf8", "root", "root");
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
    public function insert($table, $data){
        $insert = $this->queryFactory->newInsert();

        $insert->into($table)->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }
    public function deleteFromId($table, $id){
        $delete = $this->queryFactory->newDelete();

        $delete->from($table)->where('id = :id')->bindValue('id',$id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
    // todo create find
    public function update($table, $id, $data){
        $update = $this->queryFactory->newUpdate();
        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id')
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }
}
