<?php


namespace App\Domain\DTO\Interfaces;


interface LoginFormDTOInterface
{
    /**
     * LoginFormDTOInterface constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password);
}
