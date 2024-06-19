<?php
    function getConnection(){
        $conn = new mysqli("localhost","root","","cart");
        // Check connection
        if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
        }
        else{
            // echo "connection success";
            return $conn;
        }
    }
    function getAll($conn){
        $sql = "select * from products";
        $result = $conn->query($sql);
        return $result;
    }
?>