<?php
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
echo '<?xml version="1.0" encoding="UTF-8"?>';
require(dirname(__FILE__).'/config.php');
?>
<par>
<cfg>
	<vt>fr</vt>
	<title>Add a new photo to Wikipedia!</title>
	<gid>newphoto</gid>
	<bc><?=__COLOR1__?></bc>
</cfg>
<es>
	<e>
		<key>zone1</key>
		<type>g</type>
		<title>Details</title>
	</e>
	<e>
		<key>photoText</key>
		<title>Photo text</title>
		<type>ta</type>
		<res>yes</res>
	</e>
	<e>
		<key>photo</key>
		<title>Image</title>
		<type>i</type>
		<irw>1500</irw>
		<irh>1500</irh>
		<res>yes</res>
		<req>yes</req>
		<reqt>Please upload a photo</reqt>
	</e>	
	<e>
		<type>g</type>
	</e>
	<e>
		<key>act</key>
		<title>GO!</title>
		<type>b</type>
		<a>p:a:</a>
		<pr>wikiporter/send.php::</pr>
	</e>
</es>
<las>
	<la>
		<a>s:k:gid:</a>
		<pr><?=$_REQUEST['data']?>::article::newphoto</pr>
	</la>
</las>
</par>