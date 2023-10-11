<?php

include __DIR__ . '/function.php';
include __DIR__ . '/server.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div style="height: 100vh;" class="main bg-dark">
        <div class="container">
            <h1 class="text-secondary text-center py-4">Strong Password Generator</h1>
            <h2 class="text-white text-center mb-4">Genera una password sicura</h2>

            <?= $alert ?>
            <!-- Inserisco la logica di function.php -->

            <div class="card bg-white py-5 px-3">
                <form action="" method="GET" class="d-flex">
                    <div class="col-6">
                        <label for="password_length" class="form-label">Lunghezza Password:</label><br>
                        <button type="submit" class="btn btn-primary">Invia</button>
                        <button type="reset" class="btn btn-secondary">Annulla</button>
                    </div>
                    <div class="col-2">
                        <input type="number" name="password_length" id="password_length" class="form-control shadow" min="0">
                    </div>

                </form>
            </div>

        </div>
    </div>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>