<?php
require_once('Class/Trait/Gps.php');
require_once('Class/Trait/Driver.php');
require_once('Class/Interface/iTariff.php');
require_once('Class/AbstractTariff.php');
require_once('Class/BasicTariff.php');
require_once('Class/HourlyTariff.php');
require_once('Class/StudentTariff.php');

$base = new BasicTariff();
echo 'Тариф базовый: '.$base->sum(12, 23, false, true) . ' руб <br>';

$hourly = new HourlyTariff();
echo 'Тариф почасовой: '.$hourly->sum(0, 23, false, true) . ' руб <br>';

$student = new StudentTariff();
echo 'Тариф студенческий: '.$student->sum(12, 23) . ' руб <br>';