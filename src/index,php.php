<?php


require_once __DIR__ . '/../vendor/autoload.php';

$file_Handler = new \Classes\FileHandler\JsonFileHandler();
$topologies_collection = new \Classes\TopologiesCollection($file_Handler);
$topology_api = new \Classes\Api\TheTopologyApi($topologies_collection);


const FILE_STORAGE_PATH = __DIR__.'/'.'FileStorage/';

$loaded_topology = $topology_api->loadFromFile(FILE_STORAGE_PATH.'apiTopology.json');



echo '<pre>';
var_dump( $topology_api->inMemory());



$topology_api->serialize($loaded_topology->id());


echo "<hr><br>";
print_r($topology_api->topologyDevices($loaded_topology->id()));

echo "netListDevices<hr><br>";
print_r($topology_api->netListDevices($loaded_topology->id(),"vdd"));

