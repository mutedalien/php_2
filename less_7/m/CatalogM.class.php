<?php

class CatalogM
{
public function getCatalog()
    {
        $res = PdoM::Instance()->Select(GOODS, true);
// echo "<pre>";        
// var_dump($res);
// echo "</pre>";
        return $res;
    }
   
}