<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // Get all Posts
        $posts = Post::paginate();
        return PostResource::collection($posts);
    }

    public function store(CreatePostRequest $request) {
        // Create Post
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post) {
        // Update Post by uuid
        $post->update($request->validated());
        return new PostResource($post);
        
    }

    public function show(Post $post) {
        // Get Post by uuid
        return new PostResource($post);
    }

    public function destroy(Post $post) {
        // Delete a Post by uuid
        $post->delete();
        return response()->json(['message'=>'Post Deleted'], 200);
    }
}
