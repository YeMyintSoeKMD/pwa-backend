<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $blogs = BlogResource::collection(Blog::latest()->get());
            return $this->successResponse($blogs);
        } catch (Exception $e) {
            return $this->failsResponse('Failed to retrieve blogs', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'body' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $validator->messages();
            }

            // Create a new blog
            $blog = Blog::create([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            return $this->successResponse($blog, 201);
        } catch (Exception $e) {
            return $this->failsResponse('Failed to create blog', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $blog = new BlogResource(Blog::findOrFail($id));
            return $this->successResponse($blog);
        } catch (Exception $e) {
            return $this->failsResponse('Failed to retrieve blog', $e->getMessage(), 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'body' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $validator->messages();
            }

            // Find the blog
            $blog = Blog::findOrFail($id);
            // Update blog
            $blog->update([
                'title' => $request->title,
                'body' => $request->body
            ]);

            return $this->successResponse($blog);
        } catch (Exception $e) {
            return $this->failsResponse('Failed to update blog', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();

            return $this->successResponse(null);
        } catch (Exception $e) {
            return $this->failsResponse('Failed to delete blog', $e->getMessage());
        }
    }
}
