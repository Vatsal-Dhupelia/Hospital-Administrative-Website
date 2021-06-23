<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "patient_appointments";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        echo "Error";
    }
    else{
        $id = $_GET['pid'];
        $query1 = "SELECT * FROM appointments WHERE id = '$id'";
        $result = mysqli_query($conn, $query1);
        $total = mysqli_num_rows($result);
        if($total!=0){
            while($data = mysqli_fetch_assoc($result))
            {
                $id = $data['id'];
                $name = $data['name'];
                $phno = $data['ph_no'];
                $gender = $data['gender'];
                $city = $data['city'];
                $email = $data['email'];
                $detail = $data['detail'];
                $date = $data['date'];
                $slot = $data['slot'];
            }
        }
        $query2 = "INSERT INTO confirm_appointments(id, name, ph_no, gender, city, email, detail, date, slot)VALUES('$id','$name', '$phno', '$gender', '$city', '$email', '$detail', '$date', '$slot')";
        mysqli_query($conn, $query2);

        $subject = "Confirmation Mail From Healthcare Hospitals";
        $body = "Hello $name. your appointment have successfully been confirmed. Reach on the desired time to get your checkup done Thank YOu..!!";
        $sender_email = "FROM: teamimitators007@gmail.com";

        if(mail($email, $subject, $body, $sender_email))
        {
            $_SESSION['msg'] = "Check your confirmation mail $name";
            echo '<script>alert("Confirmation email has been sent..")</script>';
        }
        else
        {
            echo "Email sending failed..!!";
            exit();
        }

        $query = "DELETE FROM appointments WHERE id = '$id'";
        $data = mysqli_query($conn, $query);
        if($data){
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/Hospital%20Administration/php/doctor.php">
        <?php
        
        }
        else{
            echo "<script>alert('Failed to confirm Record from the database')</script>"; 
        }
    }
?>