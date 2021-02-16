<?php

interface iTariff
{
    public function priceKilometer();
    
    public function priceMinute();
    
    public function sum($distance, $time, $gps, $driver);
}