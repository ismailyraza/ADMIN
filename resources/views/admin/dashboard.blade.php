<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/background2.jpg'); /* Update this to your actual image name */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
            height: 100vh;
            position: relative;
            color: white; /* Text color */
            overflow: hidden; /* Prevent scrolling */
        }

        h1 {
            margin-top: 20px;
            font-size: 36px; /* Size of "WELCOME TO GUISED UP ADMIN PANEL" */
            color: #8B0000; /* Dark red color */
        }

        h2 {
            margin-top: 20px; /* Increased gap between welcome text and dashboard */
            font-size: 24px; /* Size for the dashboard subtitle */
            color: black; /* Set to black for dashboard title */
            font-weight: bold; /* Make the dashboard title bold */
        }

        #logout {
            position: absolute; /* Position it in the top right corner */
            top: 20px;
            right: 20px;
            background-color: transparent; /* Transparent background */
            border: none;
            color: #FF5733; /* Color for logout button */
            font-size: 16px; /* Size of the logout text */
            cursor: pointer;
        }

        /* Adjusted margin for buttons to be positioned further down */
        .links {
            margin-top: 50px; /* Increased space before buttons */
            display: flex; /* Flexbox for side-by-side layout */
            justify-content: center; /* Center links */
            gap: 30px; /* Space between the buttons */
        }

        .button {
            background-color: #4682B4; /* Button color */
            color: white; /* Text color */
            border: none;
            border-radius: 50%; /* Circular buttons */
            padding: 15px 20px; /* Padding for button */
            font-size: 16px; /* Font size for button text */
            cursor: pointer;
            transition: background-color 0.3s; /* Transition effect on hover */
            display: flex; /* Center the text */
            align-items: center; /* Center text vertically */
            justify-content: center; /* Center text horizontally */
        }

        .button:hover {
            background-color: #5F9EA0; /* Change color on hover */
        }

        /* Container to display fetched data */
        #data-container {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* White background with transparency */
            border-radius: 10px;
            width: 80%; /* Responsive width */
            max-width: 600px; /* Max width for large screens */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }
    </style>
</head>
<body>
    <h1>WELCOME TO GUISED UP ADMIN PANEL</h1> <!-- Updated welcome text -->
    <h2>DASHBOARD</h2> <!-- Subtitle for the dashboard -->

    <!-- Logout button -->
    <button id="logout">Logout ➔</button> <!-- Logout button with an arrow -->

    <!-- Links to view message history and send a new message -->
    <div class="links">
        <button class="button" onclick="window.location.href='/admin/message-history'">View Message History</button>
        <button class="button" onclick="window.location.href='/admin/send-message'">Send a New Message</button>
    </div>

    <!-- Container to display fetched data -->
    <div id="data-container"></div>

    <script>
        // Fetch the token from localStorage
        const token = localStorage.getItem('authToken');

        // Redirect to login if no token is found
        if (!token) {
            window.location.href = '/admin/login';
        }

        // Fetch protected data using the token
        fetch('/admin/message-history', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch protected data');
            }
            return response.json();
        })
        .then(data => {
            // Display the fetched data
            const container = document.getElementById('data-container');
            if (data.length === 0) {
                container.innerHTML = '<p>No messages found.</p>';
            } else {
                const messageList = data.map(message => `
                    <div>
                        <strong>ID:</strong> ${message.id} <br>
                        <strong>Group:</strong> ${message.group.name} <br>
                        <strong>Phase:</strong> ${message.phase.name} <br>
                        <strong>Message:</strong> ${message.content} <br>
                        <strong>Sent At:</strong> ${new Date(message.created_at).toLocaleString()} <br>
                    </div>
                    <hr>
                `).join('');
                container.innerHTML = messageList;
            }
        })
        .catch(error => {
            console.error('Error fetching protected data:', error);
            // Commented out the error message display
            // document.getElementById('data-container').innerHTML = '<p>Error loading messages. Please try again.</p>';
        });

        // Get CSRF token from the meta tag added in the login page or layout
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Logout functionality
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            fetch('/admin/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                }
            })
            .then(response => {
                if (response.ok) {
                    // Clear token from localStorage and redirect to login
                    localStorage.removeItem('authToken');
                    window.location.href = '/admin/login';
                } else {
                    throw new Error('Logout failed');
                }
            })
            .catch(error => {
                console.error('Error during logout:', error);
            });
        });
    </script>
</body>
</html>
