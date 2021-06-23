<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset_style.css">
    <title>Recover Password</title>
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


    <form action="reset_index.php" method="post">
        <div class="form">
            <div class="formdata">
                <div class="head">
                    <h2>RESET PASSWORD</h2>
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
                    <label for="cpwd">Confirm Password:</label>
                    <br>
                    <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password">
                </div>
                <div class="form-grp">
                    <div class="form-btn">
                        <button type="submit">Reset</button>
                    </div>
                </div>
                <div class="form-grp">
                    <a href="login.php" class="createacc">Login Now</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>