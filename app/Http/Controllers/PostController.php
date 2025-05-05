<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Events\NewPostSent;

class PostController extends Controller
{
    public function upload(Request $request) {
        $rules = [
            'file' => 'present',
            'name' => 'required|string|max:16|min:4'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        else {
            // $file = $request->file;
            // $name = $file->hashName();
            // $extension = $file->extension();
            // $post = new Post();
            // $post->filename = $name;
            // $post->save();
            // Storage::disk('public')->putFileAs('/', $request->file, $post->filename);
            event(new NewPostSent($request->name));
            return response()->json([
                'success' => true,
                'filename' => $request->name //$post->filename
            ], 200);
        }
    }
    public function download($file_id) {
        $file_name = Post::where('id', $file_id)->first();
        if($file_name->count()) {
            return Storage::disk('public')->download($file_name->filename);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ], 404);
        }
    }
    public function show($file_id) {
        $file_name = Post::where('id', $file_id)->first();
        if($file_name->count()) {
            $file_name = $file_name->filename;
            return response()->file(Storage::disk('public')->path($file_name));
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ], 404);
        }
    }
}
