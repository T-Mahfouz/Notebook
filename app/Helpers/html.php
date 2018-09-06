<?php


function style_ts($path){
	try{
		$ts = '?v='.File::lastModified(public_path().$path);
		return '<link media="all" rel="stylesheet" type="text/css" href="'.$path.$ts.'">';
	}catch(Exception $e){
		$ts = '';
	}
}

function script_ts($path){
	try{
		$ts = '?v='.File::lastModified(public_path().$path);
		return '<script src="'.$path.$ts.'"></script>';
	}catch(Exception $e){
		$ts = '';
	}
}