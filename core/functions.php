<?php

function db_connect() {
    include(DIR_ROOT . 'config.php');
    $connection = mysqli_connect(
        $config['db_host'], 
        $config['db_username'], 
        $config['db_password'], 
        $config['db_name']
    );
    if (!$connection)
        die('Veza sa bazom nije uspostavljena');
    return $connection;
}

function db_close() {
    global $connection;
    mysqli_close($connection);
}

function redirect($url) {
    db_close();
    header("location: $url");
}

?>