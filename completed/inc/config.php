<?php

defined("DS")
	|| define("DS", DIRECTORY_SEPARATOR);
	
defined("ROOT_PATH")
	|| define("ROOT_PATH", realpath(dirname(__FILE__) . DS."..".DS));
	
defined("CLASSES_PATH")
	|| define("CLASSES_PATH", ROOT_PATH.DS."classes");
	
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(CLASSES_PATH),
	get_include_path()
)));