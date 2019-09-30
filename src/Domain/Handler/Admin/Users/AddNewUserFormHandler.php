<?php


namespace App\Domain\Handler\Admin\Users;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Handler\Interfaces\AddNewUserFormHandlerInterfaces;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddNewUserFormHandler implements AddNewUserFormHandlerInterfaces
{
    private $userRepository;

    private $userFactory;

    private $session;

    private $validator;

    private $slugHelper;

    /**
     * AddNewUserFormHandler constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserFactoryInterface $userFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param $slugHelper
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        UserFactoryInterface $userFactory,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper
    ) {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugHelper = $slugHelper;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

//            dd($form->getData());
            $user = $this->userFactory->create(
                $form->getData()->username,
                $form->getData()->password,
                $form->getData()->role,
                $form->getData()->email,
                $form->getData()->online,
                $this->slugHelper->replace($form->getData()->username),
                new \DateTime(),
                $form->getData()->name,
                $form->getData()->lastname
            );

            $this->userRepository->save($user);

            $this->session->getFlashBag()->add('success', 'Utilisateur ajouté');

            return  true;
        }

        return false;
    }
}
