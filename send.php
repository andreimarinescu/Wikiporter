<?php 
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
set_time_limit(900);
require(dirname(__FILE__).'/config.php');
$result 		=	wikiRequest('format=json&action=login&lgname='.__WIKI_USER__.'&lgpassword='.__WIKI_PASS__,4);
$result			=	json_decode($result);
//print_r($result);
if($result->login->result=="NeedToken")
	{
	$result		=	wikiRequest('format=json&action=login&lgname='.__WIKI_USER__.'&lgpassword='.__WIKI_PASS__.'&lgtoken='.$result->login->token,5);
	$result		=	json_decode($result);
//	print_r($result);	
	$logintoken	=	$result->login->token;
	$result 	=	wikiRequest('format=json&action=query&prop=info&intoken=edit&titles='.$_REQUEST['article'],5);
	$result		=	json_decode($result);
//	print_r($result);	
	foreach($result->query->pages as $page) { $token=$page->edittoken;break;}
	}
	$fileName	=	__PHOTO_PREFIX__.time();
	$text 		= '== Licensing ==
{{self|cc-by-sa-3.0}}';
	$posts 		= 	array(	'format'			=> 'json',
							'action'			=> 'upload',
//							'file'				=> '@'.$_FILES['photo']['tmp_name'],
							'file'				=> '@/var/www/webapps/xml_files/wikiporter/photo.jpg',
							'filename'			=> $fileName,
							'ignorewarnings' 	=> 'TRUE',
							'comment'			=> $_REQUEST['photoText'],
							'text'				=> $text,
							'token'				=> $token
						);
				
	$postResult	=	wikiPOSTRequest($posts);
//	print_r($postResult);
	$result		=	wikiRequest('format=json&action=edit&title='.$_REQUEST['article'].'&section=new'.
								'&text='.urlencode('[[File:'.$fileName.'.jpeg]]').
//								'&text='.urlencode('[[File:Wikiporter_1320491479.jpeg]]').
								'&token='.urlencode($token).
								'&bot=true&minor=true&nocreate=true');
//	print_r($result);
$sdb 			= 	new AmazonSDB();
$sdb->set_region(__SDB_ENDPOINT__);
$response 		= 	$sdb->put_attributes(__SDB_DOMAIN__, 
						md5($_REQUEST['udid'].time()), 
						array(
						    'udid' 		=> $_REQUEST['udid'],
						    'article' 	=> $_REQUEST['article'],
						    'date'		=> date('Y-m-d H:i:s'),
						    'comment'	=> $_REQUEST['photoText']
					    )
					);
$response		=	$sdb->get_attributes(__SDB_LEADER_DOMAIN__,$_REQUEST['udid']);
$numPosts		=	intval((string)$response->body->GetAttributesResult->Attribute[0]->Value)+1;
$response		=	$sdb->put_attributes(__SDB_LEADER_DOMAIN__,
						$_REQUEST['udid'],
						array(
							'udid'		=> $_REQUEST['udid'],
							'numPosts'	=> $numPosts
							),
						true
					);
?>
<las>
	<la>
		<a>alert:</a>
		<pr>Thank you for your contribution!</pr>
	</la>
	<la>
		<a>pop</a>
	</la>	
</las>