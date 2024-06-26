
<?php
    require_once('partials/autoload.php');
    setcookie("user", "fanúšik", time() + (5), "/");
    require_once('partials/header.php');
?>

<body>
    <?php if(isset($_COOKIE["user"])): ?>
        <p>Vitajte späť, <?php echo $_COOKIE["user"]; ?>!</p>
    <?php endif; ?>

    <div id="uvod-text">
        <div id="obr">
            <img src="img/hrac1.png" alt="" >
        </div>
        <div>
            <h2>Česká hokejová Extraliga</h2>
            <p>Vitajte na domovskej stránke Českej hokejovej Extraligy!
            Česká hokejová Extraliga je srdcom a dušou českej hokejovej scény. Od jej založenia v roku 1993 sa stala domovom pre niektoré z najväčších hokejových talentov v Európe a poskytuje fanúšikom nezabudnuteľné zážitky z každého zápasu.
            Na tejto stránke nájdete všetko, čo potrebujete vedieť o tomto vášnivom svete hokeja. Pozrite si najnovšie výsledky, sledujte tabuľku, prečítajte si zaujímavé články a rozhovory s hráčmi a trénermi, a nezmeškajte ani aktuálne správy a udalosti zo sveta hokeja.
            Extraliga je miestom, kde sa stretávajú zanietení fanúšikovia z celého Česka a okolitých krajín, aby spoločne povzbudzovali svoje obľúbené tímy a zažili atmosféru, ktorá je jedinečná pre tento šport.
            </p>
        </div>
    </div>

    <div id="uvod-text2">
        <div>
            <p>Okrem toho, že Extraliga ponúka vynikajúci hokejový zážitok, je tiež dôležitou súčasťou vývoja mládežníckeho hokeja v Česku.</p> <p>Kluby sa sústredia nielen na úspechy svojich áčok, ale aj na rozvoj mladých talentov prostredníctvom svojich akadémií a mládežníckych tímov.
            Takže, zapojte sa do akcie a sledujte najlepší český hokej na najvyššej úrovni priamo tu, na našej domovskej stránke Českej hokejovej Extraligy!</p>
        </div>
        <div id="obr2">
            <img src="img/hrac2.png" alt="" >
        </div>
    </div>


    <?php
    $spravy = new NewsClass();
    $news = $spravy->getNews();
    ?>

    <div id="news">
        <h1>Najnovšie správy</h1>
        <?php foreach ($news as $newsItem): ?>
            <div class="news-item">
                <h3><?php echo $newsItem['title']; ?></h3>
                <p><?php echo $newsItem['content']; ?></p>
                <small><?php echo $newsItem['date']; ?></small>
            </div>
        <?php endforeach; ?>
    </div>

</body>

<?php
require_once "partials/footer.php";
?>