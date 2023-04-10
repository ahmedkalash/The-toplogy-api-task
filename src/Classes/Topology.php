<?php
declare(strict_types=1);
namespace Classes;


use Classes\FileHandler\FileHandlerInterface;
use phpDocumentor\Reflection\Types\Array_;

class Topology
{
    /**
     * @param string $id
     * @param FileHandlerInterface $fileHandler
     * @param array<Device> $devices
     */
    public function __construct(
        private string $id,
        private readonly FileHandlerInterface $fileHandler,
        private array $devices=[],
    ){}
    public function id(): string
    {
        return $this->id;
    }
    public function Devices(): array
    {
        return $this->devices;
    }

    public function netListDevices(string $net_list_id): array
    {
        $net_list_devices =[];
        foreach ($this->devices as $device){
            if($device->isConnectedTo($net_list_id)){
                $net_list_devices[$device->id()]=$device;
            }
        }

        return $net_list_devices;
    }
    public function serialize(){
        $this->fileHandler->serialize($this) ;
    }

    /**
     * @param array<string, string|array<Device>> $topology_array
     * @return static
     * @throws \Exception
     */
    public static function fromArray(array $topology_array, FileHandlerInterface $fileHandler): static
    {
        // validation is not necessarily as it the data was validated in the file handler
        if(!isset(
            $topology_array['id'],
            $topology_array ['devices'],
        )){
            throw new \Exception("Invalid Array");
        }

        return new static(
            $topology_array['id'],
            $fileHandler,
            $topology_array['devices']
        );

    }

    public function has(string $device_id):bool
    {
        return isset($this->devices[$device_id]);
    }





}