<?php
include("mysql.php");
$sqlquery = $conn->query("SELECT *
FROM media
ORDER BY id DESC
LIMIT 8");
$dataArray = array();
$i = 0;
while($row = $sqlquery->fetch_assoc()){
    $dataArray[$i] = $row;
    $i++;
}
$landscapeImages = array();
$titles = array();
$contents = array();
for ($j = 7; $j > 4; $j--)
{
    if ($dataArray[$j]["image"] != "")
    {$imageData = base64_encode(file_get_contents($dataArray[$j]["image"]));
    $src = 'data: '.mime_content_type($dataArray[$j]["image"]).';base64,'.$imageData;
    $landscapeImages[$j]= $src;}
    else
    {
        $landscapeImages[$j]= "";
    }
    $titles[$j] =  $dataArray[$j]["title"];
    $contents[$j]=  $dataArray[$j]["content"];
} 
$jsonLi = json_encode($landscapeImages);
$jsonTitles = json_encode($titles);
$jsonContents = json_encode($contents);
?>