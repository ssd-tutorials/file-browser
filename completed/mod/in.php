<?php
if (!empty($_POST['path'])) {

	require_once('../inc/autoload.php');
	
	$folder = substr($_POST['path'], 1);
	
	if (!empty($_POST['folder'])) {
		
		if (!empty($folder)) {
			$rel = DS.$folder.DS.$_POST['folder'];
		} else {
			$rel = DS.$_POST['folder'];
		}
		
		$up = '<li class="folder-up" rel="go-up">Go up...</li>';
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










