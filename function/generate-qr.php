<?php
require '../vendor/phpqrcode/qrlib.php';

// Function to validate URL
function validateURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}

// Check if URL is submitted
if(isset($_POST['url'])) {
    $url = $_POST['url'];

    // Validate URL
    if(validateURL($url)) {
        // Generate QR code
        $qrFile = '../qr_codes/'.uniqid().'.png'; // Unique filename for each QR code
        $size = 10; // Change the size here (e.g., 10 for a larger QR code)
        QRcode::png($url, $qrFile, QR_ECLEVEL_L, $size);

        // Return the URL of the generated QR code image
        echo $qrFile;
    } else {
        echo 'Invalid URL. Please enter a valid URL.';
    }
}
?>
