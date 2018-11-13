<?php 
	function generateKey($legthKey){
	$key_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 	$key_base .= '0123456789' ;
 	/*$key_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';*/
 
	$password = '';
	$limit = strlen($key_base) - 1;
 
	for ($i=0; $i < $legthKey; $i++)
		$password .= $key_base[rand(0, $limit)];
	 
		return $password;
	}
?>