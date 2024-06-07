<?php
session_start();
require_once 'partials/header.php';
require_once 'classes/TeamClass.php';

$kluby = new TeamClass();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == "add") {
            $klub = htmlspecialchars($_POST['klub']);
            $vyhry = intval($_POST['vyhry']);
            $vp = intval($_POST['vp']);
            $pp = intval($_POST['pp']);
            $prehry = intval($_POST['prehry']);
            $skore = htmlspecialchars($_POST['skore']);
            $body = intval($_POST['body']);

            $kluby->addTeam($klub, $vyhry, $vp, $pp, $prehry, $skore, $body);
            header("Location: tabulka.php");
            exit();
        } elseif ($action == "delete") {
            $id = intval($_POST['id']);
            $kluby->deleteTeam($id);
            header("Location: tabulka.php");
            exit();
        } elseif ($action == "edit") {
            $id = intval($_POST['id']);
            $klub = htmlspecialchars($_POST['klub']);
            $vyhry = intval($_POST['vyhry']);
            $vp = intval($_POST['vp']);
            $pp = intval($_POST['pp']);
            $prehry = intval($_POST['prehry']);
            $skore = htmlspecialchars($_POST['skore']);
            $body = intval($_POST['body']);

            $kluby->editTeam($id, $klub, $vyhry, $vp, $pp, $prehry, $skore, $body);
            header("Location: tabulka.php");
            exit();
        }
    }
}

$teams = $kluby->getTeams();
?>

<body>
    <h2>Tabuľka tímov</h2>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <form action="tabulka.php" method="post">
            <input type="hidden" name="action" value="add">
            <label for="klub">Názov klubu:</label>
            <input type="text" id="klub" name="klub" required>
            <label for="vyhry">Výhry:</label>
            <input type="number" id="vyhry" name="vyhry" required>
            <label for="vp">VP:</label>
            <input type="number" id="vp" name="vp" required>
            <label for="pp">PP:</label>
            <input type="number" id="pp" name="pp" required>
            <label for="prehry">Prehry:</label>
            <input type="number" id="prehry" name="prehry" required>
            <label for="skore">Skóre:</label>
            <input type="text" id="skore" name="skore" required>
            <label for="body">Body:</label>
            <input type="number" id="body" name="body" required>
            <button type="submit">Pridať tím</button>
        </form>
    <?php endif; ?>
    <table border="1">
        <thead>
            <tr>
                <th>Názov klubu</th>
                <th>Výhry</th>
                <th>VP</th>
                <th>PP</th>
                <th>Prehry</th>
                <th>Skóre</th>
                <th>Body</th>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <th>Akcie</th>
                <?php endif; ?>
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
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <td>
                            <form action="tabulka.php" method="post" style="display:inline;">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?= $team['id']; ?>">
                                <input type="text" name="klub" value="<?= htmlspecialchars($team['klub']); ?>" required>
                                <input type="number" name="vyhry" value="<?= htmlspecialchars($team['vyhry']); ?>" required>
                                <input type="number" name="vp" value="<?= htmlspecialchars($team['vp']); ?>" required>
                                <input type="number" name="pp" value="<?= htmlspecialchars($team['pp']); ?>" required>
                                <input type="number" name="prehry" value="<?= htmlspecialchars($team['prehry']); ?>" required>
                                <input type="text" name="skore" value="<?= htmlspecialchars($team['skore']); ?>" required>
                                <input type="number" name="body" value="<?= htmlspecialchars($team['body']); ?>" required>
                                <button type="submit">Upraviť</button>
                            </form>
                            <form action="tabulka.php" method="post" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $team['id']; ?>">
                                <button type="submit">Vymazať</button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>
        <p id="prihlasenie"><a href="login.php">Prihlásiť sa na úpravu tabuľky</a></p>
    <?php else: ?>
        <p id="odhlasenie"><a id="odhlasenie" href="logout.php">Odhlásiť sa</a></p>
    <?php endif; ?>
</body>

<?php
require_once "partials/footer.php";
?>