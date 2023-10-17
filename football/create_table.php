<?php
    require_once 'conn.php';

    $sql = "CREATE TABLE football(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        team VARCHAR (50) NOT NULL,
        ename VARCHAR (50),
        sdate VARCHAR (60),
        color VARCHAR (20)
    )";

    if($conn->query($sql)==true){
        echo "<h3>Table created successfully</h3>";
    }else{
        echo "Error while creating table ".$conn->error;
    }
?>