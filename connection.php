<?php
    $user = "a3001708_user";
    $pw = "Toiohomai1234";
    $db = "a3001708_foundation";

    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
    $result = $connection->query("select * from subjects") or die($connection->error);

    
?>