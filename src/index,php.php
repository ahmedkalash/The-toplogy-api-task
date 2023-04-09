<?php

namespace swt\index;



class Device
{
    private string $type='a';
    public string $id='123';
    public array $resistance=['r1'=>25];
    public array $net_list=['n1'=>3];
    public function toArray(){
        $arr = get_object_vars($this);
        unset($arr['id']);
        return $arr;
    }

}
$obj = new Device();



echo json_encode($obj->toArray(),JSON_PRETTY_PRINT);
