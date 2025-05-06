<?php

namespace App\Services;

use App\Repositories\DocumentTypeRepository;

class DocumentTypeService extends BaseService
{
    protected $documentTypeRepository;
    public function __construct()
    {
        $this->documentTypeRepository = app(DocumentTypeRepository::class);
    }
    public function list(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->documentTypeRepository->list($req);
            if ($req["paginate"] == 1)
                $records = $this->paginate($records, $req["per_page"], $req["page"]);
            return $records;
        });
    }
}
