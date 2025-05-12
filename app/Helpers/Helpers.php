<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Helpers
{
    public static function cacheData($nameCache, $token, $url, $queryParams = [], $time = 60 * 60, $pagination = false)
    {
        // Tạo cache key động dựa trên nameCache, url và queryParams
        $cacheKey = $nameCache . '_' . md5($url . json_encode($queryParams));
        // Cache::forget($cacheKey);
        $data = Cache::remember($cacheKey, $time, function () use ($token, $url, $pagination) {
            $res = Http::withToken($token)->get($url);
            if ($res->successful()) {
                $responseData = $res->json();
                return $pagination ? $responseData : (isset($responseData['data']) && is_array($responseData['data']) ? $responseData['data'] : []);
            } else {
                return [];
            }
        });
        return $data;
    }

    public static function getToken($main_url, $client_id, $client_secret)
    {
        $tokenData = Cache::get('api_token_vexere');

        if (!$tokenData || !isset($tokenData['expires_at']) || $tokenData['expires_at'] <= now()) {
            try {
                $response = Http::asForm()->post($main_url . "/v3/token", [
                    'grant_type' => 'client_credentials',
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                ]);

                if ($response->successful()) {
                    $tokenData = $response->json();
                    $expiresAt = now()->addSeconds($tokenData['expires_in']);
                    Cache::put('api_token_vexere', [
                        'token' => $tokenData['access_token'],
                        'expires_at' => $expiresAt,
                    ], $tokenData['expires_in']);

                    return $tokenData['access_token'];
                }
            } catch (\Exception $e) {
                return null;
            }
            return null;
        }

        return $tokenData['token'];
    }

}
