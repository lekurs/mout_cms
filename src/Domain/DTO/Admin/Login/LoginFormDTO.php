<?php


namespace App\Domain\DTO\Admin\Login;


use App\Domain\DTO\Interfaces\LoginFormDTOInterface;

final class LoginFormDTO implements LoginFormDTOInterface
{
    public $username;

    public $password;

    /**
     * LoginFormDTO constructor.
     * @param $username
     * @param $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}
