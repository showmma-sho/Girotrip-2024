<?php
session_start();
if(isset($_SESSION["Nome"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Already Logged In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card rounded-5">
                    <div class="card-header bg-primary text-white">
                        Already Logged In
                    </div>
                    <div class="card-body">
                        <p>Hai già effettuato l'accesso come <?php echo $_SESSION["Nome"]; ?>.</p>
                        <a href="home.php" class="btn btn-primary btn-block">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card rounded-5">
                    <div class="card-header bg-primary text-white">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="verifica.php" method="post">
                            <div class="form-group">
                                <label for="ID">ID</label>
                                <input class="form-control" name="ID" placeholder="Enter ID">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" name="PW" placeholder="Password">
                            </div>
                            <input type="submit" name="invio" value="Invia" class="btn btn-primary btn-block">
                        </form>
                    </div>
                    <div class="card-footer">
                        <p style="text-align: center;">Non hai un account? <a href="crea.html" style="color: #5627FF;">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
