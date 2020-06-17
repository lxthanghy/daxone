<?php

namespace App\Models;

class Province
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
