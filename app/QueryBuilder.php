<?php
class QueryBuilder{
    protected $pdo;
    public function getAll($table){
        $select = $queryFactory->newSelect();
        $select->cols(["*"])->from('category');

        $pdo = new PDO("mysql:host=localhost;dbname=coral;charset=utf8", "root", "root");
        $sth = $pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        var_dump($result);
    }
}
