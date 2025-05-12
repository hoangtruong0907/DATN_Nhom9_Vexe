<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #ff6f61;
        }
        p {
            font-size: 20px;
            margin: 10px 0 20px;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #ff6f61;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #ff4a33;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Sorry, the page you are looking for could not be found.</p>
        <a href="{{ url('/') }}">Return to Home</a>
    </div>
</body>
</html>
