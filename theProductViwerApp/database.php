<?php

    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $username = 'mgs_user';
    $password = 'pa55word';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $ex) {
        $errorMessage = $ex->getMessage();
        include ('databaseError.php');
        exit();
    }

?>