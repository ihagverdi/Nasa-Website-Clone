<?php
include("mysql.php");
include("getData.php");
?>
<html>
    <head>
        <title>NASA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "/style/nasa_css.css"/>
    </head>
    <body>
        <?php
        ini_set('display_errors',0);
        ?>
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
                <a class= "admin-link" href = "admin.php">ADMIN</a>
            </div>
        </header>

        <main class = "main-container">
            <div class="news news-0">
                <img id = "landscape" class= "news-img-1">
                <div class = "news-text-0">
                    <h2 id = "lscp-news-header"></h2>
                    <p id = "lscp-news-paragraph"></p>
                </div>
            </div>
            <div class="news news-1" >
                <div class = "news-text-1">
                <?php if(count($dataArray) > 0){
                        echo "<h3 class = 'text-1-title'>" .$dataArray[4]['title']. "</h3>";
                        echo "<hr>";
                        echo '<p class = "text-1-paragraph">' .$dataArray[4]['content']. '</p>';}
                        ?>
                </div>
            </div>
            <div class="news news-2">
            <?php if(count($dataArray) > 0){
                $imageData = base64_encode(file_get_contents($dataArray[3]["image"]));
                
                $src = 'data: '.mime_content_type($dataArray[3]["image"]).';base64,'.$imageData;
                echo '<img class= "news-img-3" src="' .$src . '">';
                echo "<div id = 'news-box-2' class = 'news-text-2'>";
                echo  "<h3 id = 'news-2-header'>".$dataArray[3]['title']."</h3>";
                echo "<p  id = 'news-2-paragraph'>" .
                    substr($dataArray[3]['content'], 0, 50).
                    "<i id = 'readMore'>..READ MORE</i>
                    <span id = 'restContent'>" .substr($dataArray[3]['content'], 50). "</span>
                    </p>
                    </div>";
                }?>
            </div>
            <div class="news news-3">
                <?php if(count($dataArray) > 0){
                    $imageData = base64_encode(file_get_contents($dataArray[2]["image"]));
                    $src = 'data: '.mime_content_type($dataArray[2]["image"]).';base64,'.$imageData;
                    echo "<img class= 'news-img-4' src='" .$src. "'>";
                    echo "<div class = 'news-text-3'>";
                    echo "<h3>" .$dataArray[2]['title']. "</h3>";
                    echo "<p>" .$dataArray[2]['content']."</p>";
                    echo "</div>";
                } ?>
            </div>
            <div class="news news-4" >
                <video controls class= "news-img-5" src="/media/space.mp4">
            </div>
            <div class="news news-5">
            <?php if(count($dataArray) > 0){
                $imageData = base64_encode(file_get_contents($dataArray[1]["image"]));
                $src = 'data: '.mime_content_type($dataArray[1]["image"]).';base64,'.$imageData;
                echo '<img class= "news-img-6" src="' .$src. '">';
            } ?>
            </div>
            <div class="news news-6" >
            <?php if(count($dataArray) > 0){
                $imageData = base64_encode(file_get_contents($dataArray[0]["image"]));
                $src = 'data: '.mime_content_type($dataArray[0]["image"]).';base64,'.$imageData;
                echo '<img class= "news-img-7" src="' .$src. '">';
            } ?>
            </div>
        </main>
    <script>
        var jsonLi = JSON.parse('<?=$jsonLi?>');
        var jsonTitles = JSON.parse('<?=$jsonTitles?>');
        var jsonContents = JSON.parse('<?=$jsonContents?>');
        var images = jsonLi;
        var news_headers = jsonTitles;
        var news_par = jsonContents;
        var i= 5;
        var duration = 3000;
        function changeNews(){
        document.getElementById("landscape").src = images[i];
        document.getElementById("lscp-news-header").innerHTML = news_headers[i];
        document.getElementById("lscp-news-paragraph").innerHTML = news_par[i];
        if(i < 7){
            i++;
        } 
        else {
            i = 5;
        }
        setTimeout("changeNews()",duration);
        }
        window.onload = changeNews;
        //Row-2-image-2
        var news_2_paragraph = document.getElementById("news-2-paragraph");
        var news_box_2 = document.getElementById("news-box-2");
        var news_2_header = document.getElementById("news-2-header");
        var readMore = document.getElementById("readMore");
        var restContent = document.getElementById("restContent");
        news_2_paragraph.onmouseover = function() {coverNews()};
        function coverNews() {
        news_2_header.style.display= "none";
        news_box_2.style.gridRow = "1/2";
        news_box_2.style.height = "100%";
        news_box_2.style.maxHeight = "100%";
        news_2_paragraph.style.height = "100%";
        news_box_2.style.overflow = "hidden"; 
        readMore.style.display = "none";
        restContent.style.display = "inline";
        if(window.innerWidth < 1225){
            news_box_2.style.overflow = "scroll";
        }

        }

        news_2_paragraph.onmouseout = function()  {uncoverNews()}
        function uncoverNews() {
        news_2_header.style.display= "block";
        news_box_2.style.height = "auto";
        news_2_paragraph.style.height = "auto";
        news_box_2.style.overflow = "visible";
        readMore.style.display = "inline";
        restContent.style.display = "none";
        }
    </script>
    <script  type="text/javascript" src = "ajaxPart.js"></script>
    </body>
</html>