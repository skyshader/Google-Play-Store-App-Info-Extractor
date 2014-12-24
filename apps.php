<?php

# includes
include('req/simple_html_dom.php');
include('req/variables.php');
include('req/functions.php');


set_time_limit ( $timeout );


// if parameters are not set, give out information
if(!isset($_GET['s']) && !isset($_GET['n'])) {
	die("Notice : You need to pass 2 query strings in order to retrieve results.
		<br/>
		s : the starting count of the apps
		<br/>
		n : the number of apps you want to retrieve
		<br/><br/>
		Try this : " . "" . "");
}


// change the url as per your need
$url="https://play.google.com/store/apps/collection/topselling_free";

// define the url to curl
$url .= "?start=".$_GET['s']."&num=".$_GET['n'];
// reform URL
$url = str_replace( "&amp;", "&", urldecode(trim($url)) );


// get the main page to CURL
$html = getNewURL($url, 100);

// get the URLs of list of apps
$fetchURL = collectURLs($html);


// for all app URLs collected get the details
foreach($fetchURL as $newURL){

    $html = getNewURL($newURL, 100);
    $appDetail = array();

	// push the app's count in THIS APP detail array
	array_push($appDetail, $count++);

	
	// Name
    foreach($html->find("div.document-title > div") as $title)
        array_push($appDetail, trim($title->plaintext));

	// Company
    foreach($html->find("span[itemprop=name]") as $company)
        array_push($appDetail, trim($company->plaintext));

	// Category
    foreach($html->find("span[itemprop=genre]") as $category)
        array_push($appDetail, trim($category->plaintext));

	// Ratings
    foreach($html->find("div.score") as $score)
        array_push($appDetail, trim($score->plaintext));

	// Reviewd by count
    foreach($html->find("span.reviews-num") as $reviewedBy)
        array_push($appDetail, trim($reviewedBy->plaintext));

	// Five Star Count
    foreach($html->find("div.five > span.bar-number") as $fiveStar)
        array_push($appDetail, trim($fiveStar->plaintext));

	// Four Star Count
    foreach($html->find("div.four > span.bar-number") as $fourStar)
        array_push($appDetail, trim($fourStar->plaintext));

	// Three Star Count
    foreach($html->find("div.three > span.bar-number") as $threeStar)
        array_push($appDetail, trim($threeStar->plaintext));

	// Two Star Count
    foreach($html->find("div.two > span.bar-number") as $twoStar)
        array_push($appDetail, trim($twoStar->plaintext));

	// One Star Count
    foreach($html->find("div.one > span.bar-number") as $oneStar)
        array_push($appDetail, trim($oneStar->plaintext));

	// Published Date
    foreach($html->find("div[itemprop=datePublished]") as $updated)
        array_push($appDetail, trim($updated->plaintext));

	// File Size
    foreach($html->find("div[itemprop=fileSize]") as $size)
        array_push($appDetail, trim($size->plaintext));

	// Total Downloads Count
    foreach($html->find("div[itemprop=numDownloads]") as $installs)
        array_push($appDetail, trim($installs->plaintext));

	// App Version
    foreach($html->find("div[itemprop=softwareVersion]") as $version)
        array_push($appDetail, trim($version->plaintext));

	// Content Maturity Rating
    foreach($html->find("div[itemprop=contentRating]") as $contentRating)
        array_push($appDetail, trim($contentRating->plaintext));

	// copy THIS APP detail to GLOBAL appDetails array
    array_push($appDetails, $appDetail);
}

echo "<pre>";
    print_r($appDetails);
echo "</pre>";

storeToCSV($appDetails);

?>