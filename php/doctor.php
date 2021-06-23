<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointments</title>
    <style>
        body{
            background-image: url(../img/bg1.jpg);
        }
        h2{
            color: black;
            text-align: center;
        }
        table{
            text-align: center;
            color: black;
            font-size: 18px;
            font-weight: 600;
        }
        .formgrp{
            padding-bottom: 50px;
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        a{
            color: white;
            padding: 5px 12px;
            margin-top: 3px;
            /* margin-right: 16px; */
            background: black;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        a:hover{
            background: rgba(0, 0, 0, 0.527);
        }
    </style>
</head>
<body>
    <h2>List Of Appointments</h2>
<table border="2" align="center">
<tr>
<th>ID</th>
<th>Name and Surname</th>
<th>Phone Number</th>
<th>Gender</th>
<th>City</th>
<th>Email</th>
<th>Diagnosis</th>
<th>Date</th>
<th>Slot</th>
<th>Status</th>
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
        $query = "SELECT * FROM appointments";
        $result = mysqli_query($conn, $query);
        $total = mysqli_num_rows($result);
        if($total!=0){
            while($data = mysqli_fetch_assoc($result))
            {
                echo"
                <tr>
                <td>" .$data['id']. "</td>
                <td>" .$data['name']. "</td>
                <td>" .$data['ph_no']. "</td>
                <td>" .$data['gender']. "</td>
                <td>" .$data['city']. "</td>
                <td>" .$data['email']. "</td>
                <td>" .$data['detail']. "</td>
                <td>" .$data['date']. "</td>
                <td>" .$data['slot']. "</td>
                <td><a href = 'confirm.php?pid=$data[id]' onclick='return confirm()'>Confirm</td>
                </tr>
                ";
            }
        }
        else{
            echo "No records found";
        }
    }
?>
</table>

<script>
function confirm(){
    return confirm('Are you sure you want to confirm this record');
}

</script>

</body>
</html>