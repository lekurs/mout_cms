<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\User;

interface UserFactoryInterface
{
    public function create(
        string $username,
        string $password,
        string $roles,
        string $email,
        bool $online,
        string $slug,
        \DateTime $userRegitered,
        string $name = null,
        string $lastName = null
    ): User;
}
