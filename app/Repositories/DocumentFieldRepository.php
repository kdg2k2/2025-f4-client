<?php

namespace App\Repositories;

use App\Models\DocumentField;

class DocumentFieldRepository
{
    public function list(array $request)
    {
        return DocumentField::orderByDesc("id")->get()->toArray();
    }

    public function getField($id)
    {
        return DocumentField::where("id", $id)->first();
    }
}
