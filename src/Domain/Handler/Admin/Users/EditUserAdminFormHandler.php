<?php


namespace App\Domain\Handler\Admin\Users;


use App\Domain\Handler\Interfaces\EditUserAdminFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EditUserAdminFormHandler implements EditUserAdminFormHandlerInterface
{
    private $userRepository;

    private $session;

    private $validator;

    /**
     * EditUserAdminFormHandler constructor.
     *
     * @param $userRepository
     * @param $session
     * @param $validator
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->userRepository = $userRepository;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            return true;
        }

        return  false;
    }
}
