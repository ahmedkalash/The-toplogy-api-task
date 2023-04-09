<?php
declare(strict_types=1);
namespace swt\Classes;

use swt\FileHandler\FileHandlerInterface;


class TopologiesCollection
{

    /**
     *@var  array<string,Topology> $Topologies
     */
    private array $Topologies;

    /***
     * @var array<string,Topology> $Topologies
     * @param FileHandlerInterface $fileHandler
     */
    public function __construct(
        array $topologies,
        private FileHandlerInterface $fileHandler
    )
    {
        foreach ($topologies as  /** @var Topology $topology */ $topology ){
            $this->Topologies[$topology->getId()]= $topology;
        }
    }
    public function loadFromFile(){
        $this->fileHandler->loadFromFile();
    }
    public function serialize(){
        $this->fileHandler->serialize();
    }
    public function toArrayRecursively(){

    }
    public function delete(string $topology_id){
        unset($this->Topologies[$topology_id]);
    }
    public function get(string $topology_id){
        return $this->Topologies[$topology_id];
    }
    public function netListDevices(string $topology_id,string $net_list_id){
        return $this->Topologies[$topology_id]->netListDevices($net_list_id);
    }


}