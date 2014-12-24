Google-Play-Store-App-Info-Extractor
====================================

To extract apps information from Google Play Store. The script works for all the *Top Paid*, *Top Free* section in app categories. Also you can extract apps information from the *Top Charts* section by using its *Top Paid*, *Top Free* or *Top Grossing* URLs.

To specify a particular URL, open `apps.php` file. Go to `line 25` and edit the `$url` variable as per your need.
Some example URLs are:
- "https://play.google.com/store/apps/collection/topselling_free"
- "https://play.google.com/store/apps/category/GAME_ACTION/collection/topselling_paid"
- "https://play.google.com/store/apps/category/HEALTH_AND_FITNESS/collection/topselling_paid"

To use the extractor run the `apps.php` file.

The URL needs 2 query strings to work.
- s : the count from which you want to start
- n : the total number of apps from the start point
