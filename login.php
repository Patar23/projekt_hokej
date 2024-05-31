<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);


    if ($username == "admin" && $password == "password") {
        $_SESSION['loggedin'] = true;
        header("Location: tabulka.php");
        exit();
    } else {
        $error = "Nesprávne meno alebo heslo!";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prihlásenie</title>
</head>
<body>
    <h2>Prihlásenie</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Meno:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Heslo:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Prihlásiť sa</button>
    </form>
</body>
</html>