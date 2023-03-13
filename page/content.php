<?php
    include("mysql.php");
    $id = intval($_GET['id']);
    $stmt = "SELECT * FROM media WHERE id = '".$id."'";
    $row = $conn->query($stmt);
    $row = $row->fetch_assoc();
    $title = $row["title"];
    $content = $row["content"];
    $image = $row["image"];
    $imageData = base64_encode(file_get_contents($image));
    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "/style/nasa_css.css"/>
    <?php echo "<title>".$title."</title>"?>
</head>
<body>
<header class = "header-container">
            <img id = "logo" src = "/media/nasaLogo.jpg">
            <div class = "nav-1">
                <ul class = "nav-bar-1">
                    <li><a href="">Missions</a></li>
                    <li><a href="">Galleries</a></li>
                    <li><a href="">NASA TV</a></li>
                    <li><a href="">Follow NASA</a></li>
                    <li><a href="">Downloads</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">NASA Audiences</a></li>
                    <input id="search-input" type = "Search" placeholder = "Search.." onkeyup="showSugg(this.value)">
                </ul>
                <div id="suggestions">
                </div>
                
            </div>

            <div class = "nav-2">
                <ul class = "nav-bar-2">
                    <li><a href="">International Space Station</a></li>
                    <li><a href="">Journey to Mars</a></li>
                    <li><a href="">Earth</a></li>
                    <li><a href="">Technology</a></li>
                    <li><a href="">Aeronautics</a></li>
                    <li><a href="">Solar System and Beyond</a></li>
                    <li><a href="">Education</a></li>
                    <li><a href="">History</a></li>
                    <li><a href="">Benefits to You</a></li>
                </ul>
            </div>
        </header>

        <main>
            <?php
                echo "<div class='detailed_news'>
                <img id = 'detailed_news_img'src = '".$src."'>
                <h2 id = 'detailed_news_title'>".$title."</h2>
                <p id = 'detailed_news_prg'>".$content."</p>
                </div>"
            ?>
        </main>
        <script  type="text/javascript" src = "ajaxPart.js"></script>
</body>
</html>