<?php
declare(strict_types=1);
namespace swt\Classes;



class Device
{
    private array $net_lists;
    public function __construct(
       private string $type,
       private string $id,
       private array $resistance,
       private array $m1,
       private array $net_list
    ){
        foreach ($net_list as $net_list_id){
            $this->net_lists[]=$net_list_id;
        }
    }


    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getResistance(): array
    {
        return $this->resistance;
    }

    public function setResistance(array $resistance): void
    {
        $this->resistance = $resistance;
    }

    public function getM1(): array
    {
        return $this->m1;
    }

    public function setM1(array $m1): void
    {
        $this->m1 = $m1;
    }

    public function getNetList(): array
    {
        return $this->net_list;
    }

    public function setNetList(array $net_list): void
    {
        $this->net_list = $net_list;
    }

    public function isConnectedTo(string $net_list_id){
        if(isset($this->net_lists[$net_list_id])){
            return true;
        }
        return false;
    }
    public function toArray(){
       $array = get_object_vars($this);
       unset($array['net_lists']);
       if(count($array['resistance']) == 0){
           unset($array['resistance']);
       }
       if(count($array['m1']) == 0){
           unset($array['m1']);
       }
       return $array;
    }


}












