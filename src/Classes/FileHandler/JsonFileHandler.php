<?php
declare(strict_types=1);

namespace Classes\FileHandler;

use Classes\Device;
use Classes\Topology;

class JsonFileHandler implements FileHandlerInterface
{

    /**
     * @throws \Exception
     */
    public function serialize(Topology $topology): void
    {
        $filePath= FILE_STORAGE_PATH.'topology_'.$topology->id().".json";
        $my_file = fopen($filePath, "w") or die("Unable to open file!");
        if(!$my_file){
            throw new \Exception("Unable to open file $filePath.");
        }

        $topology_array = $this->normalizeTopologyForOutPut($topology);
        $json = json_encode($topology_array,JSON_PRETTY_PRINT);
        if(file_exists($filePath)){
            file_put_contents($filePath,$json);
        }
        else{
            throw new \Exception("File: $filePath not found.");
        }
    }


    /**
     * @throws \Exception
     */
    public function loadFromFile(string $filePath)
    {
        if(file_exists($filePath)){
            $json = file_get_contents($filePath);
            $topology_array = json_decode($json,true);
        }
        else{
            throw new \Exception("File: $filePath not found.");
        }

        $this->validateTopologyInput($topology_array);

        $topology_array = $this->normalizeTopologyInput($topology_array);

        $topology = Topology::fromArray($topology_array, new static());

        return $topology;
    }

    /**
     * takes an array that represents a topology. The array contains 'id' as a string and
     * 'components' as a 2d array that represents the devices.
     * and then checks if the given data is valid.
     * it returns True if the data is valid, and Throws Exception otherwise.
     * @param array $topology_array
     * @throws \Exception
     * @return true
     */
    public function validateTopologyInput(array $topology_array )
    {
        if(!isset(
            $topology_array['id'],
            $topology_array ['components'],
        )){
            throw new \Exception("Invalid Topology Array");
        }

        $this->validateDevicesInput($topology_array ['components']);

        return true;
    }

      /**
     * takes an 2d array that represents devices.
     * and then checks if the given data is valid.
     * it returns True if the data is valid, and Throws Exception otherwise.
     * @param array $devices_array
     * @return true
     *@throws \Exception
     */
    public function validateDevicesInput(array $devices_array)
    {
        foreach ($devices_array as $device) {
            if (!isset(
                $device['type'],
                $device['id'],
            )) {
                throw new \Exception("Invalid Device Array");
            }
        }
        return true;
    }

    /**
     * takes an array that represents a topology. The array contains 'id' as a string and
     * 'components' as a 2d array that represents the devices.
     * and then normalizes it to be ready to be converted into a Topology object and returns the new normalized array.
     * @param array $topology_array
     * @return array
     * @throws \Exception
     */
    public function normalizeTopologyInput(array $topology_array ){
        $devices=[];
        foreach ($topology_array ['components'] as $deviceArray){
            $device = Device::fromArray($deviceArray);
            $devices[$device->getId()]=$device;
        }

        unset($topology_array ['components']);
        $topology_array['devices']=$devices;
        return $topology_array;
     }

    public function normalizeTopologyForOutPut(Topology $topology)
    {
        $array['id'] = $topology->id();
        $array['components'] = [];
        foreach ($topology->Devices() as $device ){
            $array['components'][] = $this->normalizeDeviceForOutPut($device);
        }
        return $array;
    }

    public function normalizeDeviceForOutPut(Device $device): array
    {
        $array = get_object_vars($device);

        unset($array['net_lists_ids']);

        if(count($array['resistance']) == 0){
            unset($array['resistance']);
        }
        if(count($array['m1']) == 0){
            unset($array['m1']);
        }

        $netlist = $array['net_lists'];
        unset( $array['net_lists']);
        $array['netlist'] = $netlist;

        if(isset($array['m1'])) {
            $m1 = $array['m1'];
            unset($array['m1']);
            $array['m(1)'] = $m1;
        }


        return $array;

    }




}


