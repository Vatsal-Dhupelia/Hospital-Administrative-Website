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
        input[type=text] {
            width: 500px;
            padding: 15px;
            margin-top: 8px;
            font-size: 20px;
            background-color: rgba(216, 214, 214, 0.308);
            border: 5px solid rgb(68, 68, 68);
            border-radius: 12px;
        }
        input[type=text]::placeholder{
            text-align: center;
            color: black;
        }
        input[type=submit]{
            color: white;
            padding: 7px 17px;
            margin-top: 5px;
            margin-right: 16px;
            background: rgba(0, 0, 0, 0.527);
            font-size: 17px;
            border: none;
            cursor: pointer;

        }
        input[type=submit]:hover {
            background: black;
        }
        .formgrp{
            padding-bottom: 50px;
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        a{
            color: white;
            padding: 7px 17px;
            margin-top: 5px;
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
    <h2>Patients Database</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="formgrp">
<input type="text" placeholder="Search by Patient ID or by Name...." name="search">
<input type="submit" name="submit">
</div>
</form>
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
<th>Medicines Prescribed</th>
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
        if(isset($_POST['submit'])){
        
            $search = $_POST['search'];
            $sql = "SELECT * FROM confirm_appointments WHERE name LIKE '%$search%' OR id LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
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
                    <td>" .$data['medicines']. "</td>
                    <td><a href = 'update.php?id= $data[id] '>Edit/Update</td>
                    </tr>
                    ";
                }
            }
            else{
                echo "No records found";
            }

        }
        else {
            $query = "SELECT * FROM confirm_appointments";
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
                    <td>" .$data['medicines']. "</td>
                    <td><a href = 'update.php?id=$data[id]'>Edit/Update</td>
                    </tr>
                    ";
                }
            }
            else{
                echo "No records found";
            }
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