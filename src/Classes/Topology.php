<?php
declare(strict_types=1);
namespace swt\Classes;


use swt\FileHandler\FileHandlerInterface;

class Topology
{
    /**
     * @param string $id
     * @param array<Device> $devices
     * @param FileHandlerInterface $fileHandler
     */
    public function __construct(
        private string $id,
        private array $devices,
        private FileHandlerInterface $fileHandler
    ){}
    public function getDevices() {
        return $this->devices;
    }
    public function setDevices(array $devices){
        return $this->devices = $devices;
    }
    public function netListDevices(string $net_list_id ){
        $net_list_devices =[];
        foreach ($this->devices as $device){
            if($device->isConnectedTo($net_list_id)){
                $net_list_devices[]=$device;
            }
        }
        return $net_list_devices;
    }
    public function serialize(){
        return $this->fileHandler->serialize($this) ;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }




}