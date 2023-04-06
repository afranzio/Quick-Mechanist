<?php 
    $servername = "localhost";
    $username = "id20568145_root";
    $password = "v2kA?9BB)r-{Qg[1";
    $dbname = "repairspot";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die ('connection faild:'.$conn->connect_error);
    }
?>