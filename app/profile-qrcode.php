<?php
//Check for valid session:
session_start();
include('app/functions.php');
if(!isset($_SESSION['username'])){
       die("You must be logged in to view this page!");
}
if(!isset($_POST['profile'])){ die("No profile name selected!"); }
$pro = $_POST['profile'];

// Generate QR code
get_qr_code($pro);

// Generate and display QR code for selected profile
function get_qr_code($profile) {
    $path_parts = pathinfo($profile);
    $image_filename = $path_parts['filename'] . '_qrcode.png';
    
    // Place image where we can access it
    $site_path = getcwd();
    $image_file = $site_path . '/tmp/' . $image_filename;

    $output = shell_exec("qrencode -o $image_file -r $profile 2>&1");

    if (file_exists($image_file)) {
        // Display the QR code image
        print '<div style="text-align: center;"><img src="app/tmp/'.$image_filename.'" alt="QR Code"></div>';
    } else {
        echo "Error generating QR code: " . $output;
    }

    //print $temp;

    return $output;
}

?>
