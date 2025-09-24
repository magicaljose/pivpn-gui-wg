<?php
//Check for valid session:
session_start();
include('app/functions.php');
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
if(!isset($_POST['profile'])){ die("No profile name selected!"); }
$pro = $_POST['profile'];
add_vpn_profile($pro);
//Run selected script, but only if it exists in the scr_up folder.
function add_vpn_profile($profile) {
	
    // Open a handle to expect in write mode
    $p = popen('sudo /usr/bin/expect','w');

    // Log conversation for verification
    $log = './tmp/passwd_' . md5($profile . time());
    $cmd .= "log_file -a \"$log\"; ";
    
    // Spawn a shell as $user
    $cmd .= "spawn /bin/bash; ";
    // Change the unix password
    $cmd .= "send \"pivpn add\\r\"; ";
    $cmd .= "expect -re \"Enter the Client IP from range .+: \"; ";
    $cmd .= "send \"\\r\"; ";
    $cmd .= "expect -re \"Enter a Name for the Client (default: .+): \"; ";
    $cmd .= "send \"$profile\\r\"; ";
    $cmd .= "expect -re \".+ mobile app.\"; ";
    // Commit the command to expect & close
    fwrite($p, $cmd); pclose ($p);

    // Read & delete the log
    $output = shell_exec("cat $log | sed 's/\x1B\[[0-9;]\{1,\}[A-Za-z]//g'");
    unlink($log);
	print "Notification : $output ";
    $output = explode("\n",$output);


    return $output;
}

?>
