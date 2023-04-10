<?php

require_once __DIR__ . '/../vendor/autoload.php';

//$container = new \Pimple\Container();
//
//$container['FileHandlerInterface']=
//     fn($c)=> new Classes\FileHandler\JsonFileHandler();
//
//$container['TopologiesCollection']=
//    fn($c)=> new Classes\TopologiesCollection($container['FileHandlerInterface'],);
//
//$container['TheTopologyApi']=
//    fn($c)=> new Classes\Api\TheTopologyApi($container['TopologiesCollection'],);
//
//$topology_api = $container['TheTopologyApi'];
//$topology_api()->

$file_Handler = new \Classes\FileHandler\JsonFileHandler();
$topologies_collection = new \Classes\TopologiesCollection($file_Handler);
$topology_api = new \Classes\Api\TheTopologyApi($topologies_collection);


const FILE_STORAGE_PATH = __DIR__.'/'.'FileStorage/';

$loaded_topology = $topology_api->loadFromFile(FILE_STORAGE_PATH.'apiTopology.json');
echo '<pre>';
var_dump( $topology_api->inMemory());


$topology_api->serialize($loaded_topology->id());




print_r($loaded_topology->Id());


