<?php
class Helper {


	public static function fileExtension($file = null) {
		if (!empty($file)) {
			$file = explode(".", $file);
			return !empty($file) ? array_pop($file) : null;
		}
	}
	
	
	
	public static function getClass($file = null) {
		if (!empty($file)) {
			$extension = self::fileExtension($file);
			switch($extension) {
				case 'pdf':
				return 'pdf';
				break;
				case 'jpg':
				case 'jpeg':
				return 'jpg';
				break;
				case 'png':
				return 'png';
				break;
				case 'gif':
				return 'gif';
				break;
				case 'doc':
				case 'docx':
				return 'doc';
				break;
				case 'css':
				return 'css';
				break;
				case 'php':
				return 'php';
				break;
				case 'js':
				return 'js';
				break;
				default:
				return 'file';
			}
		}
	}
	
	
	
	
	
	
	
	
	
	public static function isDirEmpty($dir = null) {
		return (($files = @scandir($dir)) && count($files) <= 2);
	}









}