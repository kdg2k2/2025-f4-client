<?php

namespace App\Repositories;

use App\Models\PackageUser;


class PackageUserRepository
{
    public function create(array $request)
    {
        return PackageUser::create($request);
    }
}
