<?php
include __DIR__."/Views/header.php";
include __DIR__."/Model/Videogame.php";
$games = Videogame::fetchAll();

?>

<section>
    <h2 class="py-4">Videogames</h2>
    <div class="row">
        <?php
        foreach($games as $game) {
            $game->printCard($game->formatCard());

        }
        ?>
    </div>
</section>


<?php
include __DIR__."/Views/footer.php";
?>