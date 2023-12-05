<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Videogame.php";
$games = Videogame::fetchAll();

?>

<section>
    <h2>Videogames</h2>
    <div class="row">
        <?php
        foreach ($games as $game) {
            $game->printCard();

        }
        ?>
    </div>
</section>


<?php
include __DIR__ . "/Views/footer.php";
?>