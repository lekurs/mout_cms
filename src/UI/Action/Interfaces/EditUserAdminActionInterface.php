<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\EditUserAdminFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Responder\Interfaces\EditUserAdminResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface EditUserAdminActionInterface
{
    /**
     * EditUserAdminActionInterface constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param FormFactoryInterface $formFactory
     * @param EditUserAdminFormHandlerInterface $editUserHandler
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        FormFactoryInterface $formFactory,
        EditUserAdminFormHandlerInterface $editUserHandler
    );

    /**
     * @param Request $request
     * @param EditUserAdminResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, EditUserAdminResponderInterface $responder): Response;
}
