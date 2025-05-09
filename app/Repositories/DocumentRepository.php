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
            ->when(isset($request["field_id"]), function ($query) use ($request) {
                $query->whereHas("type.field", function ($query) use ($request) {
                    $query->where("id", $request["field_id"]);
                });
            })
            ->with("type.field")
            ->orderByDesc("id")->get()->toArray();
    }

    public function getById($id)
    {
        return Document::with("type.field")->findOrFail($id);
    }

    public function incrementDownloadCount($id)
    {
        return Document::where("id", $id)->increment("download_count");
    }
}
