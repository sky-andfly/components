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

        $delete
            ->from(table)                   // FROM this table
            ->where('zim = :zim')           // AND WHERE these conditions
            ->orWhere('gir = :gir')         // OR WHERE these conditions
            ->bindValue('bar', 'bar_val')   // bind one value to a placeholder
            ->bindValues([                  // bind these values to the query
                'baz' => 99,
                'zim' => 'dib',
                'gir' => 'doom',
            ]);
    }
}
