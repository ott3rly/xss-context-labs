<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic XSS in HTML Context</title>
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
        p {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            width: fit-content;
        }
    </style>
</head>
<body>
    <h1>Basic XSS in HTML Context</h1>
    <form method="GET" action="">
        Name: <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>

    <p>Hello, <?php echo $_GET['name']; ?>!</p>
</body>
</html>
