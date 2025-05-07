<?php

namespace App\Repositories;

use App\Models\DocumentImage;

class DocumentImageRepository
{
    public function getByDocumentId($documentId)
    {
        return DocumentImage::where('document_id', $documentId)->get();
    }
}
