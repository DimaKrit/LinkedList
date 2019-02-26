<?php

require_once __DIR__.'/src/LinkedList.php';
require_once __DIR__.'/src/SeparateNode.php';

$linkedList = new LinkedList();

$linkedList->append("new item1");
$linkedList->append("new item2");
$linkedList->append("new item3");
$linkedList->append("new item4");
$linkedList->append("new item7");

$linkedList->insertAfterAt('new item1' ,'new item10');

$linkedList->insertBeforeAt('new item3' ,'new item104');

//$linkedList->deleteAt('new item3');

//die(var_dump($linkedList->search(4)));

die(var_dump($linkedList->current()));

