<!--
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->
<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
require(dirname(__FILE__).'/config.php');
?>
<par>
<cfg>
<vt>fr</vt>
<title>Settings</title>
<gid>settings</gid>
<avi>settings</avi>
<bc><?=__COLOR1__?></bc>
</cfg>
<es>
	<e>
		<key>zone1</key>
		<type>g</type>
		<title>Leaderboard settings</title>
	</e>
	<e>
		<key>name</key>
		<title>Display name</title>
		<type>tf</type>
		<plh>Tap to enter text</plh>
	</e>

	<e>
		<type>g</type>
	</e>
	<e>
		<key>act</key>
		<title>GO!</title>
		<type>b</type>
		<a>p:a:</a>
		<pr>wikiporter/sendSettings.php::</pr>
	</e>
</es>
</par>