<?php 

if (isset($_SESSION["admin_id"])) {
    redirect(URL_HOME);
}

$error = false;

if (isset($_POST["submit"])) {

    $error = true;

    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($connection, $sql);

    while ($user = mysqli_fetch_assoc($result)) {
        if ($user["user_name"] == $_POST["name"]) {
            if ($user["user_password"] == $_POST["password"]) {
                $error = false;
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["user_name"] = $user["user_name"];
                $_SESSION["user_address"] = $user["user_address"];
                $_SESSION["user_phone"] = $user["user_phone"];
                redirect(URL_HOME);
            }
        }
    }

    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($connection, $sql);
    
    while ($admin = mysqli_fetch_assoc($result)) {
        if ($admin["admin_name"] == $_POST["name"]) {
            if ($admin["admin_password"] == $_POST["password"]) {
                $error = false;
                $_SESSION["admin_id"] = $admin["admin_id"];
                redirect(URL_HOME);
            }
        }
    }
}

include TEMPLATE_LOGIN; 

?>