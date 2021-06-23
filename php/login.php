<?php
session_start();
include "db_conn.php";

if( isset($_POST['uname']) && isset($_POST['pwd']) && isset($_POST['usertype'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pwd']);
    $usertype = validate($_POST['usertype']);
    

    if(empty($uname)){
        header("Location: index.php?error=Username is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE user_name = '$uname' AND password='$pass' AND usertype='$usertype'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] == $uname && $row['password'] == $pass && $row['usertype'] == "patient" )
            {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['usertype'] = $row['usertype'];
                header("Location: ../html/home.html");
                exit();
            }
            else if($row['user_name'] == $uname && $row['password'] == $pass && $row['usertype'] == "doctor")
            {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['usertype'] = $row['usertype'];
                header("Location: ../html/doctor.html");
                exit();
            }
            else{
                header("Location: index.php?error=Unknown error occured");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorrect Username or Password or User type selection");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}