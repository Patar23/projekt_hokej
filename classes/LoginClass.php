<?php
class LoginClass {
    private $username;
    private $password;
    private $error;

    public function __construct($username, $password) {
        $this->username = htmlspecialchars($username);
        $this->password = htmlspecialchars($password);
    }

    public function authenticate() {
        if ($this->username == "admin" && $this->password == "password") {
            $_SESSION['loggedin'] = true;
            header("Location: tabulka.php");
            exit();
        } else {
            $this->error = "Nesprávne meno alebo heslo!";
        }
    }

    public function getError() {
        return $this->error;
    }
}
?>