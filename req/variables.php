<?php

# variables needed
// URL's
$base_url = "http://play.google.com/store/apps/";
$secured_base_url = "https://play.google.com/store/apps/";

// Top Apps
$top_free = "collection/topselling_free";
$top_paid = "collection/topselling_paid";
$top_grossing = "collection/topgrossing";

// Top Games
$top_free_games = "category/GAME/collection/topselling_free";
$top_paid_games = "category/GAME/collection/topselling_paid";
$top_grossing_games = "category/GAME/collection/topgrossing";

// Categories
$categories = array(
	array("Books & Reference", "BOOKS_AND_REFERENCE"),
	array("Business", "BUSINESS"),
	array("Comics", "COMICS"),
	array("Communication", "COMMUNICATION"),
	array("Education", "EDUCATION"),
	array("Entertainment", "ENTERTAINMENT"),
	array("Finance", "FINANCE"),
	array("Health & Fitness", "HEALTH_AND_FITNESS"),
	array("Libraries & Demos", "LIBRARIES_AND_DEMO"),
	array("Lifestyle", "LIFESTYLE"),
	array("Live Wallpaper", "APP_WALLPAPER"),
	array("Media & Video", "MDEIA_AND_VIDEO"),
	array("Medical", "MEDICAL"),
	array("Music & Audio", "MUSIC_AND_AUDIO"),
	array("News & Magazines", "NEWS_AND_MAGAZINES"),
	array("Personalisation", "PERSONALIZATION"),
	array("Photography", "PHOTOGRAPHY"),
	array("Productivity", "PRODUCTIVITY"),
	array("Shopping", "SHOPPING"),
	array("Social", "SOCIAL"),
	array("Sports", "SPORTS"),
	array("Tools", "TOOLS"),
	array("Transport", "TRANSPORTATION"),
	array("Travel & Local", "TRAVEL_AND_LOCAL"),
	array("Weather", "WEATHER"),
	array("Widgets", "APP_WIDGETS")
);

// Game Categories
$game_categories = array(

);

// start and limit values for apps retrieval
$start = isset($_GET['start']) ? $_GET['start'] : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 25;

// timeout variable
$timeout = isset($_GET['timeout']) ? $_GET['timeout'] : 500;

// app details
$appDetails = array();
$count = $start; #offset for storing details