<?php
/* 
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
leggete le slide sulla session e la documentazione

Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
*/




// creo una funzione che generi caratteri random

function random_password($length)
{
    $password = random_bytes($length);
    $password = base64_encode($password);
    $password = str_replace(["+", "/", "="], "", $password);
    $password = substr($password, 0, $length);

    return $password;
}

$password_length = $_GET['password_length'];
$new_password = '';

//var_dump($password_length);


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

    <div class="main bg-dark">
        <div class="container">
            <h1 class="text-secondary text-center py-4">Strong Password Generator</h1>
            <h2 class="text-white text-center mb-4">Genera una password sicura</h2>

            <?php
            if ($password_length != null and $password_length >= 6) :
                echo '<div class="alert alert-success" role="alert">

                        <p>La tua nuova password è <strong>' .  random_password($password_length)  . '</strong></p>

                    </div>';
            elseif ($password_length != null and $password_length < 6) :
                echo '<div class="alert alert-danger" role="alert">

                        <p>Seleziona un minimo di 6 caratteri</p>

                    </div>';
            endif; ?>


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