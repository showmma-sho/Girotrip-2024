<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: auto; 
            margin-top: 50px; 
        }
        .payment-card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .payment-form {
            margin-bottom: 20px;
        }
        .payment-button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .lock-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-end"> 
        <div class="col-lg-8 col-md-10">
            <div class="payment-card">
                <h1 class="payment-card-title text-center">Modulo di pagamento</h1>
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
        $Tempo_paga = strtotime($row['Tempo_paga']); // Convert to Unix timestamp

        
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
            $remaining_days = ceil(($expiry_timestamp - time()) / 86400); 
            echo '<div class="alert alert-info" role="alert">
            Hai già pagato. Per favore, torna dopo ' . $remaining_days . ' giorni in cui scade il tuo piano attuale.
                  </div>';

                    } 
                } else {
                        echo '<form class="payment-form" action="paga.php" method="post" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label for="plan">Scegli un piano:</label>
                                    <select class="form-control" id="plan" name="plan">
                                        <option value="weekly">Weekly - 10 euros</option>
                                        <option value="monthly">Monthly - 30 euros</option>
                                        <option value="yearly">Yearly - 100 euros</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Num_Carta">Numero di carta</label>
                                    <input type="text" id="Num_Carta" class="form-control" name="Num_Carta" placeholder="1234 5678 9012 3456" oninput="formatCardNumber(this)" maxlength="19">
                                </div>
                                <div class="form-group">
                                    <label for="Titolare">Titolare</label>
                                    <input type="text" id="Titolare" class="form-control" name="Titolare">
                                </div>
                                <div class="form-group">
                                    <label for="Scadenza">Data di scadenza</label>
                                    <input type="date" id="Scadenza" class="form-control" name="Scadenza">
                                </div>
                                <div class="form-group">
                                    <label for="Cvv">CVV</label>
                                    <input type="text" id="Cvv" class="form-control" name="Cvv" maxlength="3">
                                </div>
                                <div class="payment-button-group">
                                    <button type="submit" class="btn btn-primary payment-button"><i class="fas fa-lock lock-icon"></i>Pay</button>
                                    <button type="button" class="btn btn-outline-dark" onclick="goBack()">Torna Indietro</button>
                                </div>
                              </form>';
                    }
                } else {
                    echo "No user found with that name";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function formatCardNumber(input) {
        var cardNumber = input.value.replace(/\s/g, '').replace(/(\d{4})/g, '$1 ').trim();
        input.value = cardNumber;
    }

    function goBack() {
        window.history.back();
    }

    function validateForm() {
        var inputs = document.getElementsByClassName('form-control');
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
                alert('Please fill all the fields.');
                return false;
            }
        }
        return true;
    }
</script>
<div align="center" style="margin-top: 50px;">
        <a class="btn btn-lg btn-outline-dark" style="font-size:20px;" href="Home.php" role="button">Torna Indietro</a>
    </div>
</body>
</html>

