<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface EditUserAdminFormHandlerInterface
{
    /**
     * EditUserAdminFormHandlerInterface constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
