<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function list(array $request)
    {
        return User::orderByDesc("id")->get()->toArray();
    }

    public function store(array $request)
    {
        $record = User::create($request);
        return $record->toArray();
    }

    public function update(array $request, $removeOldPath)
    {
        $record = User::find($request["id"]);

        if ($removeOldPath == true && !empty($record->path))
            if (file_exists(public_path($record->path)))
                unlink(public_path($record->path));

        $record->update($request);
        return $record->toArray();
    }

    public function delete(array $request)
    {
        return User::find($request["id"])->delete();
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function findByEmail(string $email)
    {
        return User::where("email", $email)->first();
    }

    public function findByResetPasswordCode(string $code)
    {
        return User::where('password_reset_code', $code)->first();
    }
}
