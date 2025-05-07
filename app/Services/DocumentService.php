<?php

namespace App\Services;

use App\Repositories\DocumentRepository;

class DocumentService extends BaseService
{
    protected $documentRepository;
    protected $documentImageService;
    public function __construct()
    {
        $this->documentRepository = app(DocumentRepository::class);
        $this->documentImageService = app(DocumentImageService::class);
    }
    public function list(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->documentRepository->list($req);
            if ($req["paginate"] == 1)
                $records = $this->paginate($records, $req["per_page"], $req["page"]);
            return $records;
        });
    }

    public function view($id)
    {
        return $this->tryThrow(function () use ($id) {
            $document = $this->documentRepository->getById($id);
            $images = $this->documentImageService->getByDocumentId($id);
            return [
                "document" => $document,
                "images" => $images,
            ];
        });
    }

    public function incrementDownloadCount($id)
    {
        return $this->tryThrow(function () use ($id) {
            return $this->documentRepository->incrementDownloadCount($id);
        });
    }
}
