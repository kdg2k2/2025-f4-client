<?php

namespace App\Services;

use App\Repositories\DocumentRepository;

class DocumentService extends BaseService
{
    protected $documentRepository;
    public function __construct()
    {
        $this->documentRepository = app(DocumentRepository::class);
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
}
