<?php

namespace App\Services;

use App\Repositories\PackageUserRepository;

class PackageUserService extends BaseService
{
    protected $packageUserRepository;
    public function __construct()
    {
        $this->packageUserRepository = app(PackageUserRepository::class);
    }

    public function create(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            return $this->packageUserRepository->create($request);
        });
    }

    public function countUsed($idUser)
    {
        return $this->tryThrow(function () use ($idUser) {
            $data = $this->packageUserRepository->listActive($idUser);
            $count = array_reduce($data->toArray(), function ($carry, $item) {
                return $carry + $item['downloads_remaining'];
            }, 0);
            return $count;
        });
    }
}
