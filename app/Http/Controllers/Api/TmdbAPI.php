<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class TmdbAPI extends Controller
{
    function getResponse($type, $id)
    {

        $apiKey = env('TMDB_API_KEY');
        $url = "https://api.themoviedb.org/3/$type/$id?api_key=$apiKey";

        try {
            $response = Http::get($url)->throw();
            return response()->json($response->json());
        } catch (RequestException $e) {
            return response()->json(['error' => 'Unable to fetch data', 'message' => $e->getMessage()], $e->response->status());
        }
    }
}
