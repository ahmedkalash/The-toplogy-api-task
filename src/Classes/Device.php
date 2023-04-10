<?php
declare(strict_types=1);
namespace Classes;

/**
 *
 */
class Device
{
    private array $net_lists_ids;

    /**
     * @param string $type
     * @param string $id
     * @param array<string, int> $resistance
     * @param array<string, int> $m1
     * @param array<string, string> $net_lists
     */
    public function __construct(
       private string $type,
       private string $id,
       private array $resistance=[],
       private array $m1=[],
       private array $net_lists=[]
    ){
       $this->fillNetListsIds($net_lists);
    }


    private function fillNetListsIds(array $net_list): void
    {
        foreach ($net_list as $net_list_id){
            $this->net_lists_ids[$net_list_id]=$net_list_id;
        }
    }

    public function type(): string
    {
        return $this->type;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function netLists(): array
    {
        return $this->net_lists;
    }

    public function isConnectedTo(string $net_list_id): bool
    {
        if(isset($this->net_lists_ids[$net_list_id])){
            return true;
        }
        return false;
    }



    public static function fromArray(array $array): static
    {
        // validation is not necessarily as it the data was validated in the file handler
        if(!isset(
            $array['type'],
            $array['id'],
        )){
            throw new \Exception("Invalid Array");
        }

        $device = new static(
            $array['type'],
            $array['id'],
            $array ['resistance']?? [],
            $array ['m(1)']?? [],
            $array ['netlist']?? []
        );
        $device->fillNetListsIds($device->netLists());
        return $device;
    }

    public function castToArray(): array
    {
        return get_object_vars($this);
    }


}












