<?php
error_reporting(0);
session_start();
if ($_COOKIE['auth'] == "admin_in") {
    header("location:" . "home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@housamz">

    <meta name="description" content="Mass Admin Panel">
    <title>Vendor Panel</title>

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            /* background: url("assets/bg.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: auto;
            min-height: 90vh;
            max-width: 100vw;
            display: grid;
            place-items: center; */
            min-width: 100vw;
        }

        .row {
            display: flex;
            flex-flow: row;
            width: 100vw;
        }

        .row .panel-left {
            background: url("assets/signup.png");
            background-repeat: no-repeat;
            background-position: center;
            display: grid;
            place-items: center;
            min-width: 50%;
            min-height: 100vh;
        }

        .row .panel-right {
            min-width: 50%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

        }


        .form-container {
            display: flex;
            flex-flow: column;
            align-items: start;
            justify-content: start;
        }

        .btn {
            background-color: blue;
            border-radius: 8px;
            border: transparent;
        }

        .btn:hover,
        .btn:active,
        .btn:focus {
            background-color: blue !important;
            border-radius: 8px;
            border: transparent;
        }

        .form-control {
            border: none;
            border: solid 1px blue;
            min-width: 500px;
            border-radius: 10px !important;
        }

        .login-info {
            padding: 2rem;
            display: flex;
            justify-content: end;
            gap: 1rem;
        }

        .login-info a {
            color: blue;
            text-decoration: none;
        }

        .error {
            background-color: red;
            color: white;
            padding: 1rem 2rem;
            margin: 1rem 0rem;
            border-radius: 8px;
        }
    </style>

</head>

<body>
    <div class="row">
        <div class="panel-left"></div>
        <div class="panel-right">
            <div class="form-container">
                <h1 style="font-weight: 600;">Sporty Ways</h1>
                <h2 style="font-weight: 400;">Vendor Registration</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <span class="error">
                        <?php echo ($_GET['error']); ?>
                    </span>
                <?php } ?>
                <div style="margin-bottom: 20px">
                    <form action="signup_handler.php" method="post" name="signup" enctype='multipart/form-data'>
                        <input type="text" class="form-control" placeholder="Username" name="username" required
                            autofocus><br>
                        <input type="text" class="form-control" placeholder="Email" name="email" required><br>
                        <input type="password" class="form-control" placeholder="Password" name="password" required><br>
                        <input type="text" class="form-control" placeholder="Full name" name="full_name" required><br>
                        <input type="text" class="form-control" placeholder="Phone number" name="phone_no" required><br>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        <br>
                        <input type="file" class="form-control" placeholder="Profile picture" name="profile_picture"
                            required><br>

                        <button class="btn btn-primary btn-block" type="submit">
                            Register
                        </button>
                        <p class='login-info'>Already have an account? <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>