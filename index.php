<title>PiDmin</title>
<?php
if($_POST != null and isset($_POST['type'])){
	if($_POST['type'] == 'reboot'){
		echo '<script>
		var intere = setInterval(check, 300);
		</script>';
	}
}
?>
<script type="text/javascript" src="/core/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/scroll.css">
<link rel="stylesheet" type="text/css" href="/styles/style.css">
<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">

<frameset rows="64,*" cols="*" framespacing="0"  frameborder="0">
	<frame src="/header.php" name="topFrame" scrolling="no" noresize>
		<frameset rows="*" cols="250,*" framespacing="0"  frameborder="0">
			<frame src="/core/menu/menu.php" name="menuFrame" scrolling="no" noresize>
			<frame src="/stats.page.php" name="pFrame" noresize>
		</frameset>
</frameset>