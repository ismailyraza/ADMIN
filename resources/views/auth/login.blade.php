<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/background.jpg'); /* Update this to your actual image name */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Added for absolute positioning of title */
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px; /* Fixed width for the login container */
            position: relative; /* Needed for positioning of inner elements */
            margin-top: 100px; /* Distance from top to center it below the title */
        }

        h1 {
            color: #FF5733; /* Highlight color for "GUISED UP" text */
            font-size: 36px;
            margin-bottom: 20px;
            position: absolute; /* Absolute position for fixed placement */
            top: 20px; /* Distance from the top */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center the text */
        }

        h2 {
            color: #FF5733; /* Highlight color for "ADMIN PANEL" text */
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left; /* Align labels to the left */
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #FF5733; /* Button color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #e74c3c; /* Darker shade on hover */
        }

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>GUISED UP</h1> <!-- Title at the top -->
    <div class="login-container">
        <h2>ADMIN PANEL</h2> <!-- Updated title within the credentials -->
        <form id="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p id="error-message"></p>
    </div>

    <script>
        // Listen for form submission
        document.getElementById('login-form').addEventListener('submit', async function (event) {
            event.preventDefault();  // Prevent the default form submission

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get CSRF token

            try {
                // Send login request to server
                const response = await fetch('/admin/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers
                    },
                    body: JSON.stringify({ email, password })
                });

                if (response.ok) {
                    const data = await response.json();

                    // Store token in local storage
                    localStorage.setItem('authToken', data.token);

                    // Redirect to dashboard
                    window.location.href = '/admin/dashboard';
                } else {
                    // Display error message if login failed
                    const errorData = await response.json();
                    document.getElementById('error-message').textContent = errorData.message || 'Login failed.';
                }
            } catch (error) {
                document.getElementById('error-message').textContent = 'An error occurred. Please try again.';
            }
        });
    </script>
</body>
</html>
