<?php

abstract class AbstractTariff implements iTariff
{
    use Driver;
    use Gps;
    
    abstract public function priceKilometer();
    
    abstract public function priceMinute();
    
    public function sum($distance, $time, $gps = false, $driver = false)
    {
        $driver = ($driver)? $this->driver() : 0;
        $gps = ($gps)? $this->gps($gps) : 0;
        
        return $this->priceKilometer() * $distance + $this->priceMinute() * $time + $gps + $driver;
    }
}