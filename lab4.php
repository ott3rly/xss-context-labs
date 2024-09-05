<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS via JSON Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .output {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
        }
        input[type="button"] {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>XSS via JSON Response (with Input Field)</h1>
    <p>Enter a username, and the JSON response will display it dynamically. If the input is manipulated, it can trigger XSS!</p>

    <form>
        Username: <input type="text" id="usernameInput">
        <input type="button" value="Submit" onclick="fetchData()">
    </form>

    <div class="output" id="output"></div>

    <script>
        function fetchData() {
            // Get user input from the input field
            var userInput = document.getElementById('usernameInput').value;

            // Simulating a JSON response from an API
            var jsonResponse = {
                username: userInput
            };

            // This is where the vulnerability lies: directly inserting the JSON data into the DOM
            document.getElementById('output').innerHTML = "User: " + jsonResponse.username;
        }
    </script>
</body>
</html>
