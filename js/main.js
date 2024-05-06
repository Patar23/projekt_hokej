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

function checkSelection() {
    var teamSelected = document.getElementById('selectedOption').innerText;
    var tribuneSelected = document.getElementById('selectedOption3').innerText;
    var ticketTypeSelected = document.getElementById('selectedOption2').innerText;

    if (teamSelected !== "Vyberte tím" && tribuneSelected !== "Vyberte tribúnu" && ticketTypeSelected !== "Typ vstupenky") {
        document.getElementById('payButton').disabled = false;
    } else {
        document.getElementById('payButton').disabled = true;
    }
}

checkSelection();

function submitForm(event) {
    event.preventDefault();
    closeModal();
}

document.querySelector("form").addEventListener("submit", submitForm);


