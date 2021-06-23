<?php

session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "patient_appointments";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

$id = $_GET['id'];

$qry = mysqli_query($conn,"SELECT * FROM confirm_appointments WHERE id='$id'");

$data = mysqli_fetch_array($qry);

if(isset($_POST['submit']))
{
    $medicines = $_POST['medicines'];
    $edit = mysqli_query($conn,"UPDATE confirm_appointments set medicines='$medicines' WHERE id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:medicines.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "Error";
    }    	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update_style.css">
    <title>UPDATE</title>
</head>
<body>
        <form method="POST">
            <div class="form">
                <div class="formdata">
                    <div class="head">
                        <h2>UPDATE/EDIT MEDICINES</h2>
                    </div>
                    <div class="form-grp">
                        <label for="username">Medicines Prescribed:</label><br>
                        <textarea name="medicines" id="medicines" rows="20" cols="70"><?php echo $data['medicines'] ?></textarea>
                    </div>
                    <div class="form-grp">
                        <div class="form-btn">
                        <input type="submit" name="submit" value="submit">
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
</body>
</html>

