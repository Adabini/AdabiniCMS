<!DOCTYPE html>

<html>
    <header>
        <title><?php echo $_GET["name"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
    </header>

    <body>
        <h1><?php echo $_GET["name"] ?></h1>
        <?php
            $data =  json_decode(file_get_contents("data.json"), true);
            
            foreach ($data["posts"] as $post) {
                if ($post["title"] == $_GET["name"]) {
                    echo "<p>{$post["date"]}</p>";
                    echo "<img src='{$post["image"]}'>";

                    foreach ($post["text"] as $line) {
                        echo $line."<br>";
                    }
                }
            }        
        ?>

        <br><br><a href="index.php">Return</a>
    </body>
</html>