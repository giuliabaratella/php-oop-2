<?php
include __DIR__."/Genre.php";
include __DIR__."/Product.php";
include __DIR__."/../Traits/DrawCard.php";
include __DIR__."/../Traits/Discount.php";


class Movie extends Product {
    use DrawCard;
    use Discount;
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    public string $poster_path;
    public array $genres;
    public string $original_language;

    function __construct($id, $title, $overview, $vote, $image, $genres, $language, $quantity, $price) {
        parent::__construct($quantity, $price);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->genres = $genres;
        $this->original_language = $language;
        $this->discount = 0;
    }


    public function voteStars() {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for($i = 1; $i <= 5; $i++) {
            $template .= $i <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
    public function getGenres() {
        $template = "<p>";
        for($i = 0; $i < count($this->genres); $i++) {
            $template .= "<span class='badge bg-secondary'>".$this->genres[$i]->name."</span>";
        }
        $template .= "</p>";
        return $template;
    }

    public function formatCard() {
        if(ceil($this->vote_average) <= 6) {
            try {
                $this->setDiscount(20);
            } catch (Exception $e) {
                $error = 'Exception: '.$e->getmessage();
            }

        }
        $cardItem = [
            'error' => $error ?? '',
            'discount' => $this->getDiscount(),
            'image' => $this->poster_path,
            'title' => $this->title,
            'overview' => substr($this->overview, 0, 150),
            'custom1' => $this->getGenres(),
            'custom2' => $this->voteStars(),
            'custom3' => $this->getLanguage($this->original_language),
            'price' => $this->price,
            'quantity' => $this->quantity

        ];
        return $cardItem;

    }

    public function getLanguage($lan) {
        $flags = [
            'ca',
            'de',
            'en',
            'fr',
            'it',
            'ja',
            'kr',
            'us',
        ];
        if(!in_array($lan, $flags)) {
            $flag = 'img/noflag.png';
        } else {
            $flag = "img/".$lan.".svg";
        }
        return $flag;

    }

    public static function fetchAll() {
        $movieString = file_get_contents(__DIR__.'/movie_db.json');
        $movieList = json_decode($movieString, true);


        $movies = [];
        $genres = Genre::fetchAll();
        foreach($movieList as $item) {
            $moviegenres = [];
            while(count($moviegenres) < count($item['genre_ids'])) {
                $index = rand(0, count($genres) - 1);
                $rnd_genre = $genres[$index];
                if(!in_array($rnd_genre, $moviegenres)) {
                    $moviegenres[] = $rnd_genre;
                }
            }
            $quantity = Product::getQuantity();
            $price = Product::getPrice();
            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $moviegenres, $item['original_language'], $quantity, $price);
        }

        // var_dump($movies[0]);
        return $movies;


    }


}





?>