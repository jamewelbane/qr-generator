<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../assets/images/icons/favicon.png">
<?php
include '../overlay.html';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/qr-style.css">
    <title>QR Code Generator</title>
</head>
<body>
    <div id="qrCodeContainer">
        <?php
        session_start(); 

        require '../vendor/phpqrcode/qrlib.php';

        // Function to validate URL
        function validateURL($url)
        {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        if (isset($_POST['url'])) {
            $url = $_POST['url'];

            // Validate URL
            if (validateURL($url)) {
                // Generate a unique filename using a timestamp
                $uniqueFilename = '../qr_codes/qr_' . time() . '.png';
                $size = 10; 
                QRcode::png($url, $uniqueFilename, QR_ECLEVEL_L, $size);

                // Store the unique file path in the session
                $_SESSION['qrUniqueFile'] = $uniqueFilename;

                // Display the QR code image
                echo '<img src="' . $uniqueFilename . '" alt="QR Code">';
                echo '<a href="' . $uniqueFilename . '" download="qr_code.png">Download QR Code</a>';
            } else {
                echo 'Invalid URL. Please enter a valid URL.';
            }
        }
        ?>
    </div>

    <form action="../qr/generate" method="get">
        <input type="submit" value="Generate New QR Code">
    </form>
</body>
</html>
