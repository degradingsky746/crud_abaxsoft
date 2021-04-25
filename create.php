<?php
if(isset($_POST['name'])&&isset($_POST['mail'])&&isset($_POST['mobile'])&&isset($_POST['state'])&&isset($_POST['city'])&&isset($_POST['address'])){
    require_once "config.php";
    $name = trim($_POST["name"]);
    
    $mail = trim($_POST["mail"]);
    
    $mobile = trim($_POST["mobile"]);

    $state = trim($_POST["state"]);

    $city = trim($_POST["city"]);

    $address = trim($_POST["address"]);

    $sql = "INSERT INTO employees (name, email, mobile, state, city, address) VALUES (?, ?, ?, ?, ?, ?)";
         
    if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssisss", $param_name, $param_mail, $param_mobile, $param_state, $param_city, $param_address);
            

            $param_name = $name;
            $param_address = $address;
            $param_mail = $mail;
            $param_state = $state;
            $param_city = $city;
            $param_mobile = $mobile;

            
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>