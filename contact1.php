<?php
    if(isset($_POST['submit-contact'])) {//elenxw an exei bei sti selida mesw tou submit

        require 'config.php';
         //database connection
        $conn = mysqli_connect("localhost","root","","login");
        if($conn){
            echo "Connection Sucessful";
        }else{
            echo "No connection";
        }
        mysqli_select_db($conn,'login');

        $username = $_POST['username'];
        $people = $_POST['people'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $query =" insert into contactinfo(username,people,date,message)
        values('$username','$people','$date','$message')";
        echo "$query";
        mysqli_query($conn,$query);

        header('location:exp.php'); 
        $stmt->close();
        $conn->close();
    }
?>