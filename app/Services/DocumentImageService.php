<?php

namespace App\Services;

use App\Repositories\DocumentImageRepository;

class DocumentImageService extends BaseService
{
    protected $documentImageRepository;
    public function __construct()
    {
        $this->documentImageRepository = app(DocumentImageRepository::class);
    }

    public function getByDocumentId($documentId)
    {
        return $this->tryThrow(function () use ($documentId) {
            return $this->documentImageRepository->getByDocumentId($documentId);
        });
    }
}
