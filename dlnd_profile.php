<?php
session_start();
if (isset($_SESSION['username']) && isset($_GET['filename'])) {
  $config = parse_ini_file('/etc/pivpn/wireguard/setupVars.conf', false);
  $ihome = $config['install_home'];
  $file = $ihome.'/configs/'.$_GET['filename'];
  header('Content-type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.$_GET['filename'].'"');
  header('Content-length: ' . filesize($file));
  readfile($file);
} else {
	header("Location: ./index.php");
}

?>