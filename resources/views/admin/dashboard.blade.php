<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/background2.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            position: relative;
            color: white;
            overflow: hidden;
        }

        h1 {
            margin-top: 20px;
            font-size: 36px;
            color: #8B0000;
        }

        h2 {
            margin-top: 20px;
            font-size: 24px;
            color: black;
            font-weight: bold;
        }

        #logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: transparent;
            border: none;
            color: #FF5733;
            font-size: 16px;
            cursor: pointer;
        }

        .links {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .button {
            background-color: #4682B4;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button:hover {
            background-color: #5F9EA0;
        }

        #data-container {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <h1>WELCOME TO GUISED UP ADMIN PANEL</h1>
    <h2>DASHBOARD</h2>

    <button id="logout">Logout ➔</button>

    <div class="links">
        <button class="button" onclick="window.location.href='/admin/message-history'">View Message History</button>
        <button class="button" onclick="window.location.href='/admin/send-message'">Send a New Message</button>
        <button class="button" onclick="window.location.href='/admin/phases'">View Phases Overview</button>
        <button class="button" onclick="window.location.href='/admin/posts/create'">Create New Post</button>
    </div>

    <div id="data-container">
        <!-- Content for fetched data or other relevant information -->
    </div>

    <script>
        const token = localStorage.getItem('authToken');

        if (!token) {
            window.location.href = '/admin/login';
        }

        document.getElementById('logout').addEventListener('click', () => {
            localStorage.removeItem('authToken');
            window.location.href = '/admin/login';
        });
    </script>
</body>
</html>
