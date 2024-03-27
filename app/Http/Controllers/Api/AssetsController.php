<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use Exception;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AssetsController extends Controller
{
    private static string $base_url = 'https://api.binance.com/api/v3';

    public function getAssets(Request $request)
    {
        try {
            $currencies = Assets::all();

            $responses = Http::pool(function (Pool $pool) use ($currencies) {
                foreach ($currencies as $currency) {
                    $pool->get(self::$base_url . "/ticker?symbol=$currency->api_code");
                }
            });

            $response = ['data' => []];

            foreach ($responses as $index => $resp) {
                $response['data'][$index] = $currencies[$index];
                $response['data'][$index]['info'] = $resp->collect();
            }

            return response()->json($response);
        } catch (Exception) {
            return response()->json([
                'error' => 'Failed to fetch data'
            ], 500);
        }
    }
}
