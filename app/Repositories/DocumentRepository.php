<?php

namespace App\Repositories;

use App\Models\Document;

class DocumentRepository
{
    public function list(array $request)
    {
        return Document::when(isset($request["type_id"]), function ($query) use ($request) {
                $query->where("type_id", $request["type_id"]);
            })
            ->with("type.field")
            ->orderByDesc("id")->get()->toArray();
    }
}
