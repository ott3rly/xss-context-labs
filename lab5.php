<?php
// Define the upload directory as the current directory (i.e., same as the script's location)
$target_dir = "./"; // Use current directory for uploads
$upload_message = "";

// Check if a file was uploaded
if (isset($_FILES['fileToUpload'])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only SVG files
    if ($file_type != "svg") {
        $upload_message = "Only SVG files are allowed!";
    } else {
        // Check if the uploaded file is indeed an SVG by checking the MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);
        finfo_close($finfo);

        if ($mime_type != "image/svg+xml") {
            $upload_message = "The uploaded file is not a valid SVG file!";
        } else {
            // Save the file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $upload_message = "File uploaded successfully: <a href='" . basename($_FILES["fileToUpload"]["name"]) . "'>" . basename($_FILES["fileToUpload"]["name"]) . "</a>";
            } else {
                $upload_message = "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS via SVG File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="file"], input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
        }
        .upload-message {
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>XSS via SVG File Upload</h1>
    <p>Upload an SVG file. If the file contains malicious code, it will execute when viewed!</p>

    <form method="POST" enctype="multipart/form-data">
        Select SVG file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <div class="upload-message">
        <?php echo $upload_message; ?>
    </div>

    <p>Uploaded files can be accessed from the current directory. Any SVG files that contain XSS payloads will execute when opened.</p>
</body>
</html>
