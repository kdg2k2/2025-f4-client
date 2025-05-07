<?php

namespace App\Repositories;

use App\Models\DocumentDownload;

class DocumentDownloadRepository
{
    public function createMany(array $req)
    {
        return DocumentDownload::insert($req);
    }

    public function getByCode(string $code, int $idUser, string $orderCode)
    {
        return DocumentDownload::where("code", $code)
            ->where("expires_at", ">=", now())
            ->with("document")
            ->with("order", function ($query) use ($orderCode, $idUser) {
                $query->whereIn("status", ["paid", "complete"]);
                $query->where("order_code", $orderCode);
                $query->where("user_id", $idUser);
            })
            ->first();
    }

    public function update(array $data, int $id)
    {
        return DocumentDownload::where("id", $id)->update($data);
    }
}
