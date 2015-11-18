<?php
if (!empty($_POST['path'])) {

	require_once('../inc/autoload.php');
	
	$folder = substr($_POST['path'], 1);
	
	if (!empty($folder)) {
		
		$folder = explode(DS, $folder);
		
		if (count($folder) > 1) {
		
			array_pop($folder);
			$rel = DS.implode(DS, $folder);
			$up = '<li class="folder-up" rel="go-up">Go up...</li>';
			
		} else {
		
			$up = null;
			$rel = DS;
		
		}
		
		$path = ROOT_PATH.$rel;
		
	} else {
		
		$path = ROOT_PATH;
		$rel = DS;
		$up = null;
		
	}
	
	ob_start();
	require_once('structure.php');
	$out = ob_get_clean();
	
	echo json_encode(array('out' => $out));

}










