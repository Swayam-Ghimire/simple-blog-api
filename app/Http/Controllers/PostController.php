<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Get all Posts
        $posts = Post::paginate();
        return PostResource::collection($posts);
    }

    public function store(CreatePostRequest $request)
    {
        // Create Post
        $post = $request->user()->posts()->create($request->validated());
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        // Update Post by uuid
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post does not exist!'], 404);
        }
        $post->update($request->validated());
        return new PostResource($post);
    }

    public function show(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post does not exist!'], 404);
        }

        return new PostResource($post);
    }


    public function destroy(Post $post)
    {
        // Delete a Post by uuid
        $post->delete();
        return response()->json(['message' => 'Post Deleted'], 200);
    }
}
