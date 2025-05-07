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
}
