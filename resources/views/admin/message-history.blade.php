<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message History</title>
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
            justify-content: center; /* Center items vertically */
            height: 100vh;
        }

        h1 {
            margin-bottom: 20px; /* Space below the heading */
            font-size: 36px; /* Size of the heading */
            text-align: center; /* Center the heading text */
            color: black; /* Change text color to black */
        }

        table {
            width: 80%; /* Table width */
            margin-bottom: 30px; /* Space below the table */
            border-collapse: collapse; /* Remove space between cells */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(200, 200, 200, 0.5)); /* White vignet background for the table */
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Prevent inner overflow */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Shadow for the table */
        }

        th, td {
            padding: 15px; /* Padding for table cells */
            text-align: left; /* Align text to the left */
            border-bottom: 1px solid rgba(0, 0, 0, 0.3); /* Separator lines */
            color: black; /* Text color for table cells */
        }

        th {
            background-color: rgba(200, 200, 200, 0.7); /* Light gray background for header */
            color: black; /* Black text for header */
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Highlight row on hover */
        }

        /* Back to Dashboard Button Styles */
        .back-button {
            background-color: #4682B4; /* Button color */
            color: white; /* Text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding for button */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer on hover */
            transition: background-color 0.3s; /* Transition effect */
        }

        .back-button:hover {
            background-color: #5F9EA0; /* Change button color on hover */
        }
    </style>
</head>
<body>
    <h1>Message History</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Group</th>
                <th>Phase</th>
                <th>Message</th>
                <th>Sent At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->user->email }}</td>
                    <td>{{ $message->group->name }}</td>
                    <td>{{ $message->phase->name }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Back to Dashboard Button -->
    <form action="{{ route('dashboard') }}" method="GET">
        <button type="submit" class="back-button">Back to Dashboard</button>
    </form>
</body>
</html>
