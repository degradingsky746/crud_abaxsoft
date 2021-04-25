<?php
if(isset($_POST["uid"]) && !empty($_POST["uid"])){
    require_once "config.php";

    $id = $_POST["uid"];
    

    $name = trim($_POST["uname"]);
    
    $mail = trim($_POST["umail"]);
    
    $mobile = trim($_POST["umobile"]);

    $state = trim($_POST["ustate"]);

    $city = trim($_POST["ucity"]);

    $address = trim($_POST["uaddress"]);
    

    

        $sql = "UPDATE employees SET name=?, email=?, mobile=?, state=?, city=?, address=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
 
            mysqli_stmt_bind_param($stmt, "ssisssi", $param_name, $param_mail, $param_mobile, $param_state, $param_city, $param_address, $param_id);
            

            $param_name = $name;
            $param_address = $address;
            $param_mail = $mail;
            $param_state = $state;
            $param_city = $city;
            $param_mobile = $mobile;
            $param_id = $id;
            
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