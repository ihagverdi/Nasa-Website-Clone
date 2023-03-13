<?php
include("mysql.php");
if (isset($_POST["apply"])){
    $newsFile = $_FILES["fileName"]["tmp_name"];}
    $news_array = file_get_contents($newsFile);
    $json = json_decode($news_array); 
    $json = $json->news;
    $stmt1 = $conn->prepare(
        "INSERT INTO media(title,content,image) VALUES(?,?,?)"
    );
    $stmt1->bind_param("sss",$title,$content,$image);
    
    // print_r($result);
    foreach ($json as $news)
    {
        $title = $news->title;
        $content = $news->content;
        $image = $news->imgurl;
        $stmt1->execute();
    }
    header("Location: nasa.php");

    ?>


