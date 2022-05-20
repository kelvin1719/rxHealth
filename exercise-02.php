<?php
require_once "db.php";

function get_order($id)
{
    global $db;
    $orders_query = $db->prepare("SELECT * FROM `order` WHERE id = ?");
    $orders_query->execute(array($id));
    $result = $orders_query->fetchAll();

    return json_encode($result,JSON_PRETTY_PRINT, 30);
    $db = null ;
}

//echo get_order(10248);

function get_orders()
{
    global $db;
    $orders_query = $db->prepare("SELECT * FROM `order`");
    $orders_query->execute();
    $result = $orders_query->fetchAll();

    return json_encode($result,JSON_PRETTY_PRINT, 30);

}
function get_order_with_details($id)
{
    global $db;
    $orders_query = $db->prepare("SELECT * FROM `Order` LEFT JOIN  OrderDetail ON `Order`.`Id` = `OrderDetail`.`OrderId` WHERE `Order`.`Id`=?");
    $orders_query->execute(array($id));
    $result = $orders_query->fetchAll();
    return json_encode($result,JSON_PRETTY_PRINT, 30);
}


//echo get_orders();
echo get_order_with_details(10248);
