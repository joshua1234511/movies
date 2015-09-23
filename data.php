<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     $ip=$_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
     $ip=$_SERVER['REMOTE_ADDR'];
}
$ip="216.58.220.36";
$data = geoCheckIP($ip);
function geoCheckIP($ip)
    {
               if(!filter_var($ip, FILTER_VALIDATE_IP))
               {
                       throw new InvalidArgumentException("IP is not valid");
               }

               $response=@file_get_contents('http://www.netip.de/search?query='.$ip);
               if (empty($response))
               {
                       throw new InvalidArgumentException("Error contacting Geo-IP-Server");
               }

               $patterns=array();
               $patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
               $patterns["country"] = '#Country: (.*?)&nbsp;#i';
               $patterns["state"] = '#State/Region: (.*?)<br#i';
               $patterns["town"] = '#City: (.*?)<br#i';

               $ipInfo=array();

               foreach ($patterns as $key => $pattern)
               {
                       $ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
               }

               return $ipInfo;
    }
$file = 'data.txt';
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
?>