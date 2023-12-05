<?php
include __DIR__ . "/Genre.php";

class Movie
{
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    public string $poster_path;
    public array $genres;
    public string $original_language;

    function __construct($id, $title, $overview, $vote, $image, $genres, $language)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->genres = $genres;
        $this->original_language = $language;
    }


    public function voteStars()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($i = 1; $i <= 5; $i++) {
            $template .= $i <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
    public function getGenres()
    {
        $template = "<p>";
        for ($i = 0; $i < count($this->genres); $i++) {
            $template .= "<span class='badge bg-secondary'>" . $this->genres[$i]->name . "</span>";
        }
        $template .= "</p>";
        return $template;
    }
    public function printCard()
    {
        $title = $this->title;
        $overview = substr($this->overview, 0, 150);
        $image = $this->poster_path;
        $custom1 = $this->getGenres();
        $custom2 = $this->voteStars();
        $custom3 = $this->getLanguage($this->original_language);
        include __DIR__ . "/../Views/card.php";

    }
    public function getLanguage($lan)
    {
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
        if (!in_array($lan, $flags)) {
            $flag = 'img/noflag.png';
        } else {
            $flag = "img/" . $lan . ".svg";
        }
        return $flag;

    }

    public static function fetchAll()
    {
        $movieString = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movieString, true);


        $movies = [];
        $genres = Genre::fetchAll();
        foreach ($movieList as $item) {
            $moviegenres = [];
            while (count($moviegenres) < count($item['genre_ids'])) {
                $index = rand(0, count($genres) - 1);
                $rnd_genre = $genres[$index];
                if (!in_array($rnd_genre, $moviegenres)) {
                    $moviegenres[] = $rnd_genre;
                }
            }

            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $moviegenres, $item['original_language']);
        }

        // var_dump($movies);
        return $movies;


    }


}





?>