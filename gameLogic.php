<?php

ob_start();
session_start();

$randomNumber = $_SESSION['randomNumber'];
$numberOfGuesses = $_SESSION['numberOfGuesses'];
$userAttempts = $_SESSION['userAttempts'];

$userVariant = $_POST['userVariant'];



//reset all session variables
if (isset($_POST['reset'])) {
    $_SESSION = array();
}

//process user input
if ( (isset($_POST['guessSubmit'])) and is_numeric($userVariant) ) {
    if ($userVariant > $randomNumber) {
        echo 'Your guess is to high. Try Again';
        $_SESSION['numberOfGuesses']++;
        $_SESSION['userAttempts'] = "{$userVariant}" . " " . "{$_SESSION['userAttempts']}";

        header("Refresh:1; index.php");
    }
    if ($userVariant < $randomNumber) {
        echo 'Your guess is to low. Try Again';
        $_SESSION['numberOfGuesses']++;
        $_SESSION['userAttempts'] = "{$userVariant}" . " " . "{$_SESSION['userAttempts']}";
        header("Refresh:1; index.php");
    }
    if ($userVariant == $randomNumber) {
        echo 'Your guess is right'.'<br>';
        $_SESSION['numberOfGuesses'] = 0;
        $_SESSION['randomNumber'] = rand(0, 10);
        $_SESSION['userAttempts'] = "{$userVariant}" . " " . "{$_SESSION['userAttempts']}";
        $userAttempts = $_SESSION['userAttempts'];
        echo "<p>Your attempts was : </p>" . str_replace(" ", "; ", $_SESSION['userAttempts']);
        $_SESSION['userAttempts'] = null;
        header("Refresh:1; index.php");
    }
}else {
    echo 'Enter number from 0 to 10';
    header("Refresh:1; index.php");
}



