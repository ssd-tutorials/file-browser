<?php
if ($handle = opendir($path)) {
	
	echo '<ul id="structure" rel="'.$rel.'">';
	echo $up;
	
	while(false !== ($file = readdir($handle))) {
		if (!in_array($file, array('.', '..', '.DS_Store', '_notes', 'Thumbs.db'))) {
			if (is_dir($path.DS.$file)) {
				if (Helper::isDirEmpty($path.DS.$file)) {
					echo '<li class="folder-empty" rel="'.$file.'">'.$file.'</li>';
				} else {
					echo '<li class="folder" rel="'.$file.'">'.$file.'</li>';
				}
			} else {
				echo '<li class="'.Helper::getClass($file).'">'.$file.'</li>';
			}
		}
	}
	
	echo '</ul>';
	
	closedir($handle);
	
}







