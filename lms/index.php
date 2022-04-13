<?php 
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    header("Location:admin.php");
}
require_once ("config/config.php");
require_once ("config/db.php");
//require_once ("config/query.php");

$url=isset($_GET['url']) ? $_GET['url'] :'home';

$url=str_replace('.php', '', $url);

$url.='.php';

$pagePath=root('pages/'.$url);

require_once root('includes/header.php');

if(file_exists($pagePath) && is_file($pagePath)){
 
if(!isset($_SESSION['login']) || $_SESSION['login'] != 'enter'){
    header('Location:admin.php');
}


	require_once $pagePath;
}else {
	
	echo "<h1>Page not found 404</h1>";
}
require_once root('includes/footer.php');

?>
