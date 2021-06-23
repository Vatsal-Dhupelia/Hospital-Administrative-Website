<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']))
{
    $uname = $_POST['uname'];

    if(empty($uname))
    {
        header("Location: index.php?error=Username is required");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE user_name = '$uname'";
        echo "Done";
        $result = mysqli_query($conn, $sql);
        $emailcount = mysqli_num_rows($result);
        if($emailcount)
        {
            echo "OK";
            $userdata = mysqli_fetch_array($result);

            $username = $userdata['user_name'];
            $token = $userdata['token'];

            $subject = "Email Activation";
            $body = "Hi $uname. Click here to reset your password http://localhost/Hospital%20Administration/php/reset_password.php?token=$token";
            $sender_email = "FROM: teamimitators007@gmail.com";

            if(mail($uname, $subject, $body, $sender_email))
            {
                $_SESSION['msg'] = "Check your mail to reset your account password $uname";
                header("Location: recover_index.php?success=Reset password email has been sent...Check your mailbox to reset your password");
                exit();
            }
            else
            {
                echo "Email sending failed..!!";
            }
        }
        else
        {
            echo "No email found..!!";
        }
    }
}
?>