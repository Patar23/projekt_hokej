<?php
session_start();
session_destroy();
header("Location: tabulka.php");
exit();
?>