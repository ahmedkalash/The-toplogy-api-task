<?php

namespace Classes\DIContainer;

use ReflectionClass;

class DIContainer
{
    /**
     * @throws \Exception
     */
    static private array $interfaces_mapping=[];

    /**
     * @throws \Exception
     */
    public static function make(string $fully_qualified_class_name):object
    {
        if(!class_exists($fully_qualified_class_name)){
            throw new \Exception("Class \"$fully_qualified_class_name\" does not exist.");
        }


        $reflection_class = new ReflectionClass($fully_qualified_class_name);

        if($reflection_class->isInterface()){
            return static::make(static::$interfaces_mapping[$fully_qualified_class_name]);
        }
        if(!$reflection_class->isInstantiable()){
            throw new \Exception("Class \"$fully_qualified_class_name\" is not instantiable .");
        }

        $reflection_constructor = $reflection_class->getConstructor();
        $reflection_parameters = $reflection_constructor->getParameters();
        foreach ($reflection_parameters as $reflection_parameter){
             $Reflection_type = $reflection_parameter->getType();
             //
        }
    }

}