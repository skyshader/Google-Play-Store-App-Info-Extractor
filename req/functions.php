<?php

# functions

// CURL an URL and return a dom object
// recieves url and timeout as parameters
function getNewURL($url, $timeout){
	// set temporary directory
    $cookie = tempnam ("/tmp", "CURLCOOKIE");
	// initiate CURL
    $ch = curl_init();
	
	// CURL options
    curl_setopt( $ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"] );
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
    curl_setopt( $ch, CURLOPT_NOPROGRESS, false );
    curl_setopt( $ch, CURLOPT_FRESH_CONNECT, true );
	
	// execute with configured options
    $content = curl_exec( $ch );
	// close the connection
    curl_close ( $ch );

	// create simple_html_dom instance and return dom object
    $dom = new simple_html_dom();
    return $dom->load($content);
}


// Collect all the URLs for listed apps on the $page in the argument
function collectURLs($page){
	$collectedURLs = array();
	foreach($page->find("a.title") as $a)
    	array_push($collectedURLs, "https://play.google.com".$a->href);
		
	return $collectedURLs;
}


function storeToCSV($dataToStore){
	$csv = fopen("appDetails.csv", "a");
	foreach ($dataToStore as $fields) {
		fputcsv($csv, $fields, ";");
	}
	fclose($csv);
}