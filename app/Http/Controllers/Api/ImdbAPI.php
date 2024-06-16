<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Hooshid\ImdbScraper\Title;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;

class ImdbAPI extends Controller
{
    public function check($id){
        $res = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0',
        ])->get('https://www.imdb.com/title/tt1872181/');
        return response()->json(['success'=>true], $res->status());
    }
    public function scrapeData($id)
    {
        try {
            // Remove the 'tt' prefix from the IMDB ID
            $imdbId = str_replace('tt', '', $id);

            // Define the cache key
            $cacheKey = 'post_' . $imdbId;

            // Check if the post details are already cached
            if (Cache::has($cacheKey)) {
                $post = Cache::get($cacheKey);
            } else {
                // Fetch post details using the Title class
                $title = new Title($imdbId);
                $post = $title->full();

                if (!$post) {
                    // If post is not found, return a 404 response
                    return response()->json([
                        'success' => false,
                        'msg' => 'Post not found'
                    ], 404);
                }

                // Store the post details in the cache for 3 Days
                Cache::put($cacheKey, $post, now()->addDays(3));
            }

            // Return the post details
            return response()->json([
                'success' => true,
                'data' => $post
            ]);

        } catch (Exception $e) {
            // Handle any other exceptions and return a 500 response
            return response()->json([
                'success' => false,
                'msg' => 'Unknown error occurred',
                'error' => $e->getMessage()  // Optionally include error message for debugging
            ], 500);
        }
    }
}
