<?php
// the id for the Yelp app
$term = "Skream+Check-In";
if (isset($_GET["term"])) {
    // Get the id from the ajax call
    $term = $_GET["term"];
}
// add the id to the url
$apiUrl = "http://ax.phobos.apple.com.edgesuite.net/WebObjects/MZStoreServices.woa/wa/wsSearch?entity=song&term=".$term."&limit=6";

// setup the cURL call
$c = curl_init();
curl_setopt($c, CURLOPT_URL, $apiUrl);
curl_setopt($c, CURLOPT_HEADER, false);

// make the call
$content = curl_exec($c);
curl_close($c);
?>
