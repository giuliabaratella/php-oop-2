<?php
include __DIR__."/Views/header.php";
include __DIR__."/Model/Book.php";
$books = Book::fetchAll();

?>

<section>
    <h2 class="py-4">Books</h2>
    <div class="row">
        <?php
        foreach($books as $book) {
            $book->printCard($book->formatCard());

        }
        ?>
    </div>
</section>


<?php
include __DIR__."/Views/footer.php";
?>