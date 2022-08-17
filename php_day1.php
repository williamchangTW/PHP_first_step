<?php
// day1: output
echo "Hello World!\n";

// day2: variable define
$var = "Give your name:";
echo $var." William\n";

$var1 = 100;
$res = $var1 + 10 / 2;
echo $res."\n";

//day3: if else expression
$weather = "rainning";
if ($weather = "rainning") 
{
    echo "bring an umbrella\n";
    echo "wear a raincoat\n";
    echo "wear rain boots\n";
} 
else
{
    echo "play basketball\n";
}

//day4 : loop
$order_total = array();
$order_total['1221000'] = 100;
$order_total['1221001'] = 200;
$order_total['1221002'] = 300;
$order_total['1221003'] = 400;
$order_total['1221004'] = 500;
$order_total['1221005'] = 150;
$order_total['1221006'] = 200;
$order_total['1221007'] = 300;

$order_recieve = array();
$order_recieve['1221000'] = 100;
$order_recieve['1221001'] = 200;
$order_recieve['1221002'] = 300;
$order_recieve['1221003'] = 400;
$order_recieve['1221004'] = 0;
$order_recieve['1221005'] = 150;
$order_recieve['1221006'] = 0;

$order_not_exist = array();
$order_zero = array();
foreach($order_total as $order_id => $order_total)
{
    echo $order_id."\n";
    if (isset ($order_recieve[$order_id]))
    {
        echo $order_id."\n";
        if ($order_recieve[$order_id] != $order_total)
        {
            $order_zero[] = $order_total;
        }
    } else {
        $order_not_exist[] = $order_id;
    }
}
echo "Order not recieved: \n";
print_r($order_zero);
echo "Order not exist: \n";
print_r($order_not_exist);

// day5:
// case 1: str operation
foreach ($order_recieve as $key => $val)
{
    $month = substr($key, 0, 2);
    $day = substr($key, 2, 2);
    $count = substr($key,4, 3);
    echo "month: $month \n";
    echo "day: $day \n";
    echo "count: $count \n";
}

// case 2: class