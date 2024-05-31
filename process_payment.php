<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardNumber = htmlspecialchars($_POST['cardNumber']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $age = htmlspecialchars($_POST['age']);


    echo "Vaša platba bola úspešne odoslaná!";
}
?>