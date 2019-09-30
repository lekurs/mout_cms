<?php


namespace App\Domain\DTO\Interfaces;


interface EditUserAdminDTOInterface
{
    /**
     * EditUserAdminDTOInterface constructor.
     *
     * @param string $email
     * @param string $role
     * @param bool $online
     * @param string|null $name
     * @param string|null $lastname
     */
    public function __construct(
        string $email,
        string $role,
        bool $online,
        string $name = null,
        string $lastname = null
    );
}
