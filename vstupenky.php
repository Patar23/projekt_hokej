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

 
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="paymentForm" action="process_payment.php" method="post">
                <label for="cardNumber">Číslo karty:</label>
                <input type="text" id="cardNumber" name="cardNumber" required><br><br>
                <label for="firstName">Meno:</label>
                <input type="text" id="firstName" name="firstName" required><br><br>
                <label for="lastName">Priezvisko:</label>
                <input type="text" id="lastName" name="lastName" required><br><br>
                <label for="age">Vek:</label>
                <input type="number" id="age" name="age" required><br><br>
                <button type="submit">Odoslať</button>
            </form>
        </div>
    </div>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeConfirmationModal()">&times;</span>
            <p id="confirmationMessage">Vaša platba bola úspešne odoslaná!</p>
        </div>
    </div>

    <script>
    var prices = {
        "Permanentka": 100,
        "Dospelý": 10,
        "Dieťa": 5,
        "ZŤP": 5
    };

    function updatePrice() {
        var selectedTeam = document.getElementById("selectedOption").innerText;
        var selectedTribune = document.getElementById("selectedOption3").innerText;
        var selectedTicketType = document.getElementById("selectedOption2").innerText;

        if (selectedTicketType === "Typ vstupenky") {
            return;
        }

        var price = prices[selectedTicketType];

        if (selectedTribune === "Vyberte tribúnu") {
        } else if (selectedTribune === "Tribúna A" || selectedTribune === "Tribúna B") {
            price += 20;
        } else {
            price += 10;
        }

        document.getElementById("price").textContent = "Cena: " + price + " €";
        checkSelection();
    }

    function selectOption(option) {
        document.getElementById('selectedOption').innerText = option;
        updatePrice();
    }

    function selectOption2(option) {
        document.getElementById('selectedOption2').innerText = option;
        updatePrice();
    }

    function selectOption3(option) {
        document.getElementById('selectedOption3').innerText = option;
        updatePrice();
    }

    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    function openConfirmationModal(message) {
        document.getElementById('confirmationMessage').innerText = message;
        document.getElementById('confirmationModal').style.display = "block";
    }

    function closeConfirmationModal() {
        document.getElementById('confirmationModal').style.display = "none";
    }

    function checkSelection() {
        var teamSelected = document.getElementById('selectedOption').innerText !== "Vyberte tím";
        var tribuneSelected = document.getElementById('selectedOption3').innerText !== "Vyberte tribúnu";
        var ticketTypeSelected = document.getElementById('selectedOption2').innerText !== "Typ vstupenky";

        if (teamSelected && tribuneSelected && ticketTypeSelected) {
            document.getElementById('payButton').disabled = false;
        } else {
            document.getElementById('payButton').disabled = true;
        }
    }

    checkSelection();

    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('process_payment.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            closeModal();
            openConfirmationModal(data);
            this.reset();
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</body>

<?php
        include "partials/footer.php"
?>