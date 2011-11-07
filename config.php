<?php 
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

error_reporting(1);

require_once	(dirname(__FILE__).'/functions.php')		;
require_once 	'/usr/share/php/AWSSDKforPHP/sdk.class.php'	;

/*
*	REQUIRED PARAMETERS
*/
define			('__WIKI_USER__'			,'gabidobocan'									); 	//User must be autoconfirmed,confirmed or admin
define			('__WIKI_PASS__'			,'scorpion'										);
define			('__SDB_ENDPOINT__'			,'sdb.eu-west-1.amazonaws.com'					);
define			('__SDB_DOMAIN__'			,'com.appscend.apps.wikiporter.contributors'	);
define			('__SDB_LEADER_DOMAIN__'	,'com.appscend.apps.wikiporter.leaderboard'		);
define			('__COOKIEFILE_PATH__'		,'/var/www/webapps/xml_files/wikiporter/'		);
define			('__COOKIEFILE_NAME__'		,'cookies.txt'									);	//File should be writable

/*
*	OPTIONAL PARAMETERS (YOU CAN USE THE DEFAULT VALUES)
*/
define			('__DEBUG_MODE__'			,TRUE											);
define			('__RADIUS__'				,1												);
define			('__MAX_GEONAMES_ITEMS__'	,500											);
define			('__WIKIMEDIA_ENDPOINT__'	,'http://en.wikipedia.org/w/api.php'			);
define			('__WIKIMEDIA_PH_ENDPOINT__','http://en.wikipedia.org/w/api.php'			);	//API endpoint for photos. Switch to wikimedia commons?
define			('__WIKI_USERAGENT__'		,'Appscend Wikiporter (+http://appscend.com/)'	);
define			('__PHOTO_PREFIX__'			,'Wikiporter'									);
define			('__MAX_AUX_POSTS__'		,10												);
define			('__COLOR1__'				,'cedff2'										);
define			('__COLOR2__'				,'d82e2f'										);

?>