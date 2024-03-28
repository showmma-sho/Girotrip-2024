<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "connection.php";

if (isset($_POST["register"])) {
    $usnm = $_POST["ID"];
    $pswd = $_POST["PW"];
    $fname = $_POST["Nome"];
    $lname = $_POST["Cognome"];

    $data_modifica = date("Y-m-d H:i:s");
    $query = "INSERT INTO Utenti (ID, PW, Nome, Cognome) VALUES ('$usnm', '$pswd', '$fname', '$lname')";

    if ($conn->query($query)) {
        $conferma = "Account creato con successo!";
        $_SESSION["Nome"] = $fname; // Set the session variable
    } else {
        $conferma = "Creazione dell'account non riuscita. Per favore riprova.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma della registrazione</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card rounded-5">
                    <div class="card-header bg-success text-white">
                    Conferma della registrazione
                    </div>
                    <div class="card-body">
                        <?php if (isset($conferma)) { ?>
                            <div class="alert alert-success">
                                <?php echo $conferma; ?>
                            </div>
                        <?php } ?>
                        <div id="countdown"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var seconds = 2;
    var countdown = document.getElementById("countdown");

    function updateCountdown() {
        countdown.innerHTML = "Reindirizzamento in " + seconds + " second" + (seconds === 1 ? "" : "i") + "...";
        if (seconds === 0) {
            clearInterval(countdownInterval);
            window.location.href = "home.php";
        }
        seconds--;
    }

    updateCountdown();
    var countdownInterval = setInterval(updateCountdown, 1000);
</script>

</body>
</html>
