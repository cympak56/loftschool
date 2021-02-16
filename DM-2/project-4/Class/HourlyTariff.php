<?php

class HourlyTariff extends AbstractTariff
{	
    public function priceKilometer()
    {
        return 0;
    }
    
    public function priceMinute()
    {
        return 200 / 60;
    }
    
    public function sum($distance, $time, $gps = false, $driver = false)
    {
        $time = ceil($time / 60) * 60;
        return parent::sum($distance, $time, $gps, $driver);
    }
}