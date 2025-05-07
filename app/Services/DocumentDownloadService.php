<?php

namespace App\Services;

use App\Repositories\DocumentDownloadRepository;

class DocumentDownloadService extends BaseService
{
    protected $documentDownloadRepository;
    public function __construct()
    {
        $this->documentDownloadRepository = app(DocumentDownloadRepository::class);
    }

    public function createMany(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            return $this->documentDownloadRepository->createMany($req);
        });
    }

    public function getByCode(string $code, int $idUser, string $orderCode)
    {
        return $this->tryThrow(function () use ($code, $idUser, $orderCode) {
            $res = $this->documentDownloadRepository->getByCode($code, $idUser, $orderCode);
            if (!$res) {
                throw new \Exception("Document not found or expired", 404);
            }
            $res->update([
                "download_time" => now(),
            ]);
            $res->save();
            return $res;
        });
    }
}
