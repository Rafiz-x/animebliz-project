<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function selectPost(Request $req)
    {
        $query = Post::query();

        if ($req->filled('search')) {
            $search = $req->input('search');
            $query->where('title', 'LIKE', "{$search}%");
        }

        if ($req->filled('filter')) {
            $filter = $req->input('filter');

            $publishArr = ['published', 'not_published'];

            if (in_array($filter, $publishArr)) {
                if ($filter == 'published') {
                    $query->where('publish', 1);
                } else {
                    $query->where('publish', 0);
                }
            } else if ($filter == 'my_creations') {
                $adminID = Auth::guard('admin')->id();
                $query->where('who_created', $adminID);
            } else {
                $order = 'asc';

                if (strpos($filter, '_asc') !== false) {
                    $column = str_replace('_asc', '', $filter);
                } elseif (strpos($filter, '_desc') !== false) {
                    $column = str_replace('_desc', '', $filter);
                    $order = 'desc';
                } else {
                    return response()->json(['msg' => 'Invalid filter value'], 400);
                }
                $query->orderBy($column, $order);
            }
        } else {
            // Default Order By
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(10);

        if ($req->ajax()) {
            $filteredPost = view('components.link-post-select', ['posts' => $posts])->render();
            return response()->json(['html' => $filteredPost]);
        }
        return view('admin.links.selectPost', compact('posts'));
    }


    public function postLinks($slug)
    {
        $post = Post::where('slug', $slug)->get();

        if ($post->isEmpty()) {
            abort(404);
        }

        $post =  $post->first();
        $postID = $post->id;

        $links = Link::where('post_id', $postID)->get();


        return view('admin.links.postLinks', compact('post', 'links'));
    }

    public function handlePostLinks(Request $req)
    {
        // Custom rule to check if the array length is greater than 0
        Validator::extend('array_length_greater_than_zero', function ($attribute, $value, $parameters, $validator) {
            return is_array($value) && count($value) > 0;
        });

        // Check if link_name and link_url fields exist in the request
        if (!$req->has('link_name') || !$req->has('link_url')) {
            // If either link_name or link_url is missing, delete all links for the post
            $postId = $req->input('post_id');
            if ($postId) {
                Link::where('post_id', $postId)->delete();
                return response()->json([
                    'success' => true,
                    'msg' => 'Saved Successfully.'
                ]);
            } else {
                return response()->json(['error' => 'Post ID not found!'], 422);
            }
        }

        $rules = [
            'post_id' => 'required|exists:posts,id',
            'link_name' => 'required|array|array_length_greater_than_zero',
            'link_name.*' => 'required|string',
            'link_url' => 'required|array|array_length_greater_than_zero',
            'link_url.*' => 'required|url',
            'link_type' => 'nullable|array',
            'link_type.*' => 'nullable|string',
            'link_lang' => 'nullable|array',
            'link_lang.*' => 'nullable|string',
            'link_quality' => 'nullable|array',
            'link_quality.*' => 'nullable|string',
        ];

        $messages = [
            'link_name.required' => 'The link names field must have at least one item.',
            'link_name.array_length_greater_than_zero' => 'The link names field must have at least one item.',
            'link_name.*.required' => 'Link Name (:position) is required.',
            'link_name.*.string' => 'Link Name (:position) must be a string.',
            'link_url.required' => 'The link URLs field must have at least one item.',
            'link_url.array_length_greater_than_zero' => 'The link URLs field must have at least one item.',
            'link_url.*.required' => 'Link URL (:position) is required.',
            'link_url.*.url' => 'Link URL (:position) must be a valid URL.',
            // Add other custom messages for link_type, link_lang, and link_quality if needed
        ];

        // Custom replacer for position
        Validator::replacer('required', function ($message, $attribute, $rule, $parameters) {
            if (preg_match('/\.\d+/', $attribute, $matches)) {
                $position = (int)str_replace('.', '', $matches[0]) + 1;
                $message = str_replace(':position', $position, $message);
            }
            return $message;
        });

        Validator::replacer('url', function ($message, $attribute, $rule, $parameters) {
            if (preg_match('/\.\d+/', $attribute, $matches)) {
                $position = (int)str_replace('.', '', $matches[0]) + 1;
                $message = str_replace(':position', $position, $message);
            }
            return $message;
        });

        // Validate the request data
        $validator = Validator::make($req->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get validated data
        $validatedData = $validator->validated();

        $postId = $validatedData['post_id'];
        $linkNames = $validatedData['link_name'];
        $linkUrls = $validatedData['link_url'];
        $linkTypes = $validatedData['link_type'] ?? [];
        $linkLangs = $validatedData['link_lang'] ?? [];
        $linkQualities = $validatedData['link_quality'] ?? [];

        // Delete all existing links for the post
        Link::where('post_id', $postId)->delete();

        // Loop through each link and create a new record in the database
        foreach ($linkNames as $index => $linkName) {
            $link = new Link();
            $link->post_id = $postId;
            $link->name = $linkName;
            $link->url = $linkUrls[$index];
            $link->type = $linkTypes[$index] ?? 'Unknown';
            $link->language = $linkLangs[$index] ?? 'Unknown';
            $link->quality = $linkQualities[$index] ?? 'Unknown';
            $link->save();
        }

        // Redirect back with a success message
        return response()->json([
            'success' => true,
            'msg' => 'Links added successfully!'
        ]);
    }
}
