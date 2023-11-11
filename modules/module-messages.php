<?php

if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}

if ($action && $id > 0) {
    if (isset($_POST["delete-msg"])) {
        $delete = $_POST["delete-msg"] == 1 ? 1 : 0;
        if ($delete == 1) {
            $sql = "DELETE FROM `contact` 
                    WHERE contact_id = $id";
            mysqli_query($connection, $sql);
            redirect(URL_MESSAGES);
        } else {
            redirect(URL_MESSAGES);
        }
    }
    $display = "delete";
}

include TEMPLATE_HEAD;
include TEMPLATE_MESSAGES;

?>