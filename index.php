<?php

//session start
ob_start();
session_start();

//set or get random number
if (isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = $_SESSION['randomNumber'];
}else{
    $_SESSION['randomNumber'] = rand(0 , 10);
}
echo "Random Number = " . $_SESSION['randomNumber'];


//set or get number of guesses
if (isset($_SESSION['numberOfGuesses'])) {
    $_SESSION['numberOfGuesses'] = $_SESSION['numberOfGuesses'];
}else{
    $_SESSION['numberOfGuesses'] = 0;
}

if (isset($_SESSION['userAttempts'])) {
    $_SESSION['userAttempts'] = $_SESSION['userAttempts'];
}else{
    $_SESSION['userAttempts'] = '';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="gameLogic.php">
    <p>Try your luck! Guess number from 0 to 10 </p>
    <label for="userVariant">Post your number</label>
    <input type="text" name="userVariant">
    <input type="submit" value="Guess" name="guessSubmit" style="background: #5ede1a">
    <br>
    <label for="numberOfGuesses">Number of attempts</label>
    <input name="numberOfGuesses" value="<?php echo $_SESSION['numberOfGuesses']; ?>">
    <br>
    <label for="numberOfGuesses">Your Attempts was:</label>
    <input name="numberOfGuesses" value="<?php echo $_SESSION['userAttempts']; ?>">
    <br>
    <input type="submit" name="reset" value="Reset" style="background: red">

</form>

</body>
</html>

