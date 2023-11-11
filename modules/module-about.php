<?php 

if ($action == "edit") {
    if (isset($_POST["edit"])) {
        $edit = $_POST["edit"] == 1 ? 1 : 0;
        if ($edit == 1) {
            if ($_POST["main-p"] != '') {
                $main_p = $_POST["main-p"];
                $sql = "UPDATE `about` 
                        SET `about_main_p` = '$main_p'
                        WHERE `about_id` = 1";
                mysqli_query($connection, $sql);
            }
            if ($_POST["second-p"] != '') {
                $second_p = $_POST["second-p"];
                $sql = "UPDATE `about` 
                        SET `about_second_p` = '$second_p'
                        WHERE `about_id` = 1";
                mysqli_query($connection, $sql);
            }
        }
        redirect(URL_ABOUT);
    }
    $display = "edit";
}

include TEMPLATE_ABOUT;

?>