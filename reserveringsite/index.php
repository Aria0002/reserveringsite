<?php
//session_start();
//if(!isset($_SESSION["name"])) {
//    die("Je moet hiervoor ingelogd zijn!");
//}
//
require 'dbconnect.php';
session_start();

switch($_SESSION['role']){
    case "ouder":
        header("Location: form.php");
        break;
    case "docent":
        header("Location: overzicht.php");
        break;
    case "admin":
        break;
    default:
        break;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav>
            <img src="media/logo.png" class="logo" width="50px" height="50px">
            <ul>
                <?php
                if($_SESSION['username'])
                {
                    ?> <li><a href="login/out.php">Logout</a></li><?php
                }?>
                <li><a href="login/login.php">Login</a></li>
                <li><a href="#">Home</a></li>
            </ul>
        </nav>
        <main>
            <?php
            if(!$_SESSION['username'])
            {
                ?><p>You must login first to continue!</p><?php
            }
            if($_SESSION['role'] == 'admin') {
                ?>
                    <div class="knoppen">
                        <ul>
                            <li><a href="overzicht.php">Overview</a></li>
                            <li><a href="form.php">Form</a></li>
                        </ul>
                    </div>
            <?php
            }
            ?>

        </main>
        <div id="sidebar">
        Welcome to the registration page of the GLR, on this website you must first log in. Once you are logged in, you can log in as a parent
        for a meeting with your son and/or daughters to plan an appointment mentor. During this meeting we will talk about your child and how your child is doing this year, and what we can do to improve this.
        It will also be about your child's working attitude.
        </div>
        <footer>
            <p>Made by Aria Diba</p>
        </footer>
    </div>
</body>
</html>
