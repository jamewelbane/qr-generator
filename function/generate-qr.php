<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/qr-style.css">
    <title>QR Code Generator</title>
</head>

<body>
    <div id="qrCodeContainer">
        <?php
        session_start(); // Start the session

        require '../vendor/phpqrcode/qrlib.php';

        // Function to validate URL
        function validateURL($url)
        {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        // Check if URL is submitted
        if (isset($_POST['url'])) {
            $url = $_POST['url'];

            // Validate URL
            if (validateURL($url)) {
                // Generate QR code
                $qrTempFile = '../qr_codes/temp.png'; // Temporary file path
                $size = 10; // Change the size here (e.g., 10 for a larger QR code)
                QRcode::png($url, $qrTempFile, QR_ECLEVEL_L, $size);

                // Store the temporary file path in the session
                $_SESSION['qrTempFile'] = $qrTempFile;

                // Display the QR code image
                echo '<img src="' . $qrTempFile . '" alt="QR Code">';
            } else {
                echo 'Invalid URL. Please enter a valid URL.';
            }
        }
        ?>

    </div>

    <form action="../qr/form.html" method="get">
        <input type="submit" value="Generate New QR Code">
    </form>
</body>

</html>