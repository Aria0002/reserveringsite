<?php
session_start();
if ($_SESSION['username']){
    if($_SESSION['role'] != "ouder") {
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
                <?php
                    if (mysqli_num_rows($results) == 0){
                        ?> <p>Er zijn geen aanmeldingen</p> <?php
                    } else {
                        ?>
                        <table id="tableAanmelding">
                            <tr>
                                <th class="thAanmelding">Name parent</th>
                                <th class="thAanmelding">Number of people</th>
                                <th class="thAanmelding">Time</th>
                                <th class="thAanmelding">Comments</th>
                            </tr>
                            <?php
                        while($row = mysqli_fetch_array($results)) {
                            ?>
                            <tr id="AanmeldingRow">
                                <td><?=$row["naam"]?></td>
                                <td><?=$row["aantalPersonen"]?></td>
                                <td><?=$row["tijdSlot"]?></td>
                                <td><div style="max-width: 400px;overflow-wrap: break-word;"><?=$row["opmerking"]?></div></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table> <?php
                    }
                ?>
            </main>
            <div id="sidebar">Welcome to the registration page of the GLR, on this website you must first log in. Once you are logged in, you can log in as a parent
        for a meeting with your son and/or daughters to plan an appointment mentor. During this meeting we will talk about your child and how your child is doing this year, and what we can do to improve this.
        It will also be about your child's working attitude.</div>
            <footer>
                <p>Gemaakt door Aria Diba</p>
            </footer>
        </div>
        </body>
        </html>
         <?php
    }
    else {
        header("Location: index.php");
    }
}


