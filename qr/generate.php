<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../assets/images/icons/favicon.png">
<?php
include '../overlay.html';
?>
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form-style.css">
    <title>QR Code Generator</title>
</head>

<body>
    <div class="container">
        <h2>QR Code Generator</h2>
        <form id="qrForm" action="../function/generate-qr" method="post">
            <label for="url">Enter URL:</label><br>
            <input type="text" id="url" name="url" required><br><br>
            <input type="submit" value="Generate QR Code">
        </form>
    </div>

    
</body>

</html>
