<?php 
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
echo '<?xml version="1.0" encoding="UTF-8"?>'; 
$_REQUEST['lat']	=	44.437367;
$_REQUEST['long']	=	26.082048;

require(dirname(__FILE__).'/config.php');
$titles			= '';
$articles		= array();
$poi 			= array();
$geonamesUrl	= 'http://api.geonames.org/findNearbyWikipediaJSON'.
							'?username=appscend'.
							'&lat='.$_REQUEST['lat'].
							'&lng='.$_REQUEST['long'].
							'&radius='.__RADIUS__.
							'&maxRows='.__MAX_GEONAMES_ITEMS__;

$places 		= json_decode(file_get_contents($geonamesUrl));
$queryString 	= 'format=json&action=query&prop=images&redirects&imlimit=max&titles=';

foreach($places->geonames as $place):
	$poi[$place->title]	=	$place;
	$titles				.=	substr(urldecode($place->wikipediaUrl),22).'|';
endforeach;
unset($places);

$queryString	= $queryString.(substr($titles,0,-1));
$wikiApiQuery 	= json_decode(wikiRequest($queryString,6));

foreach($wikiApiQuery->query->pages as $page) 
	if(!isset($page->images)) 
		$articles[]	= (string)$page->title;
?>

<par> 
	<cfg> 
		<title><![CDATA[Wikiporter]]></title> 
		<fit>no</fit> 
		<isw>30</isw> 
		<ish>30</ish> 
		<ul>yes</ul>
		<avi>map</avi> 
		<vt>m</vt>
		<tlv>yes</tlv>
		<nbv>no</nbv>
		<nbt><?=__COLOR1__?></nbt>
	</cfg>
	<bs>
		<b>
			<p>t</p>
			<t>Leaderboard</t>
			<a>m:</a>
			<pr>wikiporter/leaders.xml.php</pr>
			<br>yes</br>
			<tc><?=__COLOR2__?></tc>
		</b>
		<b>
			<p>t</p>
			<t>Settings</t>
			<a>m:</a>
			<pr>wikiporter/settings.xml.php</pr>
			<br>yes</br>
			<tc><?=__COLOR2__?></tc>
		</b>		
	</bs>
	<es> 
		<?php foreach($articles as $article): ?>
			<e> 
				<n><![CDATA[<?=$poi[$article]->title?>]]></n> 
				<l><?=substr($poi[$article]->lat,0,7)?> <?=substr($poi[$article]->lng,0,7)?></l> 
				<url>http://<![CDATA[<?=$poi[$article]->wikipediaUrl?>]]></url>
				<a>p:a:d:</a>
				<pr><![CDATA[wikiporter/article.xml.php::2::<?=$article?>]]></pr>
			</e>	
		<?php unset($poi[$article]); endforeach; ?>
		<?php $i=0; foreach($poi as $point): ?>
			<e> 
				<n><![CDATA[<?=$point->title?>]]></n> 
				<l><?=substr($point->lat,0,7)?> <?=substr($point->lng,0,7)?></l> 
				<url>http://<![CDATA[<?=$point->wikipediaUrl?>]]></url>
				<pin>http://interface.appcend.com/resources/images/standard/pins/pinBlue.png</pin>
				<a>p:a:d:</a>
				<pr><![CDATA[wikiporter/article.xml.php::2::<?=$point->title?>]]></pr>
			</e>	
		<?php $i++; if($i>=__MAX_AUX_POSTS__) break; endforeach; ?>		
		<?php if(__DEBUG_MODE__): ?>
			<e> 
				<n><![CDATA[Wikipedia:Sandbox]]></n> 
				<l><?=substr($_REQUEST['lat'],0,7)?> <?=substr($_REQUEST['long'],0,7)?></l> 
				<url>http://<![CDATA[http://en.wikipedia.org/wiki/Wikipedia:Sandbox]]></url>
				<pin>http://interface.appcend.com/resources/images/standard/pins/pinGreen.png</pin>
				<a>p:a:d:</a>
				<pr><![CDATA[wikiporter/article.xml.php::2::Wikipedia:Sandbox]]></pr>
			</e>	
		<?php endif; ?>
	</es>	
</par>