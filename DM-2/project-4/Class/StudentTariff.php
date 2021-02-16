<?php

class StudentTariff extends AbstractTariff
{	
    public function priceKilometer()
    {
        return 4;
    }
    
    public function priceMinute()
    {
        return 1;
    }
}