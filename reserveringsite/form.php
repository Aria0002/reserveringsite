<?php
session_start();
if ($_SESSION['username']){
    if($_SESSION['role'] != "docent") {
        require "dbconnect.php";
        $query = "SELECT * FROM `aanmelding`";
        $results = mysqli_query($db_connect, $query);
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
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
            <main>
                <form name="inschrijfForm" method="post" action="formVerwerk.php" class="formulier">
                    <table class="feedback-input">
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="naamVeld" required></td>
                        </tr>
                        <tr>
                            <td>Number of people:</td>
                            <td><input type="number" name="aantalVeld" required></td>
                        </tr>
                        <tr>
                            <td for="tijden">Choose a time:</td>
                            <td>
                                <select id="tijden" name="tijden">
                                    <option value="17:00 - 17:30" selected>17:00 - 17:30</option>
                                    <option value="17:30 - 18:00">17:30 - 18:00</option>
                                    <option value="18:00 - 18:30">18:00 - 18:30</option>
                                    <option value="18:30 - 19:00">18:30 - 19:00</option>
                                    <option value="18:30 - 19:00">18:30 - 19:00</option>
                                    <option value="19:00 - 19:30">19:00 - 19:30</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Extra Comments:</td>
                            <td><textarea id="subject" name="subject" style="height:100px; resize: none;" ></textarea></td>
                        </tr>
                        <tr>
                            <td class="submitKnop"><input type="submit" name="verzend" value="Verzenden"></td>
                        </tr>
                    </table>
                </form>
            </main>
            <div id="sidebar">Welcome to the registration page of the GLR, on this website you must first log in. Once you are logged in, you can log in as a parent
        for a meeting with your son and/or daughters to plan an appointment mentor. During this meeting we will talk about your child and how your child is doing this year, and what we can do to improve this.
        It will also be about your child's working attitude.</div>
            <footer>
                <p>Gemaakt door Aria Diba</p>
            </footer>
        </div>
        </body>
        </html> <?php
    }
    else {
        header("Location: index.php");
    }
}


