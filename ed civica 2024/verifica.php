<?php
session_start();

include "connection.php";

//$usnm = mysqli_real_escape_string($conn, $_POST['ID']);
//$pswd = mysqli_real_escape_string($conn, $_POST['PW']);
//$pswd = md5($pswd);
$usnm = $_POST["ID"];
$pswd = $_POST["PW"];

$sql = "SELECT * FROM Utenti where ID='$usnm' and PW='$pswd'";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    $row = mysqli_fetch_array($result);
    $nome = $row["Nome"];

    $_SESSION["Nome"] = $nome;

    header("Location: home.php");
}
else
{
    header("Location: login.php");
}

$conn->close();
?>
