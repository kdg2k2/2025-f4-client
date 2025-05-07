<?php

namespace App\Repositories;

use App\Models\PackageUser;


class PackageUserRepository
{
    public function create(array $request)
    {
        return PackageUser::create($request);
    }

    public function listActive($idUser)
    {
        $dateNow = date('Y-m-d');
        return PackageUser::where('user_id', $idUser)
            ->where('end_date', '>=', $dateNow);
    }
}
