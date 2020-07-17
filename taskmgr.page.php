<script type="text/javascript" src="/core/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/style.css">
<script src="/core/main.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/scroll.css">
<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">

<?php
include 'core/preload.php';
include 'modal.php';
if($_GET != null and isset($_GET['type']) and isset($_GET['pid']) and $_GET['type'] == 'kill'){
	shell_exec('sudo kill '.$_GET['pid']);
	$_GET = null;
	$_GET['type'] = null;
	unset($_GET['type']);
	unset($_GET);
	header('Location: taskmgr.page.php?');
}

require 'functions.php';
$proc = json_decode(getProcesses(), true);
$total = round(getTotalMem());
echo '<center><br>
<h1>Task Manager <a onclick="reloadPage()"><img src="/assets/proceed-icon.png"></img></a></h1>
<br>
<table border="1" class="table-1" cellpadding="5">
<tr>
	<th>User</th>
	<th>PID</th>
	<th>CPU %</th>
	<th>Mem MB</th>
	<th>Command</th>
	<th></th>
</tr>';
foreach($proc as $val){
	if($val['user'] != null and $val['pid'] != null and $val['cpu_p'] != null and $val['command'] != null){
		echo '<tr>';
		echo '<td>'.$val['user'].'</td>';
		echo '<td>'.$val['pid'].'</td>';
		echo '<td>'.$val['cpu_p'].'%</td>';
		$mem = round($val['mem'] / 1024 ,1);
		echo '<td>'.$mem.' MB</td>';
		echo '<td>'.$val['command'].'</td>';
		echo '<td><a href="taskmgr.page.php?type=kill&pid='.$val['pid'].'">Terminate!</a></td>';
		echo '</tr>';
	}
}

echo '</table></center>';
?>

<style>
a {
	cursor: pointer;
}
</style>
<script>
function reloadPage(){
	location="taskmgr.page.php";
}
</script>