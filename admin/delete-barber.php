<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from barber where barid=$id;");
        $email=($result001->fetch_assoc())["baremail"];
        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from barber where baremail='$email';");
        //print_r($email);
        header("location: barber.php");
    }


?>