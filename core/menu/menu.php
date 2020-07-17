<script type="text/javascript" src="/core/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">

<div class="chars">
	<?php
	require '../../functions.php';
	$dist = scandir('../../assets/dist');
	unset($dist[0],$dist[1]);
	foreach ($dist as $filep){
		$arr = array('.png', '.jpg', '.jpeg');
		$file = str_ireplace($arr, null, $filep);
		$distr = getDistr();
		if(stristr($distr, $file) != false){
			echo '<br><center><img src="/assets/dist/'.$filep.'"></img>';
			echo '<div class="caption">'.getDistr().'</div></center>';
		}
	}
	?>
	<ul class="uls">
<?php
	echo '<li class="lis"><div style="color: white;">Kernel: </div></li>';
	echo getKernel();

	echo '<li class="lis"><div style="color: white;">CPU: </div></li>';
	echo getCPU();

	echo '<li class="lis"><div style="color: white;">IP Address: </div></li>';
	echo getIP();
?>
	</ul>
</div>

<nav>
	<a id="stats_a" target="pFrame" onclick="selectStats()" class="active" href="/stats.page.php">
	<img class="icon" src="/assets/home-icon.png">
	<span class="text-menu">Dashboard</span>
	</a> 

	<div class="menu-capt">System</div>
	<a id="console_a" target="pFrame" onclick="selectConsole()" href="/cli.page.php">
	<img class="icon" src="/assets/cli-icon.png"> 
	<span class="text-menu">Command Line</span>
	</a> 

	<!--<a id="fm_a" target="pFrame" onclick="selectFM()" href="/fm.page.php">
	<img class="icon" src="/assets/folder-icon.png">
	<span class="text-menu">File Manager</span>
	</a>-->

	<a id="tm_a" target="pFrame" onclick="selectTM()" href="/taskmgr.page.php">
	<img class="icon" src="/assets/tasks-icon.png">
	<span class="text-menu">Task Manager</span>
	</a> 

	<div class="menu-capt">Web</div>
	<a id="web_a" target="pFrame" onclick="selectWeb()" href="/web.page.php">
	<img class="icon" src="/assets/web-icon.png">
	<span class="text-menu">Web Manager</span>
	</a>
</nav>

<style>
.menu-capt {
	width: calc(100% - padding-left);
	color: rgb(200,200,200);
	background: rgb(18,18,18);
	text-transform: uppercase;
	padding-left: 10px;
	padding: 10px;
}

.text-menu {
	vertical-align: middle;
	margin-bottom: 2px;
	padding-bottom: 2px
}

.uls {
	list-style-position: outside;
	padding-left: 20px;
}

.lis {
	color: green;
	font-size: 16px;
}

.caption {
	text-align: center;
	color: white;
	padding-bottom: 5px;
	padding-top: 5px;
	font-size: 25px;
	font-weight: 750;
}

.chars {
	font-size: 14px;
	color: rgb(155,155,155);
}

body {
	padding: 0;
	margin: 0;
	background-color: rgb(40,40,40);
}

* {
	font-family: 'Segoe UI';
}

.icon {
	vertical-align: middle;
}

nav {
	width: 100%;
	background-color: rgb(40,40,40);
	overflow: hidden;
}

nav a {
	float: none;
	display: block;
	padding: 18px;
	color: #fff;
	text-decoration: none;
	font-size: 17px;
	text-rendering: optimizeLegibility;
}

nav a:hover {
	background-color: rgb(25,25,25);
}

.active {
	background-color: rgb(8,8,8);
}
</style>

<script>
function selectConsole(){
	$('#console_a').addClass('active');
	$('#web_a').removeClass('active');
	$('#stats_a').removeClass('active');
	$('#fm_a').removeClass('active');
	$('#tm_a').removeClass('active');
}

function selectStats(){
	$('#console_a').removeClass('active');
	$('#web_a').removeClass('active');
	$('#stats_a').addClass('active');
	$('#fm_a').removeClass('active');
	$('#tm_a').removeClass('active');
}

function selectFM(){
	$('#console_a').removeClass('active');
	$('#web_a').removeClass('active');
	$('#stats_a').removeClass('active');
	$('#fm_a').addClass('active');
	$('#tm_a').removeClass('active');
}

function selectTM(){
	$('#console_a').removeClass('active');
	$('#web_a').removeClass('active');
	$('#stats_a').removeClass('active');
	$('#fm_a').removeClass('active');
	$('#tm_a').addClass('active');
}

function selectWeb(){
	$('#console_a').removeClass('active');
	$('#web_a').addClass('active');
	$('#stats_a').removeClass('active');
	$('#fm_a').removeClass('active');
	$('#tm_a').removeClass('active');
}
</script>