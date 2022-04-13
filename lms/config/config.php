<?php
if(!function_exists('root')){
	function root($path=''){
		$path=trim($path,'/');
		$docPath=dirname(dirname(__FILE__)).'/'.$path;
		return $docPath;
		
	}
}

if(!function_exists('base_url')){

function base_url($path=''){
		$path=trim($path,'/');
		$http=$_SERVER['HTTP_HOST'];
		$serverName=$_SERVER['SERVER_NAME'];
		return $http.'/lms/'.$path;
		
	
	}

	
}