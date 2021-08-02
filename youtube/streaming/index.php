<?php
error_reporting(0);
date_default_timezone_set("Europe/Zürich");
?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>YouTube Live Streaming</title>
<link rel="shortcut icon" href=""/>
<link rel="icon" href=""/>
</head>
<body>
<div class="section no-pad-bot" id="index-banner">
<div class="container">
<br>
<br>
<h1 class="header center teal-text">YouTube Live Streaming</h1>
<div class="row center">
<h5 class="header col s12 light">YouTube Live Stream Downloader</h5>
<h5 class="header col s12 light"><b>EXAMPLE: 30qZjexZ8bQ<b></h5>
</div>
<br>
<br>
</div>

<div class="container">
<div class="row">
<form action="youtube_live.php" method="get" autocomplete="off">
<div class="row">
<div class="input-field col s12 l6 offset-l3">
<input spellcheck="false" autocomplete="on" autocorrect="on" onchange="validateInput();" onkeyup="validateInput();" onpaste="validateInput();" oninput="validateInput();" id="id" name="id" type="text" class="validate">
<label for="youtube_live_streaming">Enter YouTube Live Stream ID</label>
</div>
</div>
<br>
<br>
<div class="row center">
<button type="submit" id="submit-button" class="btn waves-effect waves-light teal lighten-1 ">DOWNLOAD Live Stream<i class="mdi-content-send right">
</i>
</button>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

$("#submit-button").hide();
document.getElementById("sxtbox").reset();
$('#sxtbox input').attr('style', '-webkit-box-shadow: inset 0 0 0 1000px #0F0 !important');
});

function validateInput()
{ 

youtube_stream_generator = $("#youtube_live_streaming").val();
var w = false;

var YouTube_ID_Regex = /([^#\&\?]*)./
w = YouTube_ID_Regex.test(youtube_stream_generator);

if( w )
{
$("#submit-button").fadeIn(0);
}
else
{
$("#submit-button").fadeOut();
}
}

$('html').bind('keypress', function(e)
{
if(e.keyCode == 13)
{
return false;
}
});
</script>
<h4 class="header center teal-text">
&copy; <?php echo date("Y") ?>  <strong>XtreamCodes</strong> <a href="http://youtube.com" target="_blank"><strong>YouTube Live</strong></a></h4>
</div>
</body>
</html>