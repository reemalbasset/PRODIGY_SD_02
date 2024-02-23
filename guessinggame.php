<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="guessinggame.css">
    <title>Number Guessing Game</title>
</head>
<body>

<h2>Number Guessing Game</h2>
<div class="container">
<form method="post" action="">
    <label for="guess">Enter your guess (between 1 and 100):</label>
    <input type="number" name="guess" min="1" max="100" required>
    <input type="submit" value="Submit Guess">
</form>
<br><br>

<?php
session_start();

if (!isset($_SESSION['target'])) {
    // Initialize a new game
    $_SESSION['target'] = rand(1, 100);
    $_SESSION['attempts'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guess = intval($_POST["guess"]);
    $_SESSION['attempts']++;

    if ($guess == $_SESSION['target']) {
        echo "Congratulations! You guessed the correct number ({$_SESSION['target']}) in {$_SESSION['attempts']} attempts.";
        // Reset the game
        unset($_SESSION['target']);
        unset($_SESSION['attempts']);
    } elseif ($guess < $_SESSION['target']) {
        echo "Too low! Try again.";
    } else {
        echo "Too high! Try again.";
    }
}
?>
</div>

</body>
</html>
