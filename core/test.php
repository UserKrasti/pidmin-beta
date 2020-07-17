<?php
if(shell_exec('df -h') != null){
	$df = shell_exec('df -h');
	$lines = explode(PHP_EOL, $df);
	unset($lines[0]);
	$c = 0;
	foreach($lines as $val){
		$name_t = substr($val, 0, strpos($val, ' '));
		$name = trim($name_t);

		$next_t = substr($val, strpos($val, ' '));
		$next = trim($next_t);

		$size_w = substr($next, 0, strpos($next, ' '));
		$size = substr($size_w, 0, strlen($size_w) - 1);

		$free_w = substr($next, strpos($next, ' '));
		$free_w = trim($free_w);
		$free_w = substr($free_w, strpos($next, ' ') -1);
		$free_w = str_ireplace('M', null, $free_w);
		$free_w = str_ireplace('G', null, $free_w);
		$free_w = str_ireplace('K', null, $free_w);
		$free_w = trim($free_w);
		$free_w = substr($free_w, 0, strpos($next, ' ', 1));
		$free = trim($free_w);
		if($size != null and $name != 'tmpfs' and is_int($c)){
			$json[$c]['name'] = $name;
			$json[$c]['size'] = $size;
			$json[$c]['free'] = $free;
			/*$b = $size - floor($size);
			if($b){
				echo 'gb';
			} else {
				echo 'mb';
			}*/
			$c++;
		}
		$js = json_encode($json);
		
	}
	var_dump($json);
}
?>