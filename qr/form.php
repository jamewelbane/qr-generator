<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form-style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>QR Code Generator</title>

    <style>
        /* Custom CSS for QR code modal */
        #qrModal .modal-body {
            text-align: center; /* Center the content */
        }

        #qrCodeImg {
            max-width: 100%; /* Enlarge the QR code to fill the modal */
            height: auto;
            margin: 0 auto; /* Center the QR code horizontally */
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>QR Code Generator</h2>
        <form id="qrForm" action="../function/generate-qr.php" method="post">
            <label for="url">Enter URL:</label><br>
            <input type="text" id="url" name="url" required><br><br>
            <input type="submit" value="Generate QR Code">
        </form>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="qrCodeImg" src="" alt="QR Code">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS (jQuery required) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to handle QR code generation and modal display -->
    <script>
        // Handle form submission
        $('#qrForm').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            // Get the URL entered by the user
            var url = $('#url').val();

            // Make AJAX request to generate QR code
            $.ajax({
                url: '../function/generate-qr.php',
                type: 'POST',
                data: {
                    url: url
                },
                success: function(data) {
                    // Set the QR code image URL in the modal
                    $('#qrCodeImg').attr('src', data);

                    // Display the modal
                    $('#qrModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>
