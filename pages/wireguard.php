<?php
//Check for valid session:
session_start();
include('app/functions.php');
if(!isset($_SESSION['username'])){
	die("You must be logged in to view this page!");
}
echo '';
?>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">PiVPN Profiles <small><a href="#"><div onClick="pageLoad('PiVPN');" class="fa fa-refresh rotate"></div></a></small></h1>
	    <small>This page only works with <a href="http://pivpn.io" target="_blank">pivpn.io</a></small>
		<br />
		<button class="btn btn-sm btn-raised btn-info" type="button" onclick="createProfile()">Create VPN Profile</button>
		<table class="table">
    			<thead>
    				<th>WireGuard Client Profile</th>
    			</thead>
    			<tbody>
    				<?php
					$config = parse_ini_file('/etc/pivpn/wireguard/setupVars.conf', false);
    				$ihome = $config['install_home'];
    				$config_files = getDirContents($ihome.'/configs');
    				foreach($config_files as $conf){
    					$f = explode("/", $conf);
    					$file = end($f);
    					echo'<tr><td class="hide-on-mobile" style="vertical-align: middle;"><a href="#" onClick="displayProfile(\''.$conf.'\')">'.basename($conf).'</a></td>
							<td><button class="btn btn-sm btn-raised btn-default" onclick="qrProfile(\''.$conf.'\')">QR Code</button></td>
							<td><a href="dlnd_profile.php?filename='.$file.'" class="btn btn-sm btn-raised btn-info">Download</a></td>
							<td><button class="btn btn-sm btn-raised btn-warning" onclick="removeProfile(\''.$conf.'\')">Remove</button></td></tr>';
    				}
    				?>
    			</tbody>
    		</table><br>
        </div>
    </div>
    <div class="row">
    	<div class="col-lg-6">
    		
    		<table class="table">
    			<thead>
    				<th>WireGuard Client List</th>
    			</thead>
			</table>
			<?php
			$profile_clients = shell_exec("pivpn clients | sed 's/\x1B\[[0-9;]\{1,\}[A-Za-z]//g'");
			echo "<pre>".$profile_clients."</pre>";
			?><br>
	    </div>
	<div class="col-lg-6">
		<table class="table">
    			<thead>
    				<th>WireGuard Profile Status</th>
    			</thead>
		</table>
	<?php
	$profile_stats = shell_exec("pivpn list | sed 's/\x1B\[[0-9;]\{1,\}[A-Za-z]//g'");
	echo "<pre>".$profile_stats."</pre>";
	?>
	</div>
    </div>
    <div class="row">
	<div class="col-lg-12">
		
	</div>

    </div>
