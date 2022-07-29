<?php
use App\QueryBuilder;

$db = new QueryBuilder();
$result = $db->getAll('category');
var_dump($result);
