<?php
session_start();
include "db_conn.php";

if(isset($_POST['pwd']) && isset($_POST['cpwd']) && isset($_POST['uname']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['pwd'];
    $cpass = $_POST['cpwd'];

    if(empty($uname))
    {
        header("Location: reset_password.php?error=Email Address is required");
        exit();
    }
    else if(empty($pass))
    {
        header("Location: reset_password.php?error=Password is required");
        exit();
    }
    else if(empty($cpass))
    {
        header("Location: reset_password.php?error=Confirm Password is required");
        exit();
    }
    else if($pass != $cpass)
    {
        header("Location: reset_password.php?error=Password does not match");
        exit();
    }
    else
    {
        $pass = md5($pass);
        $cpass = md5($cpass);
        $sql = "SELECT * FROM users WHERE user_name = '$uname'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count)
        {
            $userdata = mysqli_fetch_array($result);
            $token = $userdata['token'];
            echo $token;
            $sql2 = "UPDATE users SET password = '$pass' where token = '$token'";
            mysqli_query($conn, $sql2);
            header("Location: reset_password.php?success=Your Password has been successfully reset");
        }
        else
        {
            header("Location: reset_password.php?error=Unknown Error occured");
        }
    }
}
?>