<?php

class BasicTariff extends AbstractTariff
{
    public function priceKilometer()
    {
        return 10;
    }
    
    public function priceMinute()
    {
        return 3;
    }
}