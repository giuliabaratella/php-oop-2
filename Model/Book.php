<?php
class Book
{
    public string $title;
    public string $longDescription;
    public string $thumbnailUrl;
    public array $authors;
    public array $categories;

    public function __construct($title, $description, $image, $authors, $categories)
    {
        $this->title = $title;
        $this->longDescription = $description;
        $this->thumbnailUrl = $image;
        $this->authors = $authors;
        $this->categories = $categories;
    }
    public static function fetchAll()
    {
        $bookString = file_get_contents(__DIR__ . "/books_db.json");
        $bookList = json_decode($bookString, true);

        $books = [];
        foreach ($bookList as $book) {
            $books[] = new Book($book['title'], $book['longDescription'], $book['thumbnailUrl'], $book['authors'], $book['categories']);
        }
        // var_dump($books[0]);
        return $books;
    }

    public function printCard()
    {
        $title = $this->title;
        $overview = substr($this->longDescription, 0, 150);
        $image = $this->thumbnailUrl;
        $custom1 = $this->getAuthors();
        $custom2 = $this->getCategories();
        include __DIR__ . "/../Views/card.php";
    }
    private function getAuthors()
    {
        $template = "<p> Authors: ";
        for ($i = 0; $i < count($this->authors); $i++) {
            $template .= "<span'>" . $this->authors[$i] . " </span>";
        }
        $template .= "</p>";
        return $template;
    }
    private function getCategories()
    {
        $template = "<p>";
        for ($i = 0; $i < count($this->categories); $i++) {
            $template .= "<span class='badge bg-success'>" . $this->categories[$i] . "</span>";
        }
        $template .= "</p>";
        return $template;
    }



}


?>