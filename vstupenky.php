<?php
require_once('partials/header.php');
require_once('Database.php');


class Team {
    private $conn;
    private $table = 'timy';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTeams() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


$db = new Database();
$conn = $db->connect();

$team = new Team($conn);
$teams = $team->getTeams();
?>

<body>
    <div class="dropdown0">
        <div class="dropdown">
            <button class="dropbtn" id="selectedOption">Vyberte tím</button>
            <div class="dropdown-content">
                <?php foreach ($teams as $team): ?>
                    <a href="#" onclick="selectOption('<?php echo $team['klub']; ?>')"><?php echo $team['klub']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn" id="selectedOption2">Typ vstupenky</button>
            <div class="dropdown-content">
                <a href="#" onclick="selectOption2('Dospelý')">Dospelý</a>
                <a href="#" onclick="selectOption2('Dieťa')">Dieťa</a>
                <a href="#" onclick="selectOption2('ZŤP')">ZŤP</a>
                <a href="#" onclick="selectOption2('Permanentka')">Permanentka</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn" id="selectedOption3">Vyberte tribúnu</button>
            <div class="dropdown-content">
                <a href="#" onclick="selectOption3('Tribúna A')">Tribúna A</a>
                <a href="#" onclick="selectOption3('Tribúna B')">Tribúna B</a>
                <a href="#" onclick="selectOption3('Tribúna C')">Tribúna C</a>
                <a href="#" onclick="selectOption3('Tribúna D')">Tribúna D</a>
            </div>
        </div>

        <div class="dropdown">
            <button id="payButton" class="dropbtn" onclick="openModal()" disabled>Zaplatiť</button>
        </div>

        <p id="price">Cena: 0 €</p>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form>
                <label for="cardNumber">Číslo karty:</label>
                <input type="text" id="cardNumber" name="cardNumber"><br><br>
                <label for="firstName">Meno:</label>
                <input type="text" id="firstName" name="firstName"><br><br>
                <label for="lastName">Priezvisko:</label>
                <input type="text" id="lastName" name="lastName"><br><br>
                <label for="age">Vek:</label>
                <input type="number" id="age" name="age"><br><br>
                <button type="submit">Odoslať</button>
            </form>
        </div>
    </div>

</body>

<?php
        include "partials/footer.php"
?>