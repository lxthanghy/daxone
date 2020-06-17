<?php

namespace App\Models;

class District
{
    private $id;
    private $name;
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}