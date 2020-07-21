<?php
if($_GET != null and isset($_GET['type'])){
	if($_GET['type'] == 'reboot'){
		shell_exec('sudo reboot');
	}
	if($_GET['type'] == 'shutdown'){
		shell_exec('sudo shutdown now');
	}
}

function getDisks(){
	$path = shell_exec("df | tail -n +2 | awk '{print $6".'" "'."$7}'");
	$paths = explode(PHP_EOL, $path);

	$free = shell_exec("df | tail -n +2 | awk '{print $4}'");
	$frees = explode(PHP_EOL, $free);

	$used = shell_exec("df | tail -n +2 | awk '{print $3}'");
	$useds = explode(PHP_EOL, $used);

	$usep = shell_exec("df | tail -n +2 | awk '{print $5}'");
	$useps = explode(PHP_EOL, $usep);

	$c = 0;
	foreach($paths as $val){
		if($val != null and $val != 'tmpfs'){
			$json[$c]['path'] = $val;
			$json[$c]['total'] = round(($frees[$c] + $useds[$c]) / 1024 ,1);
			$json[$c]['free'] = round($frees[$c] / 1024 ,1);
			$json[$c]['used'] = round($useds[$c] / 1024 ,1);
			$json[$c]['usep'] = $useps[$c];
			$c++;
		}
		$js = json_encode($json);
	}
	return $js;
}

function getSwaps(){
	$path = shell_exec("cat /proc/swaps | tail -n +2 | awk '{print $1}'");
	$paths = explode(PHP_EOL, $path);

	$size = shell_exec("cat /proc/swaps | tail -n +2 | awk '{print $3}'");
	$sizes = explode(PHP_EOL, $size);

	$c = 0;
	foreach($paths as $val){
		if($val != null and $sizes[$c] != null){
			$json[$c]['path'] = $val;
			$json[$c]['size'] = round($sizes[$c] / 1024 ,1);
		}
		$c++;
	}
	$js = json_encode($json);
	return $js;
}

function getDistr(){
	$dist = shell_exec("lsb_release -a | tail -n +2 | awk '{print $2".'" "'."$3".'" "'."$4".'" "'."$5".'" "'."$6".'" "'."$7}'");
	$distr = explode(PHP_EOL, $dist);
	return $distr[0];
}

function getKernel(){
	return trim(shell_exec('uname -r'));
}

function getCPU(){
	return trim(shell_exec("cat /proc/cpuinfo | grep 'Hardware' | awk '{print $3".'" "'."$4".'" "'."$5".'" "'."$6".'" "'."$7".'" "'."$8}'"));
}

function getHost(){
	return trim(shell_exec('hostname'));
}

function getIP(){
	return $_SERVER['SERVER_ADDR'];
}

function getProcesses(){
	$cmd = shell_exec("ps aux | tail -n +2 | awk '{print $11".'" "'."$12".'" "'."$13".'" "'."$14".'" "'."$15".'" "'."$16}'");
	$pid = shell_exec("ps aux | tail -n +2 | awk '{print $2}'");
	$usr = shell_exec("ps aux | tail -n +2 | awk '{print $1}'");
	$cpu = shell_exec("ps aux | tail -n +2 | awk '{print $3}'");
	$mem = shell_exec("ps aux | tail -n +2 | awk '{print $5}'");

	$cmds = explode(PHP_EOL, $cmd);
	$pids = explode(PHP_EOL, $pid);
	$usrs = explode(PHP_EOL, $usr);
	$cpus = explode(PHP_EOL, $cpu);
	$mems = explode(PHP_EOL, $mem);

	$c = 0;
	foreach($cmds as $cmdc){
		$json[$c]['command'] = $cmdc;
		$json[$c]['pid'] = $pids[$c];
		$json[$c]['user'] = $usrs[$c];
		$json[$c]['cpu_p'] = $cpus[$c];
		$json[$c]['mem'] = $mems[$c];
		$c++;
	}
	$js = json_encode($json);
	return $js;
}

function getTotalMem(){
	$freeMem = shell_exec("cat /proc/meminfo | grep 'MemFree' | awk  '{ print $2 }'");
	$freeMem = round($freeMem / 1024 , 1);
	return $freeMem;
}
?>