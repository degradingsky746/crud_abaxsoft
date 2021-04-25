<?php
if(isset($_POST["del_id"]) && !empty($_POST["del_id"])){

    require_once "config.php";

    $sql = "DELETE FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
 
        $param_id = trim($_POST["del_id"]);
        
        
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