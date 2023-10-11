<?php
/* 
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1 ✅
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2 ✅
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

    //header('Location: /server.php');

    return $password;
}

$password_length = $_GET['password_length'];
$new_password = '';

//var_dump($password_length);

if ($password_length != null and $password_length >= 6) {
    $alert = '<div class="alert alert-success" role="alert">

                        <p>La tua nuova password è <strong>' .  random_password($password_length)  . '</strong></p>

                    </div>';
} elseif ($password_length != null and $password_length < 6) {
    $alert = '<div class="alert alert-danger" role="alert">

                        <p>Seleziona un minimo di 6 caratteri</p>

                    </div>';
}
