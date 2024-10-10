<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phase Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-image: url('/images/background4.jpg'); /* Update with your background image */
            background-size: cover; /* Cover the entire page */
            background-position: center; /* Center the background image */
            color: white; /* Default text color */
            font-family: Arial, sans-serif; /* Font style */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
            justify-content: center; /* Center items vertically */
            min-height: 100vh; /* Full height */
            padding: 20px; /* Padding around the body */
        }

        h1 {
            margin-bottom: 20px; /* Space below the heading */
            font-size: 36px; /* Size of the heading */
            text-align: center; /* Center the heading text */
            color: black; /* Change heading color to black */
        }

        h2 {
            margin: 15px 0; /* Space above and below the subheading */
            font-size: 28px; /* Size of the subheading */
            color: black; /* Change subheading color to black */
        }

        ul {
            list-style-type: none; /* Remove default list styles */
            padding: 0; /* Remove padding */
        }

        li {
            margin: 10px 0; /* Space between list items */
            font-size: 20px; /* Font size for list items */
        }

        /* Back to Phases Overview Button */
        .back-button {
            margin-top: 20px; /* Space above the button */
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
    <h1>Phase: {{ $phase->name }}</h1>

    <h2>Users in this Phase:</h2>
    <ul>
        @foreach($phase->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

    <button class="back-button" onclick="window.location='{{ route('phases.index') }}'">Back to Phases Overview</button>
</body>
</html>
