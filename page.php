<?php
session_start();
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
if(isset($_POST['page'])){
	switch($_POST['page']){
		case "PiVPN":
			vpn_profiles();
			break;
		default:
			echo "404 - Page not found!";
			break;
		
	}
}

//Simple page functions..
function vpn_profiles(){
	include('pages/wireguard.php');
}
?>
