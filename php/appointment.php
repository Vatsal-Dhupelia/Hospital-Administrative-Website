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

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phno = $_POST['no'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $detail = $_POST['Diagnosis'];
        $date = $_POST['date'];
        $slot = $_POST['slot'];
        $token = bin2hex(random_bytes(15));
        $id = uniqid();

        $sql = "INSERT INTO appointments(id, name, ph_no, gender, city, email, detail, date, slot, token)VALUES('$id','$name', '$phno', '$gender', '$city', '$email', '$detail', '$date', '$slot', '$token')";
        mysqli_query($conn, $sql);
        $subject = "Appointment Mail From Healthcare Hospitals";
        $body = "Hello $name. you have successfully booked an appointment, Compelete the payment and reach the hospital on the alloted time. You will recieve a confirmation mail within a short span of time. Thank YOu..!!";
        $sender_email = "FROM: teamimitators007@gmail.com";

        if(mail($email, $subject, $body, $sender_email))
        {
            $_SESSION['msg'] = "Check your confirmation mail $name";
            echo '<script>alert("Your response has been recorded and Confirmation email has been sent..")</script>';
        }
        else
        {
            echo "Email sending failed..!!";
            exit();
        }
    }
    else{
        echo "Response not Recorded";
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  } 
}
</style>
</head>
<body>


<div class="row"  style="padding:100px 300px;">
  <div class="col-50">
    <div class="container" >
      <form  action="payment.php" method="post" style="padding: 25px;">
      
        <div class="row" >
          <div class="col-25">
            <h3 style="text-align: center;margin:20px 10px;font-family: lato;">Payment Form</h3>
          

            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <input type="hidden" value="<?php echo 'OID'.rand(100,1000);?>" name="orderid">
            <input type="hidden" value="<?php echo 1;?>" name="amount">
            <label for="city"><i class="fa fa-mobile"></i> Mobile</label>
            <input type="text" id="city" name="mobile" placeholder="Mobile Number">
            <label for="charge"><i class="fa fa-inr"></i> Consultation Charge</label>
            <input type="text" id="charge" name="charge" value="300" readonly="readonly">
        </div>
       
        <input type="submit"  value="Pay Now" class="btn">
      </form>
    </div>
  </div>
 
</div>

</body>
</html>