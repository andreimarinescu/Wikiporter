<?php
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


function wikiRequest($string,$fieldNum,$cookieFile=__COOKIEFILE_NAME__)
	{
	$url 		=	__WIKIMEDIA_ENDPOINT__;
	$ch 		=	curl_init();
	curl_setopt($ch,	CURLOPT_USERAGENT, 		'User-Agent: '.__WIKI_USERAGENT__	);
	curl_setopt($ch,	CURLOPT_URL,			$url								);
	curl_setopt($ch,	CURLOPT_POST,			$fieldNum							);
	curl_setopt($ch,	CURLOPT_RETURNTRANSFER,	1									); 
	curl_setopt($ch,	CURLOPT_POSTFIELDS,		$string								);
	curl_setopt($ch,	CURLOPT_COOKIEJAR, 		__COOKIEFILE_PATH__.$cookieFile		);
	curl_setopt($ch,	CURLOPT_COOKIEFILE, 	__COOKIEFILE_PATH__.$cookieFile		);	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
	}

function wikiPOSTRequest($posts,$cookieFile='cookies.txt')
	{
	$url 		= 	__WIKIMEDIA_PH_ENDPOINT__;
	$ch 		=	curl_init();
	curl_setopt($ch,	CURLOPT_USERAGENT, 		'User-Agent: '.__WIKI_USERAGENT__	);
	curl_setopt($ch,	CURLOPT_URL,			$url								);	
	curl_setopt($ch,	CURLOPT_POST,			1									);
	curl_setopt($ch,	CURLOPT_MAXREDIRS,		10									);
	curl_setopt($ch, 	CURLOPT_HTTPHEADER, 	array('Expect:')					);
	curl_setopt($ch, 	CURLOPT_RETURNTRANSFER,	1									); 
	curl_setopt($ch,	CURLOPT_POSTFIELDS,		$posts								);
	curl_setopt($ch, 	CURLOPT_COOKIEJAR,		__COOKIEFILE_PATH__.$cookieFile		);
	curl_setopt($ch, 	CURLOPT_COOKIEFILE,		__COOKIEFILE_PATH__.$cookieFile		);	
	$postResult	= curl_exec($ch);
	curl_close($ch);
	return $postResult;
	}
?>