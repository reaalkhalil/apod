<?php 

//$curl = curl_init('http://apod.nasa.gov/apod/astropix.html');

if($_GET["day"]){
$day=$_GET["day"];
$curl = curl_init('http://apod.nasa.gov/apod/ap'.$day.'.html');
}else{
$curl = curl_init('http://apod.nasa.gov/apod/astropix.html');
}

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$dom = new DomDocument();
@$dom->loadHTML($result);

foreach ($dom->getElementsByTagName('img') as $img) {
	$path="http://apod.nasa.gov/apod/".$img->getAttribute('src');
}

if($path!=''){
	header("Location: ".$path);
	//header("Location: http://apod.nasa.gov/apod/".$img->getAttribute('src'));
	//fileExists($path);
}else{

if($day!=''){header("Location: bgvideo.php?day=".$day);}else{
header("Location: bgvideo.php");
}

}
?>