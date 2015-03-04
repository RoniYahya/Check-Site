<?php

include "kepala.php";

echo '<div id="konten">';
if($_GET){
function SiteIsUpOrDown($url){
	if (strpos($url, "http://") === false) {
		$url = "http://" . $url;
	}
	//Validate the URL first!
	if(filter_var($url,FILTER_VALIDATE_URL)){
		$handle = curl_init(urldecode($url));
		curl_setopt($handle,CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($handle,CURLOPT_HEADER,true);
		curl_setopt($handle,CURLOPT_NOBODY,true);
		curl_setopt($handle,CURLOPT_RETURNTRANSFER,true);

		$response = curl_exec($handle);
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		$response = curl_exec($handle);
		curl_close($handle);

		if ($response) {
			return array(true, $url);
		}else {
			return array(false, $url);
		}
		
	}
		
} 

list($result, $url) = SiteIsUpOrDown($_GET['url']);

if($result)
	echo "<table align=\"center\" width=\"300px\"><td widh=\"150px\"><img src=\"gambar/up.png\" width=\"100px\" height=\"100px\"></td><tdwidh=\"150px\">$url <br/>is UP  :)</td></table>"; 
else
	echo "<table align=\"center\" width=\"300px\"><td widh=\"150px\"><img src=\"gambar/down.png\" width=\"100px\" height=\"100px\"></td><td widh=\"150px\">$url <br/>is DOWN  :)</td></table>";

}
echo '</div>';

include "kaki.php";
?>