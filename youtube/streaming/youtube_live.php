<?php
ob_start();
error_reporting(0);
set_time_limit(0);
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "<meta charset=\"utf-8\" />\n";
echo "<title>YouTube Streaming</title>\n";
echo "<link rel=\"shortcut icon\" href=\"\"/>\n";
echo "<link rel=\"shortcut icon\" href=\"\" type=\"image/x-icon\" />\n";
echo "<link rel=\"icon\" href=\"\"/>\n";
echo "<meta http-equiv=\"cache-control\" content=\"no-store\">\n";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\n";
echo "<meta name=\"description\" content=\"YouTube Streaming\" />\n";
echo "<meta name=\"author\" content=\"MojaTV\" />\n";
echo "<meta property=\"og:site_name\" content=\"YouTube Streaming\">\n";
echo "<meta property=\"og:locale\" content=\"en_US\">\n";
echo "<meta name=\"msapplication-TileColor\" content=\"#FFF\">\n";
echo "<meta name=\"theme-color\" content=\"#FFF\">\n";
echo "<meta name=\"msapplication-navbutton-color\" content=\"#FFF\">\n";
echo "<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\n";
echo "<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#FFF\">\n";
echo "<style type=\"text/css\">\n";
echo "body,td,th {\n";
echo "	color: #FFF;\n";
echo "}\n";
echo "body {\n";
echo "	background-color: #000000;\n";
echo "}\n";
echo "a:link {\n";
echo "	color: #FFF;\n";
echo "}\n";
echo "a:visited {\n";
echo "	color: #FFF;\n";
echo "}\n";
echo "a:hover {\n";
echo "	color: #FFF;\n";
echo "}\n";
echo "a:active {\n";
echo "	color: #FFF;\n";
echo "}\n";
echo "</style>\n";
echo "</head>\n";
echo "<body>\n";
ob_end_flush();
?>
<?php
ob_start();
error_reporting(0);
set_time_limit(0);
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
  $protocol = 'http://';
} else {
  $protocol = 'https://';
}
$ROOT_URL = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
$YOUTUBE_LIVE = $ROOT_URL . "youtube_live.php?id=" . "30qZjexZ8bQ";
if(!isset($_GET['id']))
die(
"<b>
<center>
<font color=white><h2>YouTube Streaming</h2></b>
</center>
<center>
<font color=red><b>work on Xtream UI</b>
</center>
<br/>
<b>
<center>
<font color=white>Platform: Smart TV,VLC Player,Kodi, XtreamCodes UI, ETC</b>
</center>
</font>
<br/>
<body style='background-color:black'>
<b>
<center>
<font color=white>?id={LIVE STREAM VIDEO ID}</b>
</center>
</font>
<br/>
<b>
<center>
<font color=white>For example:<br>
<font color=white>Youtube Live: <font color=red> $YOUTUBE_LIVE<br>
</b>
</center>
</font>
<br/>
<b>
<center></center></font><br/>
");
{
?>
<?php
$chid = $_GET["id"];
date_default_timezone_set("Europe/Zürich");
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
function get_data($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36");
    curl_setopt($ch, CURLOPT_REFERER, "https://www.youtube.com/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$string = get_data('https://www.youtube.com/watch?v=' . $chid);
// AUTO MODE
$hlsManifestUrl = '/,\\\\"hlsManifestUrl\\\\":\\\\"(.*?)\\\\"/m';
preg_match_all($hlsManifestUrl, $string, $matches, PREG_PATTERN_ORDER, 0);
// AUTO MODE

// MANUAL MODE
//preg_match_all($hlsManifestUrl, $string, $matches, PREG_SET_ORDER, 0);
//preg_match_all('/,\\\\"hlsManifestUrl\\\\":\\\\"(.*?)\\\\"/m',$string,$matches, PREG_PATTERN_ORDER);
// PMANUAL MODE

$var1=$matches[1][0];
//$var1 = substr($var1, 8);
$var1=str_replace("\/", "/", $var1);

$man = get_data($var1);
/*
 QUALITY SETTINGS
 96 = 1920x1080 
$regex = '/(https:\/.*\/96\/.*index.m3u8)/U';

 95 = 1280x720
$regex = '/(https:\/.*\/95\/.*index.m3u8)/U';

 94 = 854x480
$regex = '/(https:\/.*\/94\/.*index.m3u8)/U';

 94 = 854x480
$regex = '/(https:\/.*\/94\/.*index.m3u8)/U';

 93 = 640x360
$regex = '/(https:\/.*\/93\/.*index.m3u8)/U';
*/
preg_match_all('/(https:\/.*\/95\/.*index.m3u8)/U',$man,$matches, PREG_PATTERN_ORDER);
$stream_link=$matches[1][0];
header("Content-type: application/vnd.apple.mpegurl");
header("Location: $stream_link");
}
ob_end_flush();
?>