<?php

$name_error = false;
$email_error = false;
$phone_error = false;
$address_error = false;
$password_error = false;

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
 
    if ($name == "") { $name_error = true; }
    if ($email == "") { $email_error = true; }
    if ($phone == "") { $phone_error = true; }   
    if ($address == "") { $address_error = true; }
    if ($password != $confirm || $password == "") { $password_error = true; }

    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($connection, $sql);

    while ($user = mysqli_fetch_assoc($result)) {
        if ($name == $user["user_name"]) {
            $name_error = true;
        } 
        if ($email == $user["user_email"]) {
            $email_error = true;
        }
        if ($phone == $user["user_phone"]) {
            $phone_error = true;
        }  
    }

    if (!$name_error && !$email_error && !$phone_error && !$address_error && !$password_error) {

        $sql = "INSERT `user` (`user_name`, `user_email`, `user_phone`, `user_address`, `user_password`)
                VALUES ('$name', '$email', '$phone', '$address', '$password')";
        $result = mysqli_query($connection, $sql);

        redirect(URL_LOGIN);
    }
}

include TEMPLATE_REGISTER;

?>