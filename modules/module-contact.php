<?php 

$email_empty = false;
$message_empty = false;

if ($_POST) {

    if ($_POST['email'] == '') 
        $email_empty = true;
    if ($_POST['message'] == '') 
        $message_empty = true;

    if ($_POST['email'] != '' && $_POST['message'] != '') {

        $email = $_POST['email'];
        $message = $_POST['message'];

        ($_POST['name'] != '') ? $name = $_POST['name'] : $name = '';
        ($_POST['phone'] != '') ? $phone = $_POST['phone'] : $phone = '';

        $sql = "INSERT `contact` (`contact_name`, `contact_email`, `contact_phone`, `contact_message`) 
                VALUES ('$name', '$email', '$phone', '$message')";
        mysqli_query($connection, $sql);
    }
}

include TEMPLATE_CONTACT;

?>