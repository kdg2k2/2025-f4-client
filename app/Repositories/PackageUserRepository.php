<?php

namespace App\Repositories;

use App\Models\PackageUser;
use Illuminate\Support\Facades\DB;

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
            ->where('end_date', '>=', $dateNow)->get();
    }

    public function decrease(int $idUser, int $value)
    {
        $dateNow = date('Y-m-d');
        return PackageUser::where('user_id', $idUser)
            ->where('end_date', '>=', $dateNow)
            ->where('downloads_remaining', '>', 0)
            ->update(['downloads_remaining' => DB::raw("downloads_remaining - $value")]);
    }
}
