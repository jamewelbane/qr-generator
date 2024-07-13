<?php
function deleteOldQrCodes($directory, $ageInMinutes = 60) {
    // Convert age to seconds
    $ageInSeconds = $ageInMinutes * 60;

    // Get current time
    $currentTime = time();

    // Open the directory
    if ($handle = opendir($directory)) {
        // Loop through the directory contents
        while (false !== ($file = readdir($handle))) {
            // Skip . and ..
            if ($file !== '.' && $file !== '..') {
                $filePath = $directory . '/' . $file;

                // Check if the file is older than the specified age
                if (is_file($filePath) && ($currentTime - filemtime($filePath)) > $ageInSeconds) {
                    // Delete the file
                    unlink($filePath);
                }
            }
        }
        // Close the directory
        closedir($handle);
    }
}

// Specify the directory and the age limit in minutes
$qrCodesDirectory = '../qr_codes';
$ageLimit = 60; // Set the age limit as per your requirement

// Call the function to delete old QR codes
deleteOldQrCodes($qrCodesDirectory, $ageLimit);
