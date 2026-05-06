<?php

namespace App\Http\Controllers;

use App\Models\Product;

class QrController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.qr-generate', compact('products'));
    }

    /**
     * Проверяет доступность URL (аналог check-url.php).
     */
    public function checkUrl()
    {
        $url = trim(request()->query('url', ''));

        if (empty($url)) {
            return response()->json(['ok' => false, 'error' => 'URL не указан']);
        }

        $parsed = parse_url($url);
        if (
            !$parsed
            || !isset($parsed['scheme'])
            || !in_array($parsed['scheme'], ['http', 'https'])
            || empty($parsed['host'])
        ) {
            return response()->json(['ok' => false, 'error' => 'Некорректный формат ссылки']);
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_NOBODY         => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 5,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_CONNECTTIMEOUT => 8,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; NGH-QR-Checker/1.0)',
        ]);

        curl_exec($ch);
        $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($curlError) {
            return response()->json(['ok' => false, 'error' => 'Сайт недоступен: ' . $curlError]);
        }

        if ($httpCode >= 200 && $httpCode < 400 && $httpCode !== 0) {
            return response()->json(['ok' => true]);
        }

        return response()->json(['ok' => false, 'error' => 'Сайт не отвечает']);
    }
}
