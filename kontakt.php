<?php
require_once('partials/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - Česká hokejová Extraliga</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h2>Kontaktujte nás</h2>
        <div class="contact-info">
            <?php
            $contacts = [
                'email' => 'info@extraliga.cz',
                'phone' => '+420 123 456 789',
                'address' => 'Vinohradská 123, 110 00 Praha, Česká republika'
            ];
            ?>
            <p><strong>Email:</strong> <?php echo $contacts['email']; ?></p>
            <p><strong>Telefón:</strong> <?php echo $contacts['phone']; ?></p>
            <p><strong>Adresa:</strong> <?php echo $contacts['address']; ?></p>
        </div>

        <div class="contact-form">
            <h3>Pošlite nám správu</h3>
            <form id="contactForm" action="send_contact.php" method="post">
                <label for="name">Meno:</label>
                <input type="text" id="name" name="name" required><br><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                
                <label for="message">Správa:</label>
                <textarea id="message" name="message" required></textarea><br><br>
                
                <button type="submit">Odoslať</button>
            </form>
        </div>

        <div id="map">
            <h3>Kde nás nájdete</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.4898193178285!2d14.42075701571961!3d50.08804097942539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b949db34b85fb%3A0x14e57d92e8e5d4a6!2sVinohradsk%C3%A1%2C%20110%2000%20Praha%201%2C%20%C4%8Cesk%C3%A1%20republika!5e0!3m2!1ssk!2ssk!4v1598630375914!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>


    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Vaša správa bola úspešne odoslaná!</p>
        </div>
    </div>

 
</body>
<?php
include "partials/footer.php";
?>