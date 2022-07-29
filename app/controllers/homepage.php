<?php
use App\QueryBuilder;

$db = new QueryBuilder();
$db->update('tasks', 7, ['text' => 'yовый текст']);

