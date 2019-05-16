<?php
error_reporting(0);
$cookies = 'timezone=330; __cfduid=d86ae39180667509df263b7367b890a2e1558013753; I2KBRCK=1; MAID=0SdxT1Qmlguh6b+Yq+nUfw==; _ga=GA1.2.1319550619.1558013755; _gid=GA1.2.1723818911.1558013755; _fbp=fb.1.1558013754839.685214944; __gads=ID=7000918d914124db:T=1558013757:S=ALNI_MYVYyVL7pLdv068Wj4Bf9FEyf__sw; _hjIncludedInSample=1; SERVER=WZ6myaEXBLH/rddrm5w5NA==; MACHINE_LAST_SEEN=2019-05-16T08%3A01%3A32.579-07%3A00; JSESSIONID=aaaxGSuejDy-dd_wsiUQw; STYXKEY-fragment=submission-guidelines; cookiePolicy=accept';
$url = 'https://journals.sagepub.com/home/VRT';
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_COOKIE, $cookies);
 
$html = curl_exec($curl);

$dom = new DOMDocument();

libxml_use_internal_errors();
$dom->loadHTML($html);
libxml_clear_errors();

$dom_xpath = new DOMXPath($dom);

$dom_div = $dom_xpath->query('//a[@data-item-name="view-submit-paper"]');




if ($dom_div->length > 0) {
	foreach ($dom_div as $value) {

		if (isset($value->nodeValue) && $value->nodeValue !== '') {
			echo "\n";
			print_r($value->getAttribute("href"));
			echo "\n";
			exit;
		}
		
	}
	
}