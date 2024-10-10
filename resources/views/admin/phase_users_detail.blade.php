<!-- resources/views/admin/phase_users_detail.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users in Phase: {{ $phase->phase_name }}</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/background4.jpg'); /* Update with your background image */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: white; /* Default text color */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
            justify-content: flex-start; /* Start from the top */
            min-height: 100vh; /* Minimum height of the viewport */
            padding: 20px; /* Add some padding to prevent content from sticking to the edges */
            overflow: auto; /* Allow scrolling if content exceeds the viewport */
        }

        h1 {
            margin-bottom: 20px; /* Space below the heading */
            font-size: 36px; /* Size of the heading */
            text-align: center; /* Center the heading text */
            color: black; /* Change text color to black */
        }

        table {
            width: 80%; /* Table width */
            margin: 0 auto 30px; /* Center the table */
            border-collapse: collapse; /* Remove space between cells */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(200, 200, 200, 0.5)); /* White vignette background for the table */
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Prevent inner overflow */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Shadow for the table */
        }

        th, td {
            padding: 15px; /* Padding for table cells */
            text-align: left; /* Align text to the left */
            border-bottom: 1px solid rgba(0, 0, 0, 0.3); /* Separator lines */
            color: black; /* Text color for table cells */
            white-space: nowrap; /* Prevent text wrapping */
        }

        th {
            background-color: rgba(200, 200, 200, 0.7); /* Light gray background for header */
            color: black; /* Black text for header */
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Highlight row on hover */
        }

        /* Back to Phases Button Styles */
        .back-button {
            background-color: #4682B4; /* Button color */
            color: white; /* Text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding for button */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer on hover */
            transition: background-color 0.3s; /* Transition effect */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Align properly */
            margin-top: 20px; /* Space above the button */
        }

        .back-button:hover {
            background-color: #5F9EA0; /* Change button color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Users in Phase: {{ $phase->phase_name }}</h1>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <!-- Add other fields you may want to display -->
                </tr>
            </thead>
            <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="3">No users found in this phase.</td>
                    </tr>
                @else
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!-- Add other fields you may want to display -->
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a href="{{ route('phases.index') }}" class="back-button">Back to Phases</a>
    </div>
</body>
</html>
