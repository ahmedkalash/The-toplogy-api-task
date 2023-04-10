<?php
declare(strict_types=1);
namespace Classes\FileHandler;

use Classes\Topology;

interface FileHandlerInterface
{
    public function serialize(Topology $topology);
    public function loadFromFile(string $filePath): Topology;

}