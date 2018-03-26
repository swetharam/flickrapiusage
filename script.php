<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="sxr178830_pw7.php" method="POST" >
	Keyword: <input type="text" name="key"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>


<?php
if(isset($_POST["submit"])) {
	$key=$_POST["key"] ;
	if ($key=="") {
		echo "Key is not set";
	}
	else
	{
	echo "<br>Tags used for searching:".$key."<br>";
	require_once('flickr.php'); 
	$Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
	$data = $Flickr->search($key); 
	foreach($data['photos']['photo'] as $photo) { 
		$thump = 'http://farm' . $photo['farm'] . ".static.flickr.com/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . '_t.jpg';
			

			$full = 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_c.jpg';
		echo '<a href="'.$full.'"><img src="'.$thump.'"></a>';
		echo "<br>";
	} 
}

}

?>