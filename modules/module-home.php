<?php

$sql = "SELECT `about_main_p`
        FROM `about`
        WHERE `about_id` = 1";
$result = mysqli_query($connection, $sql);
$about = mysqli_fetch_assoc($result);

include TEMPLATE_HOME;

?>  