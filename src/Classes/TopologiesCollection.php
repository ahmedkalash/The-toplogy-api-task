<?php
declare(strict_types=1);
namespace Classes;

use Classes\FileHandler\FileHandlerInterface;


class TopologiesCollection
{
    /**
     *@var  array<string,Topology> $Topologies
     */
    private array $Topologies;

    /***
     * @param FileHandlerInterface $fileHandler
     * @var array<string,Topology> $Topologies
     */
    public function __construct(
        private FileHandlerInterface $fileHandler,
        array $topologies=[],
    ){
        foreach ($topologies as  /** @var Topology $topology */ $topology ){
            $this->Topologies[$topology->id()]= $topology;
        }
    }

    /**
     * @throws \Exception
     */
    public function loadFromFile($filePath): Topology
    {
        $topology = $this->fileHandler->loadFromFile($filePath);
        $this->Topologies[$topology->id()]=$topology;
        return $topology;
    }

    /**
     * @throws \Exception
     */
    public function serialize(string $topology_id): void
    {
        $this->get($topology_id)->serialize();
    }
    public function has(string $topology_id): bool
    {
        return isset($this->Topologies[$topology_id]);

    }

    public function delete(string $topology_id): void
    {
        unset($this->Topologies[$topology_id]);
    }
    public function get(string $topology_id): ?Topology
    {
        return $this->Topologies[$topology_id]?? null;
    }
    /**
     * @return array<Device>
     * */
    public function netListDevices(string $topology_id,string $net_list_id): array
    {
        return $this->get($topology_id)->netListDevices($net_list_id);
    }


}