<?php


namespace App\Domain\DTO\Admin\Users;


use App\Domain\DTO\Interfaces\EditUserAdminDTOInterface;

class EditUserAdminDTO implements EditUserAdminDTOInterface
{
    public $email;

    public $role;

    public $online;

    public $name;

    public $lastname;

    /**
     * EditUserAdminDTO constructor.
     * @param $email
     * @param $role
     * @param $online
     * @param $name
     * @param $lastname
     */
    public function __construct(
        string $email,
        string $role,
        bool $online,
        string $name = null,
        string $lastname = null
    ) {
        $this->email = $email;
        $this->role = $role;
        $this->online = $online;
        $this->name = $name;
        $this->lastname = $lastname;
    }
}
