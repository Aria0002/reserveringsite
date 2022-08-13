<?php
require "dbconnect.php";

if (isset($_POST['verzend']))
{
    $naam = $_POST["naamVeld"];
    $aantal = $_POST["aantalVeld"];
    $tijden = $_POST["tijden"];
    $opmerking = $_POST["subject"];

    $query = "INSERT INTO aanmelding";
    $query .= "(naam, aantalPersonen, tijdSlot, opmerking)";
    $query .= "VALUES ('$naam', '$aantal', '$tijden', '$opmerking')";

    $result = mysqli_query($db_connect, $query);

    if ($result)
    {
        echo "Registration complete<br/>";
    }
    else
    {
        echo "Registration failed! <br/>";
        echo $query . "<br/>";
        echo mysqli_error($result);
    }
}
else
{
    echo "The form has not been sent (correctly)<br/>";
}

header("Location: index.php")
?>