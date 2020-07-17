<?php
if(shell_exec('cat /sys/class/thermal/thermal_zone0/temp') != null){
	$temp = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
	$temp = round($temp / 1000 , 1);
}

if(shell_exec('top -bn1') != null){
	$cpu = shell_exec('top -bn1 | grep "Cpu(s)" | sed "s/.*, \([0-9,\.]*\)%* id.*/\1/" | awk'." '{print 100 - $1}'");
	$cpu = substr($cpu, 0, strlen($cpu) - 1);
	$cpu = str_ireplace(' ', null, $cpu) . '%';
}

if(shell_exec('cat /proc/meminfo') != null){
	$freeMem = shell_exec("cat /proc/meminfo | grep 'MemFree' | awk  '{ print $2 }'");
	$freeMem = round($freeMem / 1024 , 1);
}

if($temp != null){
	$json['temp'] = $temp;
}

if($cpu != null){
	$json['cpu'] = $cpu;
}

if($freeMem != null){
	$json['freeMem'] = $freeMem;
}

if($json != null){
	$js = json_encode($json);
	echo($js);
}
?>