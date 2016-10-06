<?php 
	if($_GET["day"]){
		$day=$_GET["day"];
		$curl = curl_init('https://apod.nasa.gov/apod/ap'.$day.'.html');
	}else{
		$curl = curl_init('https://apod.nasa.gov/apod/astropix.html');
	}

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	$dom = new DomDocument();
	@$dom->loadHTML($result);

	$img = $dom->getElementsByTagName('img')->item(0);
	$path="https://apod.nasa.gov/apod/".$img->getAttribute('src');

	if($path!=''){
		header("Location: ".$path);
	}
?>
