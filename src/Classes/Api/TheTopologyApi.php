<?php

namespace Classes\Api;

use Classes\Device;
use Classes\TopologiesCollection;
use Classes\Topology;

class TheTopologyApi
{

    public function __construct(
        private TopologiesCollection $topologiesCollection
    ){}

    /**
     * reads a topology from a file to the memory
     * @throws \Exception
     */
    public function loadFromFile($filePath): Topology
    {
        return $this->topologiesCollection->loadFromFile($filePath);
    }

    /**
     * writes a topology from the memory to a file.
     * the file is created in FileStorage directory with a name like topology_{topology_id}.json
     * @throws \Exception
     */
    public function serialize(string $topology_id): void
    {
        $this->topologiesCollection->serialize($topology_id)  ;
    }
    /**
     * returns a TopologiesCollection object that contains all the topologies in the memory.
     * */
    public function inMemory(): TopologiesCollection
    {
        return $this->topologiesCollection;
    }

    /**
     * deletes a given topology from the memory
     * */
    public function delete(string $topology_id): void
    {
        $this->topologiesCollection->delete($topology_id);
    }
    /**
     * returns an array that contains all the devices in a given topology.
     * @return array<Device>
     * */
    public function topologyDevices(string $topology_id): array
    {
        return $this->topologiesCollection->get($topology_id)->Devices();
    }

     /**
      * returns an array that contains all the devices
      * that are connected to a given netlist in a given topology.
      * */
    public function netListDevices(string $topology_id,string $net_list_id): array
    {
        return $this->topologiesCollection->netListDevices($topology_id, $net_list_id);
    }



}