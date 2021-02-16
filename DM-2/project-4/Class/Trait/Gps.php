<?php

trait Gps
{
    protected $price = 15;
    
    public function gps($time)
    {
        $time = ceil($time / 60) * 60;
        return $time * $this->price;
    }
}