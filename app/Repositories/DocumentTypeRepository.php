<?php

namespace App\Repositories;

use App\Models\DocumentType;

class DocumentTypeRepository
{
    public function list(array $request)
    {
        return DocumentType::orderByDesc("id")
            ->when(isset($request["field_id"]), function ($query) use ($request) {
                $query->where("field_id", $request["field_id"]);
            })
            ->get()->toArray();
    }
}
