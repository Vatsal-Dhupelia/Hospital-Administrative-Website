<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_style.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="welcome">
        <h1>Welcome to Healthcare Hospitals Online Platform</h1>
    </div>
    <?php if(isset($_GET['error'])) { ?>
        <p class="error">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <form action="login.php" method="post">
        <div class="form">
            <div class="formdata">
                <div class="head">
                    <h2>LOGIN</h2>
                </div>
                <div class="form-grp">
                    <div class="radio">
                        <div class="radio1">
                            <input type="radio" name="usertype" id="doctor" value="doctor">   
                            <label for="usertype">Doctor</label>
                        </div>
                        <div class="radio2">
                            <input type="radio" name="usertype" id="doctor" value="patient">
                            <label for="usertype">Patient</label>
                        </div>
                    </div>
                </div>
                <div class="form-grp">
                    <label for="username">Email Address</label><br>
                    <input type="text" name="uname" id="uname" placeholder="Email Address">
                </div>
                <div class="form-grp">
                    <label for="pwd">Password</label><br>
                    <input type="password" name="pwd" id="pwd" placeholder="Password">
                </div>
                <div class="form-grp">
                    <div class="form-btn">
                        <button type="submit">Login</button>
                    </div>
                </div>
                <div class="form-grp">
                    <a href="../signup.php" class="createacc">Create an account</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="recover_index.php" class="frgt-pswd">Forgot Password?</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>