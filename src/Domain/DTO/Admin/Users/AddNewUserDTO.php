<?php


namespace App\Domain\DTO\Admin\Users;


use App\Domain\DTO\Interfaces\AddNewUserDTOInterface;

class AddNewUserDTO implements AddNewUserDTOInterface
{
    public $username;

    public $password;

    public $email;

    public $role;

    public $online;

    public $registration;

    public $name;

    public $lastname;


    /**
     * AddNewUserDTO constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $role
     * @param bool $online
     * @param string $name
     * @param string $lastname
     */
    public function __construct(
        string $username,
        string $password,
        string $email,
        string $role,
        bool $online,
        string $name = null,
        string $lastname= null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->online = $online;
        $this->name = $name;
        $this->lastname = $lastname;
    }
}
