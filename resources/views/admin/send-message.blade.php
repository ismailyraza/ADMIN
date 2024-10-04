<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/background4.jpg'); /* Update with your background image */
            background-size: cover; /* Cover the entire page */
            background-position: center; /* Center the background image */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
            justify-content: center; /* Center items vertically */
            min-height: 100vh; /* Full height */
            padding: 20px; /* Padding around the body */
            color: white; /* Default text color */
        }

        h1 {
            margin-bottom: 20px; /* Space below the heading */
            font-size: 36px; /* Size of the heading */
            text-align: center; /* Center the heading text */
            color: black; /* Change heading color to black */
        }

        form {
            background-color: rgba(255, 255, 255, 0.9); /* White background for the form with transparency */
            padding: 20px; /* Padding inside the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Shadow for the form */
            width: 100%; /* Full width */
            max-width: 600px; /* Max width of the form */
        }

        label {
            display: block; /* Labels on new lines */
            margin: 10px 0 5px; /* Margin for labels */
            color: #333; /* Label text color */
        }

        select, textarea {
            width: 100%; /* Full width for inputs */
            padding: 10px; /* Padding for inputs */
            margin-bottom: 15px; /* Space below inputs */
            border: 1px solid #ccc; /* Border for inputs */
            border-radius: 5px; /* Rounded corners for inputs */
        }

        /* Styling for the dropdowns to be side by side */
        .dropdown-container {
            display: flex; /* Flexbox layout for dropdowns */
            justify-content: space-between; /* Space between dropdowns */
            gap: 10px; /* Space between dropdowns */
        }

        .dropdown-container select {
            flex: 1; /* Make dropdowns take equal space */
        }

        button {
            background-color: #4682B4; /* Button color */
            color: white; /* Text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding for button */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer on hover */
            transition: background-color 0.3s; /* Transition effect */
            margin-top: 10px; /* Space above the button */
        }

        button:hover {
            background-color: #5F9EA0; /* Change button color on hover */
        }

        /* Success message styling */
        .success-message {
            margin: 20px 0; /* Space around success message */
            color: green; /* Color for success message */
            text-align: center; /* Center the message */
        }

        /* Back to Dashboard Button */
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
    <h1>Send Message</h1>
    <form method="POST" action="/admin/send-message">
        @csrf
        <div class="dropdown-container">
            <div>
                <label for="group_id">Select Group:</label>
                <select name="group_id" required>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="phase_id">Select Phase:</label>
                <select name="phase_id" required>
                    @foreach($phases as $phase)
                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label for="message">Message:</label>
        <textarea name="message" required></textarea>

        <button type="submit">Send Message</button>
    </form>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <!-- Back to Dashboard Button -->
    <button class="back-button" onclick="window.location='{{ route('dashboard') }}'">Back to Dashboard</button>
</body>
</html>
