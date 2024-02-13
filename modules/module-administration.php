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
if (isset($_POST["filter"])) {
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


// Number of products sold this month
$sql = "SELECT `user_order_sent_at` 
        FROM `user_order` 
        ORDER BY `user_order_sent_at` DESC
        LIMIT 1";
$date = mysqli_fetch_assoc(mysqli_query($connection, $sql));
$month = substr($date["user_order_sent_at"], 5, 2);
$year = substr($date["user_order_sent_at"], 0, 4);
if ($month == 0) {
    $month = 12;
    $year--; 
}

$sql = "SELECT `category`.`category_name`, SUM(`food_user_order`.`food_user_order_amount`) as food_sum
        FROM `food_user_order`
        INNER JOIN `food` ON `food_user_order`.`food_id` = `food`.`food_id`
        INNER JOIN `user_order` ON `food_user_order`.`user_order_id` = `user_order`.`user_order_id`
        INNER JOIN `category` ON `food`.`category_id` = `category`.`category_id`
        WHERE `user_order_sent_at` REGEXP '^$year-$month'
        GROUP BY `category`.`category_name`
        ORDER BY `food_sum` DESC";
$result = mysqli_query($connection, $sql);
$array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $array[$row["category_name"]] = $row["food_sum"];
}

$path = "./public/js/monthly-amount.json";
$jsonArray = json_encode($array, JSON_PRETTY_PRINT);

$fp = fopen($path, 'w');
fwrite($fp, $jsonArray);
fclose($fp);


// Montly earnings
if (isset($_POST["startDate"]) && isset($_POST["endDate"])) {
    $startDate = substr($_POST["startDate"], 0, 4) . "-" . substr($_POST["startDate"], 5, 2) . "-01";
    $endDate = substr($_POST["endDate"], 0, 4) . "-" . substr($_POST["endDate"], 5, 2);
} else {
    $endDate = date("Y-m-d");
    $month = substr($endDate, 5, 2) - 6; 
    $year = substr($endDate, 0, 4);
    if ($month < 1) {
        $month += 12;
        $year--;
    }
    if ($month < 10) {
        $month = "0" . $month;
    }
    $startDate = $year . "-" . $month . "-01";
}

if ($startDate > $endDate) {
    $endDate = substr($_POST["startDate"], 0, 4) . "-" . substr($_POST["startDate"], 5, 2);
    $startDate = substr($_POST["endDate"], 0, 4) . "-" . substr($_POST["endDate"], 5, 2) . "-01";
}

if ($endDate != date("Y-m-d")) {
    $month = substr($endDate, 5, 2); 
    $year = substr($endDate, 0, 4);
    switch ($month) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            $endDate .= "-31"; break;
        case 4: case 6: case 9: case 11:
            $endDate .= "-30"; break;
        case 2:
            if ($year % 4 == 0) {
                $endDate .= "-29";
            } else {
                $endDate .= "-28";
            }
            break;
    }
}

$sql = "SELECT 
            LEFT(`user_order_sent_at`, 7) AS `user_order_month`, 
            `category`.`category_name` AS `product_category`,
            SUM(`food_user_order`.`food_user_order_amount` * `food`.`food_price`) AS `user_order_total_price`
        FROM `user_order`
        JOIN `food_user_order` ON `user_order`.`user_order_id` = `food_user_order`.`user_order_id`
        JOIN `food` ON `food_user_order`.`food_id` = `food`.`food_id`
        JOIN `category` ON `food`.`category_id` = `category`.`category_id`
        WHERE `user_order`.`user_order_is_delivered` = 1 
        AND `user_order`.`user_order_sent_at` >= '$startDate 00:00:00'
        AND `user_order`.`user_order_sent_at` <= '$endDate 23:59:59'
        GROUP BY `user_order_month`, `product_category`
        ORDER BY `user_order_month`, `product_category`";

$result = mysqli_query($connection, $sql);
$array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $month = substr($row["user_order_month"], 5, 2);
    $year = substr($row["user_order_month"], 0, 4);

    $months = ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"];
    for ($i = 1; $i <= 12; $i++) {
        if ($i == $month) {
            $month = $months[$i - 1];
        }
    }  
    $newDate = $month . " " . $year . ".  ";
    $category = $row["product_category"];
    $array[$newDate][$category] = $row["user_order_total_price"];
}

$arr = array();
foreach ($array as $date => $price) {
    $arr[$date] = $price;
}

$path = "./public/js/montly-earnings.json";
$jsonArray = json_encode($arr, JSON_PRETTY_PRINT);

$fp = fopen($path, 'w');
fwrite($fp, $jsonArray);
fclose($fp);

include TEMPLATE_ADMINISTRATION;

?>