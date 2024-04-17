<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <h2>QR Code Generator</h2>
    <form action="../function/generate-qr.php" method="post">
        <label for="url">Enter URL:</label><br>
        <input type="text" id="url" name="url" required><br><br>
        <input type="submit" value="Generate QR Code">
    </form>
</body>
</html>
