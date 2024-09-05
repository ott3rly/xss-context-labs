<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS in Attribute Context</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 10px;
        }
        img {
            display: block;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>XSS in Attribute Context</h1>
    <form method="GET" action="">
        Image URL: <input type="text" name="imgurl">
        <input type="submit" value="Submit">
    </form>

    <img src="<?php echo $_GET['imgurl']; ?>" width="200" alt="User submitted image">
</body>
</html>
