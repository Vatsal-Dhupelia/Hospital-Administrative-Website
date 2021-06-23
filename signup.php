<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup_style.css">
    <title>SIGNUP</title>
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

        <?php if(isset($_GET['success'])) { ?>
            <p class="success">
                <?php echo $_GET['success']; ?>
            </p>
        <?php } ?>
    <form action="./php/signup-check.php" method="post">
        <div class="form">
            <div class="formdata">
                <div class="head">
                    <h2>SIGNUP</h2>
                </div>
                <div class="form-grp">
                    <div class="radio">
                        <div class="radio1">
                            <input type="radio" name="usertype" id="doctor" value="doctor">
                            <label for="usertype">Doctor</label>
                        </div>
                        <div class="radio2">
                            <input type="radio" name="usertype" id="patient" value="patient">
                            <label for="usertype">Patient</label>
                        </div>
                    </div>
                </div>
                <div class="form-grp">
                    <label for="name">Name:</label>
                    <br>
                    <?php if(isset($_GET['name'])){?>
                        <input type="text"name="name" id="name" placeholder="Name" value="<?php echo $_GET['name']; ?>">
                    <?php }else{ ?>
                        <input type="text"name="name" id="name" placeholder="Name">
                    <?php }?> 
                </div>
                <div class="form-grp">
                    <label for="username">Email Address:</label>
                    <br>
                    <?php if(isset($_GET['name'])){?>
                        <input type="text"name="uname" id="uname" placeholder="Email Address" value="<?php echo $_GET['uname']; ?>">
                    <?php }else{ ?>
                        <input type="text"name="uname" id="uname" placeholder="Email Address">
                    <?php }?> 
                </div>
                <div class="form-grp">
                    <label for="pwd">Password:</label>
                    <br>
                    <input type="password" name="pwd" id="pwd" placeholder="Password">
                </div>
                <div class="form-grp">
                    <label for="cpwd">Confirm Password:</label>
                    <br>
                    <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password">
                </div>
                <div class="form-grp">
                    <div class="form-btn">
                        <button type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-grp">
                Already have an account?&nbsp;&nbsp;|&nbsp;&nbsp;<a href="./php/index.php" class="createacc">Login In</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>