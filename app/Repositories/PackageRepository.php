<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository
{
    public function getById(int $id)
    {
        return Package::find($id);
    }
}
