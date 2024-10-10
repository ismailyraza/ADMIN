<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Phase; // Assuming Phase model exists
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display the form to create a post
    public function create()
    {
        // Fetch available phases to display in the dropdown
        $phases = Phase::all();
        return view('admin.posts.create', compact('phases')); // Updated view path
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $this->validatePost($request);

        // Handle file upload for cover image
        $coverImagePath = $this->handleImageUpload($request);

        // Create a new post instance
        $post = new Post();
        $post->fill($request->all());
        $post->cover_image = $coverImagePath;

        // Save the post to the database
        $post->save();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Display a listing of the posts
    public function index()
    {
        // Fetch all posts along with their related phase
        $posts = Post::with('phase')->latest()->get();
        return view('admin.posts.index', compact('posts')); // Updated view path
    }

    // Show the form for editing the specified post
    public function edit(Post $post)
    {
        // Fetch available phases to display in the dropdown
        $phases = Phase::all();
        return view('admin.posts.edit', compact('post', 'phases')); // Updated view path
    }

    // Update the specified post in the database
    public function update(Request $request, Post $post)
    {
        $this->validatePost($request);

        // Handle file upload for cover image if a new image is provided
        $coverImagePath = $this->handleImageUpload($request, $post->cover_image);
        $post->cover_image = $coverImagePath;

        // Update post attributes
        $post->fill($request->all());

        // Save the updated post to the database
        $post->save();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    // Remove the specified post from the database
    public function destroy(Post $post)
    {
        // Delete the cover image if necessary
        if ($post->cover_image) {
            \Storage::disk('public')->delete($post->cover_image);
        }

        // Delete the post
        $post->delete();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    // Validate incoming request data
    protected function validatePost(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phase_id' => 'required|exists:phases,id',
            'type' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'price' => 'nullable|numeric|min:0',
        ]);
    }

    // Handle file upload for cover image
    protected function handleImageUpload(Request $request, $existingImagePath = null)
    {
        if ($request->hasFile('cover_image')) {
            if ($existingImagePath) {
                \Storage::disk('public')->delete($existingImagePath);
            }
            return $request->file('cover_image')->store('cover_images', 'public');
        }
        return $existingImagePath;
    }
}
