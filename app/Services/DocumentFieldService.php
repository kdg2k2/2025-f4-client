<?php

namespace App\Services;

use App\Repositories\DocumentFieldRepository;

class DocumentFieldService extends BaseService
{
    protected $documentFieldRepository;
    public function __construct()
    {
        $this->documentFieldRepository = app(DocumentFieldRepository::class);
    }
    public function list(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->documentFieldRepository->list($req);
            if ($req["paginate"] == 1)
                $records = $this->paginate($records, $req["per_page"], $req["page"]);
            return $records;
        });
    }
    public function getField($id)
    {
        return $this->tryThrow(function () use ($id) {
            return $this->documentFieldRepository->getField($id);
        });
    }

    public function getAll()
    {
        return $this->documentFieldRepository->getAll();
    }

    public function getIdBySlug($slug)
    {
        return $this->documentFieldRepository->getIdBySlug($slug);
    }
}
