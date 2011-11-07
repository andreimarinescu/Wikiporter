<?php
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

echo '<?xml version="1.0" encoding="UTF-8"?>';
require(dirname(__FILE__).'/config.php');
$sdb = new AmazonSDB();
$sdb->set_region('sdb.eu-west-1.amazonaws.com');	

$sql		= 'SELECT * FROM `com.appscend.apps.wikiporter.leaderboard` WHERE `numPosts` is not null AND `name` is not null ORDER BY `numPosts` DESC';

$response 	= $sdb->select($sql, array('NextToken' => $next_token));

$rows		= array(); 
foreach ($response->body->SelectResult->Item as $item)
	{
	$row = array();
	$row['uniqueKey'] = (string)$item->Name;
	foreach ($item->Attribute as $att)
		$row[(string)$att->Name] = (string)$att->Value;
	$rows[] =$row;
	}
?>
<par> 
<cfg> 
<title><![CDATA[Leaderboard]]></title> 
<isw>30</isw> 
<ish>30</ish> 
<nl>1</nl> 
<dl>1</dl> 
<nc><?=__COLOR2__?>_</nc>
<ns>14</ns>
<ls>p</ls> 
<avi>leaderboard</avi> 
<vt>l</vt> 
<cp>10</cp>
<bc><?=__COLOR1__?></bc>
<csc><?=__COLOR2__?></csc>
</cfg>

<s> 
<es>
<?php foreach ($rows as $key=>$row): ?>
<e>
<bdg><?=intval($key)+1?></bdg>
<bdgc>d82e2f</bdgc>
<bdgsc>ffffff</bdgsc>
<bdgs>16</bdgs>
<n><?=$row['name']?></n>
<d><?=$row['numPosts']?> photos</d>
</e>
<?php endforeach; ?>
</es>
</s>
</par>