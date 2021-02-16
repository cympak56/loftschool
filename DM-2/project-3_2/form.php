<?php
require_once('../Db.php');

if (isset($_POST)) {
    echo addOrder($_POST);
}else{
    echo 'Что-то пошло не так повторите попытку';
}

function addOrder($order) {
    $db = Db::getInstance();
    
    $street = ($order['street'])? $order['street'] : '-';
    $home   = ($order['home'])? $order['home'] : '-';
    $part   = ($order['part'])? $order['part'] : '-';
    $appt   = ($order['appt'])? $order['appt'] : '-';
    $floor  = ($order['floor'])? $order['floor'] : '-';
    $address = "Улица ".$street." дом ".$home." корпус ".$part." квартира ".$appt." этаж ".$floor;
    $payment = ($order['payment'] == 'on')? 1 : 0;
    $callback = ($order['callback'] == 'on')? 1 : 0;
    
    $query = "INSERT INTO users (`email`, `name`, `phone`)
    VALUES ('".$order['email']."', '".$order['name']."','".$order['phone']."')
    ON DUPLICATE KEY UPDATE `orders` = `orders` + 1;";
    
    $result = $db->exec($query, [], __FILE__);
    
    if ($result) {
        $userQuery = "SELECT `orders`, `user_id` FROM users WHERE `email` = '".$order['email']."';";
        $user = $db->fetchOne($userQuery, [], __FILE__);
    
        $query = "INSERT INTO orders (`address`, `comment`, `payment`, `callback`, `date`, `user_id`)
        VALUES ('".$address."','".$order['comment']."',".$payment.",".$callback.", NOW(),".$user['user_id'].")";
        
        $orderResult = $db->exec($query, [], __FILE__);
        
        if ($orderResult) {
            return '<p style="color: #fff;">Спасибо, ваш заказ будет доставлен по адресу: '.$address.'<br>
                  Номер вашего заказа: '.$db->lastInsertId().'<br>
                  Это ваш '.$user['orders'].' заказ!</p>';
        }
    }
    
    return '<p style="color: #fff;">Что-то пошло не так повторите попытку</p>';
}