<?php
        require_once('partials/header.php'); 
?>


<body>
    <div class="dropdown0">
        <div class="dropdown">
            <button class="dropbtn" id="selectedOption">Vyberte tím</button>
            <div class="dropdown-content">
                <a href="#" onclick="selectOption('HC Dynamo Pardubice')">HC Dynamo Pardubice</a>
                <a href="#" onclick="selectOption('HC Sparta Praha')">HC Sparta Praha</a>
                <a href="#" onclick="selectOption('HC Oceláři Třinec')">HC Oceláři Třinec</a>
                <a href="#" onclick="selectOption('HC Kometa Brno')">HC Kometa Brno</a>
                <a href="#" onclick="selectOption('HC VERVA Litvínov')">HC VERVA Litvínov</a>
                <a href="#" onclick="selectOption('Banes Motor Č. Budějovice')">Banes Motor Č. Budějovice</a>
                <a href="#" onclick="selectOption('Bílí Tygři Liberec')">Bílí Tygři Liberec</a>
                <a href="#" onclick="selectOption('Mountfield HK')">Mountfield HK</a>
                <a href="#" onclick="selectOption('HC VÍTKOVICE RIDERA')">HC VÍTKOVICE RIDERA</a>
                <a href="#" onclick="selectOption('HC Olomouc')">HC Olomouc</a>
                <a href="#" onclick="selectOption('HC Energie Karlovy Vary')">HC Energie Karlovy Vary</a>
                <a href="#" onclick="selectOption('HC Škoda Plzeň')">HC Škoda Plzeň</a>
                <a href="#" onclick="selectOption('BK Mladá Boleslav')">BK Mladá Boleslav</a>
                <a href="#" onclick="selectOption('Rytíři Kladno')">Rytíři Kladno</a>
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