<?php 

if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}

if ($action && $id > 0) {
    if (isset($_POST["finish"])) {
        $finish = $_POST["finish"] == 1 ? 1 : 0;
        if ($finish == 1) {
            $sql = "UPDATE `user_order`
                    SET `user_order_is_delivered` = 1
                    WHERE `user_order_id` = $id";
            mysqli_query($connection, $sql);
            redirect(URL_ORDERS);
        } else {
            redirect(URL_ORDERS);
        }
    }
    $display = "finish";
}

include TEMPLATE_ORDERS;

?>