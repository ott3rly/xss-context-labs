<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS in JavaScript Context</title>
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
    <h1>XSS in JavaScript Context</h1>

    <form method="GET" action="">
        Enter your username: <input type="text" name="username">
        <input type="submit" value="Submit">
    </form>

    <script>
        var username = '<?php echo $_GET['username']; ?>';
        if (username) {
            // Simulating an unsafe use of a variable in JavaScript
            try {
                eval("var user = '" + username + "'; console.log(user);");
                document.write("<p>Hello, " + user + "!</p>");
            } catch (e) {
                document.write("<p>Invalid input!</p>");
            }
        }
    </script>
</body>
</html>
