<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DocumentDownloadService;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    protected $documentDownloadService;
    protected $documentService;
    public function __construct()
    {
        $this->documentDownloadService = app(DocumentDownloadService::class);
        $this->documentService = app(DocumentService::class);
    }
    public function downloadDocument(Request $request)
    {
        return $this->catchAPI(function () use ($request) {
            $code = $request->code;
            $userId = auth('api')->user()->id;
            $orderCode = $request->orderCode;

            $documentDownload = $this->documentDownloadService->getByCode($code, $userId, $orderCode);

            $response = Http::get('http://127.0.0.1:8001/api/document/download', [
                'document_id' => $documentDownload->id
            ]);

            $realUrl = $response->json(); // giả sử trả về string URL

            // Tạo token tạm
            $tempToken = Str::uuid()->toString();

            // Lưu vào cache trong 5 phút
            Cache::put("temp_download_{$tempToken}", $realUrl, now()->addMinutes(1));

            // Trả về link tạm
            return redirect()->route('tempDownload', ['token' => $tempToken]);
        });
    }

    public function tempDownload($token)
    {
        $url = Cache::get("temp_download_{$token}");
        if (!$url) {
            return response()->json(['message' => 'Link expired or invalid'], 404);
        }

        // Tải file từ URL thật
        $fileResponse = Http::get($url);
        $filename = basename(parse_url($url, PHP_URL_PATH));

        return response($fileResponse->body(), 200)
            ->header('Content-Type', $fileResponse->header('Content-Type') ?? 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

}
