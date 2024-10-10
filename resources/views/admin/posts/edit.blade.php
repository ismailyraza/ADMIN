<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            background-image: url('/images/background4.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: black;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 36px;
            text-align: center;
            color: black;
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
            color: black;
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
            color: black;
        }

        .submit-button,
        .back-button {
            background-color: #4682B4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 10px;
        }

        .submit-button:hover,
        .back-button:hover {
            background-color: #5F9EA0;
        }

        .success-message {
            color: green;
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Edit Post</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Back to Dashboard Button -->
    <a href="{{ route('dashboard') }}" class="back-button">Back to Dashboard</a>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Make sure to use PUT method for updating -->

        <label for="title">Title</label>
        <input type="text" name="title" id="title" required value="{{ old('title', $post->title) }}">

        <label for="description">Description</label>
        <textarea name="description" id="description" required>{{ old('description', $post->description) }}</textarea>

        <label for="content">Content</label>
        <textarea name="content" id="content" required>{{ old('content', $post->content) }}</textarea>

        <label for="cover_image">Cover Image</label>
        <input type="file" name="cover_image" id="cover_image" accept="image/*">

        <label for="phase_id">Phase</label>
        <select name="phase_id" id="phase_id" required>
            <option value="">Select a phase</option>
            @foreach ($phases as $phase)
                <option value="{{ $phase->id }}" {{ old('phase_id', $post->phase_id) == $phase->id ? 'selected' : '' }}>
                    {{ $phase->name }}
                </option>
            @endforeach
        </select>

        <label for="type">Type</label>
        <input type="text" name="type" id="type" required value="{{ old('type', $post->type) }}">

        <label for="tags">Tags</label>
        <input type="text" name="tags" id="tags" value="{{ old('tags', $post->tags) }}">

        <label for="event_date">Event Date</label>
        <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $post->event_date) }}">

        <label for="location">Location</label>
        <input type="text" name="location" id="location" value="{{ old('location', $post->location) }}">

        <label for="latitude">Latitude</label>
        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $post->latitude) }}">

        <label for="longitude">Longitude</label>
        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $post->longitude) }}">

        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ old('price', $post->price) }}">

        <button type="submit" class="submit-button">Update Post</button>
    </form>
</body>
</html>
