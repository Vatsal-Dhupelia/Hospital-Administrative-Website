<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['pwd']) && isset($_POST['name']) && isset($_POST['cpwd']) && isset($_POST['usertype']) ){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pwd']);
    $cpass = validate($_POST['cpwd']);
    $name = validate($_POST['name']);
    $usertype = validate($_POST['usertype']);
    $token = bin2hex(random_bytes(15));


    $user_data = 'uname='.$uname.'&name='.$name;
    // echo $user_data;
    if(empty($usertype)){
        header("Location: ../signup.php?error=User selection is required&$user_data");
        exit();
    }else if(empty($name)){
        header("Location: ../signup.php?error=Name is required&$user_data");
        exit();
    }else if(empty($uname)){
        header("Location: ../signup.php?error=Username is required&$user_data");
        exit();
        // echo "Enter Username";
    }else if(empty($pass)){
        header("Location: ../signup.php?error=Password is required&$user_data");
        exit();
    }else if(empty($cpass)){
        header("Location: ../signup.php?error=Confirm-Password is required&$user_data");
        exit();
    }else if($pass != $cpass){
        header("Location: ../signup.php?error=Password does not match &$user_data");
        exit();
    }
    else
    {
            $sql = "SELECT * FROM users WHERE user_name = '$uname'";
            $result = mysqli_query($conn, $sql);
            $pass = md5($pass);
            if(mysqli_num_rows($result) > 0){
                header("Location: ../signup.php?error=This username is already taken &$user_data");
                exit();
            }
            else{
                $sql2 = "INSERT INTO users(user_name, password, name, usertype, token) VALUES('$uname', '$pass', '$name', '$usertype', '$token')";
                $result2 = mysqli_query($conn, $sql2);
                if($result2){
                    header("Location: ../signup.php?success=Your account has been created successfully");
                    exit();
                }
                else
                {
                    header("Location: ../signup.php?error=Unknown Error occured &$user_data");
                    exit();
                }
            }
    }
}
else{
    header("Location: ../signup.php");
    exit();
}