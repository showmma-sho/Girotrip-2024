<?php
session_start();

// Connect to your database
include("connection.php");

// Get the form data
$plan = $_POST['plan'];
$cardNumber = $_POST['Num_Carta'];
$cardHolder = $_POST['Titolare'];
$expiryDate = $_POST['Scadenza'];
$cvv = $_POST['Cvv'];

// Assuming you have stored the user's name in the session
$nome = $_SESSION['Nome'];

// Insert the payment into the database
$sql = "INSERT INTO Methodo_Paga (userID, Tipo_Piano, Num_Carta, Titolare, Scadenza, Cvv, Tempo_paga) 
        SELECT ID, '$plan', '$cardNumber', '$cardHolder', '$expiryDate', '$cvv', CURRENT_TIMESTAMP 
        FROM Utenti WHERE Nome = '$nome'";

if ($conn->query($sql) === TRUE) {
    // Redirect to the confirmation page
    header('Location: paga_conferma.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
