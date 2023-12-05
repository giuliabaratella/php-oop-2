<?php
class Videogame
{
    public string $name;
    public string $img_icon_url;
    public string $appid;

    public function __construct($name, $image, $id)
    {
        $this->name = $name;
        $this->img_icon_url = $image;
        $this->appid = $id;
    }

    public static function fetchAll()
    {
        $gameString = file_get_contents(__DIR__ . "/steam_db.json");
        $gameList = json_decode($gameString, true);

        $games = [];
        foreach ($gameList as $game) {
            $games[] = new Videogame($game['name'], $game['img_icon_url'], $game['appid']);
        }
        // var_dump($games);
        return $games;
    }

    public function printCard()
    {
        $title = $this->name;
        $overview = $this->templateId();
        $image = $this->img_icon_url;
        include __DIR__ . "/../Views/card.php";
    }
    private function templateId()
    {
        $template = "<p>Id number: " . $this->appid . "</p>";
        return $template;
    }



}

?>