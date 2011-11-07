<?php 
/*
Copyright (c) 2011 Andrei Ion Marinescu, Gabriel Dobocan (andrei@appscend.com, gabi@appscend.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
echo '<?xml version="1.0" encoding="UTF-8"?>';
require(dirname(__FILE__).'/config.php'); ?>
<par> 
<cfg> 
<title>Article</title> 
<rtitle>yes</rtitle>
<show>url</show> 
<ish>300</ish> 
<isw>300</isw> 
<avi>article</avi> 
<tlv>yes</tlv>
<vt>w</vt>
<nbtt><?=__COLOR1__?></nbtt> 
</cfg>		
<bs>
	<b>
		<t>send Wikipedia a photo</t>
		<p>t</p>
		<a>p:a:d:</a>
		<pr><![CDATA[wikiporter/sendForm.xml.php::2::<?=$_REQUEST['data']?>]]></pr>
		<br>yes</br>
		<tc><?=__COLOR2__?></tc>
	</b>

</par>	