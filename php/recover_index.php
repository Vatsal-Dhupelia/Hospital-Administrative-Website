<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_style.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="welcome">
        <h1>Welcome to Healthcare Hospitals Online Platform</h1>
    </div>
    <?php if(isset($_GET['error'])) { ?>
        <p class="error" style="background: #d4edda; color: #40754c; padding: 10px; width: 95%; border-radius: 5px; margin: 20px auto;">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>

    <?php if(isset($_GET['success'])) { ?>
        <p class="success" style="background: #d4edda; color: #40754c; padding: 10px; width: 95%; border-radius: 5px; margin: 20px auto;">
            <?php echo $_GET['success']; ?>
        </p>
    <?php } ?>

    <form action="recover_password.php" method="post">
        <div class="form">
            <div class="formdata">
                <div class="head">
                    <h2>RECOVER YOUR ACCOUNT</h2>
                </div>
                <div class="form-grp">
                    <label for="username">Email Address</label><br>
                    <input type="text" name="uname" id="uname" placeholder="Email Address">
                </div>
                <div class="form-grp">
                    <div class="form-btn">
                        <button type="submit">Send Mail</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>