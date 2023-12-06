<?php
include __DIR__."/Views/header.php";
include __DIR__."/Model/Movie.php";
$movies = Movie::fetchAll();

?>

<section>
    <h2 class="py-4">Movies</h2>
    <div class="row">
        <?php
        foreach($movies as $movie) {
            $movie->printCard($movie->formatCard());

        }
        ?>
    </div>
</section>


<?php
include __DIR__."/Views/footer.php";
?>