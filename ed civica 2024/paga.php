<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



    include "connection.php";


    $Nome = $_SESSION['Nome']; 


    $sql = "SELECT ID FROM Utenti WHERE Nome = '$Nome'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $userID = $row['ID'];


        $Tipo_Piano = $_POST['plan'];
        $Num_Carta = $_POST['Num_Carta'];
        $Titolare = $_POST['Titolare'];
        $Scadenza = $_POST['Scadenza'];
        $Cvv = $_POST['Cvv'];


        $sql = "INSERT INTO Methodo_Paga (Tipo_Piano, Num_Carta, Titolare, Scadenza, Cvv, userID) VALUES ('$Tipo_Piano', '$Num_Carta', '$Titolare', '$Scadenza', '$Cvv', '$userID')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No user found with that name";
    }

    $conn->close();
?>
