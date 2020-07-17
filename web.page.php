<?php
include 'core/preload.php';
?>
<script type="text/javascript" src="/core/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/style.css">
<script src="/core/main.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/scroll.css">
<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/notify/style.css">
<script src="/notify/jquery.notification.js"></script>

<div class="blocks-stat">
	<div class="stats">
		<div class="caption_div red1">
			<div class="caption">phpmyadmin</div>
		</div>

		<div class="value_div red2">
			<div class="value">
				<a onclick="phpMyAdmin()">
					<img class="icon" src="/assets/sql-icon.png">
				</a>
			</div>
		</div>
	</div>

	<br>

	<div class="stats">
		<div class="caption_div red1">
			<div class="caption">phpinfo()</div>
		</div>

		<div class="value_div red2">
			<div class="value">
				<a onclick="phpInfo()">
					<img class="icon" src="/assets/php-icon.png">
				</a>
			</div>
		</div>
	</div>
</div>

<script>
function phpMyAdmin(){
	window.open("http://" + location.hostname + "/phpmyadmin", "_blank");
}

function phpInfo(){
	window.open("http://" + location.hostname + "/phpinfo.php", "_blank");
}
</script>