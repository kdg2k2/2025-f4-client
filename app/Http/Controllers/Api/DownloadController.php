<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DocumentDownloadService;
use App\Services\DocumentService;
use Illuminate\Http\Request;

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
            $originalPath = storage_path("app/public/{$documentDownload->document->path}");

            // Tạo đường dẫn tạm
            $tempFilename = uniqid('temp_') . '_' . basename($documentDownload->document->path);
            $tempPath = storage_path("app/temp_downloads/{$tempFilename}");


            // Đảm bảo thư mục tồn tại
            if (!file_exists(dirname($tempPath))) {
                mkdir(dirname($tempPath), 0755, true);
            }

            // Copy file sang đường dẫn tạm
            copy($originalPath, $tempPath);

            // Tăng lượt tải xuống
            $this->documentService->incrementDownloadCount($documentDownload->document_id);
            // Trả file tạm về client
            return response()->download($tempPath)->deleteFileAfterSend(true);
        });
    }

}
