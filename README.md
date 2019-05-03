# Factoid Page

This is the web source for the webpage under [facts.netrve.net](https://facts.netrve.net/)
The purpose of the webpage is to display all collected factoids from a bot running on the Skyrimmods Discord.

## Overview:
- Page is opened which calls an AJAX function to the server
- Database 'Factoids.db' is downloaded through SFTP from a remote location
- Server generates the HTML table through PHP
	- Caches the result using Simple Cache
	- If cache already exists it will be used instead
- The HTML table is placed into the text content
- jQuery Tablesorter and Autolinker process the table
	- Search, Paging, and Table Theming is done through Tablesorter
	- Autolinker converts the text links to actual links

## Dependencies:
- [jQuery](https://jquery.com/): 3.4.1 or higher
- [jQuery Tablesorter](https://github.com/Mottie/tablesorter): 2.31.1 or higher
- [Autolinker](https://github.com/gregjacobs/Autolinker.js): 3.0.5 or higher
- [PHP](https://www.php.net/): 7 or higher
- [phpseclib/phpseclib](https://github.com/phpseclib/phpseclib): 2.0 or higher
- [jaredchu/simple-cache](https://github.com/jaredchu/Simple-Cache): 1.1 or higher

