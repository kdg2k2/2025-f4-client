<?php

namespace App\Repositories;

use App\Models\Package;

class UpgradeRepository
{
    public function list(array $request)
    {
        return Package::all();
    }

    public function find(int $id)
    {
        return Package::findOrFail($id);
    }
}
