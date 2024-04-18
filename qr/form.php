<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Adjusted width for better fit */
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%; /* Make button full-width */
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .container {
                margin: 20px auto;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>QR Code Generator</h2>
        <form action="../function/generate-qr.php" method="post">
            <label for="url">Enter URL:</label><br>
            <input type="text" id="url" name="url" required><br><br>
            <input type="submit" value="Generate QR Code">
        </form>
    </div>
</body>
</html>
