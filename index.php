<!DOCTYPE html>

<html>
    <?php 
        $data =  json_decode(file_get_contents("data.json"), true)
    ?>
    <header>
        <title><?php echo $data["title"] ?></title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
    </header>

    <body>
        <h1><?php echo $data["title"] ?></h1>
        <?php
            foreach ($data["posts"] as $post) {
                echo "<br><a href='post.php?name={$post["title"]}'><h2>{$post["title"]}</h2></a>";
                echo "<p>{$post["date"]}</p>";
                echo "<img src='{$post["image"]}'>";

                if (sizeof($post["text"]) < $data["description-length"]) {
                    foreach ($post["text"] as $line) {
                        echo $line."<br>";
                    }
                }
                
                else {
                    for ($i = 0; $i <= $data["description-length"]-1; $i++) {
                        echo $post["text"][$i]."<br>";
                    } 
                }
            }
        ?>
    </body>
</html>