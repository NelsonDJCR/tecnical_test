<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchApiData()
    {
        $apiKey = config('app.api_key');
        $response = Http::get("https://api.example.com/data", [
            'api_key' => $apiKey,
            // Add any other required query parameters
        ]);

        if ($response->successful()) {
            // API call was successful
            $data = $response->json(); // Convert the response to a JSON object or array
            // Process the data as needed
        } else {
            // Handle the error
            $errorCode = $response->status();
            $errorMessage = $response->json(); // If the error response is in JSON format
            // Handle the error accordingly
        }
    }
}
