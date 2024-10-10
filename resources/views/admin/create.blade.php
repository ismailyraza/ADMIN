<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <style>
        body {
            background-image: url('/images/background4.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: black; /* Change text color to black */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 36px;
            text-align: center;
            color: black; /* Ensure header text is black */
        }

        form {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 80%;
        }

        label {
            margin-top: 10px;
            display: block;
            color: black; /* Ensure labels are black */
        }

        input[type="text"],
        textarea,
        input[type="file"],
        select,
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            color: black; /* Change input text color to black */
        }

        .submit-button {
            background-color: #4682B4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #5F9EA0;
        }

        .success-message {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Create New Post</h1>
    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>

        <label for="content">Content</label>
        <textarea name="content" id="content" required></textarea>

        <label for="cover_image">Cover Image</label>
        <input type="file" name="cover_image" id="cover_image" accept="image/*" required>

        <label for="phase_id">Phase</label>
        <select name="phase_id" id="phase_id" required>
            <option value="">Select a phase</option>
            @foreach ($phases as $phase)
                <option value="{{ $phase->id }}">{{ $phase->name }}</option>
            @endforeach
        </select>

        <label for="type">Post Type</label>
        <input type="text" name="type" id="type" required> <!-- New Type Field -->

        <label for="tags">Tags</label>
        <input type="text" name="tags" id="tags">

        <label for="event_date">Event Date</label>
        <input type="date" name="event_date" id="event_date">

        <label for="event_time">Event Time</label>
        <input type="time" name="event_time" id="event_time">

        <label for="location">Location</label>
        <input type="text" name="location" id="location">

        <label for="latitude">Latitude</label>
        <input type="text" name="latitude" id="latitude">

        <label for="longitude">Longitude</label>
        <input type="text" name="longitude" id="longitude">

        <label for="price">Price</label>
        <input type="text" name="price" id="price">

        <button type="submit" class="submit-button">Create Post</button>
    </form>
</body>
</html>
