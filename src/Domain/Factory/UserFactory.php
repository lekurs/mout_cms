<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Models\Garage;
use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

final class UserFactory implements UserFactoryInterface
{
    private $encoderFactory;

    /**
     * UserFactory constructor.
     *
     * @param $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function create(
        string $username,
        string $password,
        string $roles,
        string $email,
        bool $online,
        string $slug,
        \DateTime $userRegistered,
        string $name = null,
        string $lastName = null
    ): User {
        $encoder = $this->encoderFactory->getEncoder(User::class);

        return new User(
            $username,
            $password,
            \Closure::fromCallable([$encoder, 'encodePassword']),
            $roles,
            $email,
            $online,
            $slug,
            new \DateTime(),
            $name = null,
            $lastName = null
        );
    }
}
