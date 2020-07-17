<?php include 'core/preload.php'; ?>
<script type="text/javascript" src="/core/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/style.css">
<script src="/core/main.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/scroll.css">
<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/notify/style.css">
<script src="/notify/jquery.notification.js"></script>

<div class="tabs">
<input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
<label for="tab-btn-1">Home</label>
<div id="content-1">

<div class="blocks-stat">
	<div class="stats">
		<div id="caption_div_temp" class="caption_div">
			<div class="caption">temperature</div>
		</div>

		<div id="value_div_temp" class="value_div">
			<div id="temp" class="value">...</div>
		</div>
	</div>

	<br>

	<div class="stats">
		<div id="caption_div_cpu" class="caption_div">
			<div class="caption">cpu load</div>
		</div>

		<div id="value_div_cpu" class="value_div">
			<div id="cpu_load" class="value">...</div>
		</div>
	</div>

	<br>

	<div class="stats">
		<div id="caption_div_freemem" class="caption_div">
			<div class="caption">free memory</div>
		</div>

		<div id="value_div_freemem" class="value_div">
			<div id="freemem" class="value">...</div>
		</div>
	</div>

	<br>

	<!--<div class="stats">
		<div id="caption_div_uptime" class="caption_div yel1">
			<div class="caption">uptime</div>
		</div>

		<div id="value_div_uptime" class="value_div yel2">
			<div id="uptime" class="value">...</div>
		</div>
	</div>-->
</div>

<div class="blocks-stat">
	<div class="stats">
		<div id="caption_div_reboot" class="caption_div pur1">
			<div class="caption">reboot system</div>
		</div>

		<div id="value_div_reboot" class="value_div pur2">
			<div id="reboot_icon" class="value">
				<a onclick="rebootDevice()">
					<img class="icon" src="/assets/reboot-icon.png">
				</a>
			</div>
		</div>
	</div>

	<br>

	<div class="stats">
		<div id="caption_div_shutdown" class="caption_div blu1">
			<div class="caption">shutdown system</div>
		</div>

		<div id="value_div_shutdown" class="value_div blu2">
			<div id="shutdown_icon" class="value">
				<a onclick="shutdownDevice()">
					<img class="icon" src="/assets/poweroff-icon.png">
				</a>
			</div>
		</div>
	</div>

	<br>
</div>

<?php
	require 'functions.php';
	$disks = json_decode(getDisks(), true);
	$swaps = json_decode(getSwaps(), true);
	echo '<center><br>
	<h1>Disk <a onclick="reloadPage()"><img src="/assets/proceed-icon.png"></img></a></h1>
	<br>
	<table border="1" class="table-1" cellpadding="5">
	<tr>
		<th>Path</th>
		<th>Total</th>
		<th>Used</th>
		<th>Free</th>
		<th>Used Visual</th>
	</tr>';
	foreach($disks as $val){
		if($val['path'] != null and $val['total'] > 0 and $val['free'] != null and $val['used'] != null and $val['usep'] != null){
			echo '<tr>';
			echo '<td>'.$val['path'].'</td>';
			echo '<td>'.$val['total'].' MB</td>';
			echo '<td>'.$val['used'].' MB ('.$val['usep'].')</td>';
			echo '<td>'.$val['free'].' MB</td>';
			echo '<td>
			<progress value="'.str_ireplace('%', null, $val['usep']).'" max="100"></progress><br>'.$val['usep'].'</td>';
			echo '</tr>';
		}
	}

	echo '</table>';

	echo '<br>
	<h1>Swaps <a onclick="reloadPage()"><img src="/assets/proceed-icon.png"></img></a></h1>
	<br>
	<table border="1" class="table-2" cellpadding="5">
	<tr>
		<th>Path</th>
		<th>Size</th>
	</tr>';

	foreach($swaps as $vasl){
		echo '<tr>';
		echo '<td>'.$vasl['path'].'</td>';
		echo '<td>'.$vasl['size'].' MB</td>';
		echo '</tr>';
	}

	echo '</table></center>';
?>

<script>
setTemp();
setCPULoad();
setFreeMem();
setUpTime();
tempin = setInterval(setTemp, 1050);
cploadin = setInterval(setCPULoad, 1050);
frmemin = setInterval(setFreeMem, 1050);
uptimein = setInterval(setUpTime, 52500);

function reloadPage(){
	location="stats.page.php";
}
</script>

</div>

<?php
include 'modal.php';
?>