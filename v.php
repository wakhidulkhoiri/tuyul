<?php error_reporting(0); class curl { 
var $ch, $agent, $error, $info, $cookiefile, $savecookie;
function curl() {
$this->ch = curl_init();
curl_setopt ($this->ch, 
CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US)
AppleWebKit/530.1 (KHTML, like Gecko) Chrome/2.0.164.0 Safari/530.1'); 		
curl_setopt ($this->ch, CURLOPT_HEADER, 1); 		
curl_setopt ($this->ch, CURLOPT_RETURNTRANSFER, 1); 		
curl_setopt ($this->ch, CURLOPT_SSL_VERIFYPEER, 0); 		
curl_setopt ($this->ch, CURLOPT_SSL_VERIFYHOST, 0); 		
curl_setopt ($this->ch, CURLOPT_FOLLOWLOCATION,true); 		
curl_setopt ($this->ch, CURLOPT_TIMEOUT, 30); 		
curl_setopt ($this->ch, CURLOPT_CONNECTTIMEOUT,30); 	} 	
function header($header) { 		
curl_setopt ($this->ch, CURLOPT_HTTPHEADER, $header); 	} 	
function http_code() { 		
return curl_getinfo($this->ch, CURLINFO_HTTP_CODE); 	} 	
function error() { 		
return curl_error($this->ch); 	} 	
function ssl($veryfyPeer, $verifyHost){ 		
curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, $veryfyPeer); 		
curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, $verifyHost); 	} 	
function cookies($cookie_file_path) { 		
$this->cookiefile = $cookie_file_path;; 		
$fp = fopen($this->cookiefile,'wb');fclose($fp);
curl_setopt ($this->ch, CURLOPT_COOKIEJAR, $this->cookiefile);
curl_setopt ($this->ch, CURLOPT_COOKIEFILE, $this->cookiefile); 	} 
function proxy($sock) {
curl_setopt ($this->ch, CURLOPT_HTTPPROXYTUNNEL, true);
curl_setopt ($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
curl_setopt ($this->ch, CURLOPT_PROXY, $sock); 	}
function post($url, $data) {
curl_setopt($this->ch, CURLOPT_POST, 1);
curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
return $this->getPage($url); 	}
function data($url, $data, $hasHeader=true, $hasBody=true) {
curl_setopt ($this->ch, CURLOPT_POST, 1);
curl_setopt ($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
return $this->getPage($url, $hasHeader, $hasBody); 	}
function get($url, $hasHeader=true, $hasBody=true) {
curl_setopt ($this->ch, CURLOPT_POST, 0);
return $this->getPage($url, $hasHeader, $hasBody); 	}
function getPage($url, $hasHeader=true, $hasBody=true) {
curl_setopt($this->ch, CURLOPT_HEADER, $hasHeader ? 1 : 0);
curl_setopt($this->ch, CURLOPT_NOBODY, $hasBody ? 0 : 1); 
curl_setopt ($this->ch, CURLOPT_URL, $url);
$data = curl_exec ($this->ch);
$this->error = curl_error ($this->ch);
$this->info = curl_getinfo ($this->ch);
return $data; 	} } function fetch_value($str,$find_start,$find_end) { 	
$start = @strpos($str,$find_start); 	
if ($start === false) { 		
return ""; 	} 	
$length = strlen($find_start); 	
$end = strpos(substr($str,$start +$length),$find_end); 	
return trim(substr($str,$start +$length,$end)); } 
function string($length = 15) { 	
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 	
$charactersLength = strlen($characters); 	
$randomString = ''; 	
for ($i = 0; $i < $length; $i++) { 		
$randomString .= $characters[rand(0, $charactersLength - 1)]; 	} 	
return $randomString; } function angka($length = 15) { 	$characters = '0123456789'; 	
$charactersLength = strlen($characters); 	
$randomString = ''; 	
for ($i = 0; $i < $length; $i++) { 		
$randomString .= $characters[rand(0, $charactersLength - 1)]; 	} 	
return $randomString; } function coin($token) { 	
$curl = new curl(); 	
$curl->cookies('cookies/'.md5($_SERVER['REMOTE_ADDR']).'.txt'); 	
$curl->ssl(0, 2); 	
$page = $curl->post('http://www.ksoiigk.com/index/index/lists?uuid="+uuid+"&token="+token+group_param+"',' { 
"locale":"in_ID",
"task_extra_info":"",
"task_name":"vip_watch_video_ball_01",
"timezone":"GMT+07:00" }'); 	sleep(1); 
$coin = fetch_value($page, '"today_revenue_point": ',',');
if (strpos($page, 'current_point')) {
echo "SUCCESS | ".$coin."\n";
flush();
ob_flush(); 	} 
elseif (strpos($page, 'token invalid')) {
echo "TOKEN INVALID"; 		
echo "\n"; 		
flush(); 		
ob_flush(); 	} 
elseif(strpos($page, 'complete full')) { 		
echo "COMPLETE FULL"; 		
echo "\n"; 		
flush(); 		
ob_flush(); 	} 
else { 		echo "FAILED"; 		
echo "\n"; 		
flush(); 		
ob_flush(); 	} } echo
 " ==============> Selamat Nuyul <==============  \n"; 
echo "Lebokne Token Bray: "; $token = trim(fgets(STDIN)); if ($token == "") { 	
die ("Token Ra Oleh Kosong Goblok!!!!\n"); } else { 	
while (true) { 		
coin($token); 	} } ?>
