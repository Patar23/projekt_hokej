<?php
        require_once('partials/header.php'); 
?>


<?php
require_once 'database.php';

$db = new Database();
$conn = $db->connect();

$query = 'SELECT * FROM timy';
$stmt = $conn->prepare($query);
$stmt->execute();

$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <table>
        <thead>
            <tr>
                <th>Názov klubu</th>
                <th>Výhry</th>
                <th>VP</th>
                <th>PP</th>
                <th>Prehry</th>
                <th>Skóre</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team): ?>
                <tr>
                    <td><?= htmlspecialchars($team['klub']); ?></td>
                    <td><?= htmlspecialchars($team['vyhry']); ?></td>
                    <td><?= htmlspecialchars($team['vp']); ?></td>
                    <td><?= htmlspecialchars($team['pp']); ?></td>
                    <td><?= htmlspecialchars($team['prehry']); ?></td>
                    <td><?= htmlspecialchars($team['skore']); ?></td>
                    <td><?= htmlspecialchars($team['body']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<?php
        include "partials/footer.php"
?>