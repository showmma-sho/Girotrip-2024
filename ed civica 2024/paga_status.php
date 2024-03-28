<?php
session_start();
include "connection.php";


$Nome = $_SESSION['Nome']; 


$sql = "SELECT ID FROM Utenti WHERE Nome = '$Nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    $userID = $row['ID'];

    
    $sql = "SELECT * FROM Methodo_Paga WHERE userID = '$userID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $Tipo_Piano = $row['Tipo_Piano'];
        $Tempo_paga = strtotime($row['Tempo_paga']); 

        
        switch ($Tipo_Piano) {
            case 'weekly':
                $expiry_timestamp = strtotime('+7 days', $Tempo_paga);
                break;
            case 'monthly':
                $expiry_timestamp = strtotime('+1 month', $Tempo_paga);
                break;
            case 'yearly':
                $expiry_timestamp = strtotime('+1 year', $Tempo_paga);
                break;
        }

        if (time() < $expiry_timestamp) {
            
            echo json_encode(true);
        } else {
            
            echo json_encode(false);
        }
    } else {
        
        echo json_encode(false);
    }
} else {
    echo "No user found with that name";
}

$conn->close();
?>
