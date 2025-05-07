<?php

namespace App\Services;

use App\Repositories\PackageRepository;

class PackageService extends BaseService
{
    protected $packageRepository;
    public function __construct()
    {
        $this->packageRepository = app(PackageRepository::class);
    }

    public function getById(int $id)
    {
        return $this->tryThrow(function () use ($id) {
            return $this->packageRepository->getById($id);
        });
    }
}
