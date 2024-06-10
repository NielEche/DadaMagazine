<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        // Replace 'YOUR_API_KEY' with the actual API key
        $apiKey = 'a7907aee44bb425f96ea62c1ba226ec5';

        // ARTLOGIC API URL for testing
        $apiUrl = 'https://app.artlogic.net/dadagallery/public/api/mailings/signup';

        $client = new Client();

        try {
            // Make a POST request to the ARTLOGIC API endpoint with form data and API key
            $response = $client->post($apiUrl, [
                'form_params' => [
                    'api_key' => $apiKey,
                    'email' => $request->input('email'),
                    // Include other required parameters based on ARTLOGIC API documentation
                ],
            ]);

            // Process the API response as needed
            $responseData = json_decode($response->getBody(), true);

            $jsonString = json_encode($responseData);

            // Add the string to the session with a 'success' key
            session()->flash('success', $jsonString);
    
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection error, API error)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
