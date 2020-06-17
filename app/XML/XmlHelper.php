<?php

namespace App\XML;

class XmlHelper
{
    private $xml;
    public function __construct($xml)
    {
        $this->xml = simplexml_load_file($xml);
    }
    public function load_province()
    {
        $provinces = [];
        foreach ($this->xml->children() as $item) {
            if ($item['type'] == "province") {
                $province = ['id' => $item['id'], 'name' => $item['value']];
                array_push($provinces, $province);
            }
        }
        return $provinces;
    }

    public function load_district($province_id)
    {
        $districts = [];
        $district = null;
        $province = null;
        foreach ($this->xml->children() as $item) {
            if ($item['type'] == "province" && $item['id'] == $province_id) {
                $province = $item;
                break;
            }
        }
        foreach ($province->children() as $item) {
            $district = ['id' => $item['id'], 'name' => $item['value']];
            array_push($districts, $district);
        }
        return $districts;
    }

    public function load_precinct($province_id, $district_id)
    {
        $precincts = [];
        $province = null;
        $district = null;
        foreach ($this->xml->children() as $item) {
            if ($item['type'] == "province" && $item['id'] == $province_id) {
                $province = $item;
                break;
            }
        }
        foreach ($province->children() as $item) {
            if ($item['type'] == "district" && $item['id'] == $district_id) {
                $district = $item;
                break;
            }
        }
        foreach ($district->children() as $item) {
            array_push($precincts, $item['value']);
        }
        return $precincts;
    }
}
