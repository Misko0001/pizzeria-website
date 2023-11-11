<?php 

if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}

// Daily earnings
$sql = "SELECT 
            LEFT(`user_order_sent_at`, 10) AS `user_order_date`, 
            SUM(`user_order_price`) AS `user_order_total_price`, 
            `user_order_is_delivered`,
            `user_order_sent_at`
        FROM `user_order`
        WHERE `user_order_is_delivered` = 1
        GROUP BY `user_order_date`
        ORDER BY `user_order_date`";
$result = mysqli_query($connection, $sql);
$array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $day = substr($row["user_order_sent_at"], 8, 2);
    $month = substr($row["user_order_sent_at"], 5, 2);
    $year = substr($row["user_order_sent_at"], 0, 4);
    
    $months = ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"];
    for ($i = 1; $i <= 12; $i++) {
        if ($i == $month) {
            $month = $months[$i - 1];
        }
    }  
    $newDate = $day . ". " . $month . " " . $year . ".  ";
    $array[$newDate] = $row["user_order_total_price"];
}

$filter = 14;
if ($_POST) {
    $filter = $_POST["filter"];
}

$arrStart = 0;
if (sizeof($array) <= $filter) {
    $filter = sizeof($array);
} else if ($filter <= 0) {
    $filter = 1;
    $arrStart = sizeof($array) - 1;
} else {
    $arrStart = sizeof($array) - $filter;
}

$arr = array();
foreach ($array as $date => $price) {
    if ($arrStart <= 0) {
        $arr[$date] = $price;
    } else {
        $arrStart--;
    }
}

$path = "./public/js/daily-earnings.json";
$jsonArray = json_encode($arr, JSON_PRETTY_PRINT);

$fp = fopen($path, 'w');
fwrite($fp, $jsonArray);
fclose($fp);

// Number of products sold in the previous month
$sql = "SELECT `user_order_sent_at` 
        FROM `user_order` 
        ORDER BY `user_order_sent_at` DESC
        LIMIT 1";
$date = mysqli_fetch_assoc(mysqli_query($connection, $sql));
$month = substr($date["user_order_sent_at"], 5, 2) - 1;
$year = substr($date["user_order_sent_at"], 0, 4);
if ($month == 0) {
    $month = 12;
    $year--; 
}

$sql = "SELECT `food_name`, SUM(`food_user_order_amount`) as food_sum
        FROM `food_user_order`
        INNER JOIN `food` ON `food_user_order`.`food_id` = `food`.`food_id`
        INNER JOIN `user_order` ON `food_user_order`.`user_order_id` = `user_order`.`user_order_id`
        WHERE `user_order_sent_at` REGEXP '^$year-$month'
        GROUP BY `food_name`
        ORDER BY `food_sum` DESC";
$result = mysqli_query($connection, $sql);
$array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $array[$row["food_name"]] = $row["food_sum"];
}

$path = "./public/js/monthly-amount.json";
$jsonArray = json_encode($array, JSON_PRETTY_PRINT);

$fp = fopen($path, 'w');
fwrite($fp, $jsonArray);
fclose($fp);

include TEMPLATE_ADMINISTRATION;

?>