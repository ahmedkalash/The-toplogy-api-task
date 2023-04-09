<?php
declare(strict_types=1);
namespace swt\FileHandler;

interface FileHandlerInterface
{
    public function serialize();
    public function loadFromFile();

}