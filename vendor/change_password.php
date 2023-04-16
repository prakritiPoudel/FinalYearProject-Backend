<?php
include_once("includes/header.php")
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Password Change Form</title>
    <style>
        form {
            /* display: flex;
            align-items: start;
            flex-flow: column;
            justify-content: center; */
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px #888888;
        }

        h1 {
            text-align: center;
            color: #0077cc;
        }

        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #0077cc;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #005580;
        }
    </style>
</head>

<body class="body">
    <form action="change_password_handler.php" method="post">
        <label for="old_password">Old Password:</label>
        <input type="password" id="old_password" name="old_password"><br><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>