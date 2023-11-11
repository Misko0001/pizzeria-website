<?php 

$error = false;

if ($action && $id > 0) {
	switch ($action) {
		case "add":
			if (isset($_POST["add"])) {
				$add = $_POST["add"] == 1 ? 1 : 0;
				if ($add == 1) {
					if ($_POST["name"] != '' && $_POST["price"] != '') {
						$name = $_POST["name"];
						$price = $_POST["price"];
						$img_path = $_POST["img"] != '' ? DIR_MENU_IMG . $_POST["img"] : '';
						$sql = "INSERT `food` (`food_name`, `food_price`, `food_img_path`, `category_id`)
								VALUES ('$name', '$price', '$img_path', '$id')";
						mysqli_query($connection, $sql);
						redirect(URL_MENU);
					} else {
						redirect(URL_MENU);
					}
				} else {
					redirect(URL_MENU);
				}
			}
			$display = "add";
			break;
		case "edit":
			if (isset($_POST["edit"])) {
				$edit = $_POST["edit"] == 1 ? 1 : 0;
				if ($edit == 1) {
					if ($_POST["name"] != '') {
						$name = $_POST["name"];
						$sql = "UPDATE `food` 
								SET `food_name` = '$name'
								WHERE `food_id` = $id";
						mysqli_query($connection, $sql);  
					}
					if ($_POST["price"] != '') {
						$price = $_POST["price"];
						$sql = "UPDATE `food` 
								SET `food_price` = $price
								WHERE food_id = $id";
						mysqli_query($connection, $sql);
					}
					if ($_POST["img"] != '') {
						$img_path = DIR_MENU_IMG . $_POST["img"];
						$sql = "UPDATE `food` 
								SET `food_img_path` = '$img_path'
								WHERE food_id = $id";
						mysqli_query($connection, $sql);
					}
					redirect(URL_MENU);
				} else {
					redirect(URL_MENU);
				}
			}
			$display = "edit";
			break;
		case "delete":
			if (isset($_POST["delete"])) {
				$delete = $_POST["delete"] == 1 ? 1 : 0;
				if ($delete == 1) {
					$sql = "DELETE FROM `food` 
							WHERE food_id = $id";
					mysqli_query($connection, $sql);
					redirect(URL_MENU);
				} else {
					redirect(URL_MENU);
				}
			}
			$display = "delete";
			break;
		case "edit-c":
			if (isset($_POST["edit-c"])) {
				$edit_c = $_POST["edit-c"] == 1 ? 1 : 0;
				if ($edit_c == 1) {
					if ($_POST["name"] != '') {
						$name = $_POST["name"];
						$sql = "UPDATE `category` 
								SET `category_name` = '$name'
								WHERE `category_id` = $id";
						mysqli_query($connection, $sql);
						redirect(URL_MENU);
					} else {
						redirect(URL_MENU);
					}
				} else {
					redirect(URL_MENU);
				}
			}
			$display = "edit-c";
			break;
		case "delete-c":
			if (isset($_POST["delete-c"])) {
				$delete_c = $_POST["delete-c"] == 1 ? 1 : 0;
				if ($delete_c == 1) {
					$sql = "DELETE FROM `food` 
							WHERE category_id = $id";
					mysqli_query($connection, $sql);
					$sql = "DELETE FROM `category` 
							WHERE category_id = $id";
					mysqli_query($connection, $sql);
					redirect(URL_MENU);
				} else {
					redirect(URL_MENU);
				}
			}
			$display = "delete-c";
			break;
	}
} else if ($action == "add-c") {
	if (isset($_POST["add-c"])) {
		$add_c = $_POST["add-c"] == 1 ? 1 : 0;
		if ($add_c == 1) {
			if ($_POST["name"] != '') {
				$name = $_POST["name"];
				$sql = "INSERT `category` (`category_name`)
						VALUES ('$name')";
				mysqli_query($connection, $sql);
				redirect(URL_MENU);
			} else {
				redirect(URL_MENU);
			}
		} else {
			redirect(URL_MENU);
		}
	}
	$display = "add-c";
} else if ($action == "order") {
	if (isset($_POST["confirm"])) {
		$confirm = $_POST["confirm"] == 0 ? 0 : 1;
		if ($confirm == 1) {
			if (isset($_SESSION["user_id"])) {
				$name = $_SESSION["user_name"];
				$address = $_SESSION["user_address"];
				$phone = $_SESSION["user_phone"];
			} else {
				$name = $_POST["name"];
				$address = $_POST["address"];
				$phone = $_POST["phone"];
			}
			if ($name != '' && $address != '' && $phone != '') {
				$sql = "INSERT `user_order` (`user_order_name`, `user_order_address`, `user_order_phone`)
						VALUES ('$name', '$address', '$phone')";
				mysqli_query($connection, $sql);
				$sql = "SELECT `user_order_id`
						FROM `user_order`
						ORDER BY `user_order_sent_at` DESC 
						LIMIT  1";
				$result = mysqli_query($connection, $sql);
				$user_order = mysqli_fetch_assoc($result);
				$user_order_id = $user_order["user_order_id"];
				$order_arr = explode('|', $_POST["confirm"]);
				$order = [];
				foreach ($order_arr as $a) {
						$key = strtok($a, "=");
						$value = substr($a, strpos($a, "=") + 1);
						$order[$key] = $value;
				}
				print_r($order);
				foreach ($order as $id => $amount) {
					if ($amount != 0) {
						$sql = "INSERT `food_user_order` (`food_id`, `user_order_id`, `food_user_order_amount`)
								VALUES ('$id', '$user_order_id', $amount)";
						mysqli_query($connection, $sql);		
					}
				}
				$sql = "SELECT *
						FROM `food_user_order`
						INNER JOIN `food`
							ON `food_user_order`.`food_id` = `food`.`food_id`
						WHERE `food_user_order`.`user_order_id` = $user_order_id";
				$order_result = mysqli_query($connection, $sql);
				$total_price = 0;
				while ($order_price = mysqli_fetch_assoc($order_result)) {
					$amount = $order_price["food_user_order_amount"];
					$food_price = $order_price["food_price"] * $amount;
					$food_price = sprintf("%.2f", $food_price);
					$total_price += $food_price;
					$total_price = sprintf("%.2f", $total_price);
				}
				$sql = "UPDATE `user_order` 
						SET `user_order_price` = $total_price
						WHERE `user_order_id` = $user_order_id";
				mysqli_query($connection, $sql);

				redirect(URL_MENU . "&sent=1");
			} else {
				redirect(URL_MENU);
			}
		} else {
			redirect(URL_MENU);
		}
	}
	$display = "order";
}

include TEMPLATE_HEAD;

if ($display == "order") { 
	include TEMPLATE_MENU_ORDER;
} else {
	include TAMPLATE_MENU;
}
		
?>