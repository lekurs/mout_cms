<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\AddNewUserFormHandlerInterfaces;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Responder\Interfaces\AddNewUserResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AddNewUserActionInterface
{
    /**
     * AddNewUserActionInterface constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param AddNewUserFormHandlerInterfaces $addUserHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        AddNewUserFormHandlerInterfaces $addUserHandler,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param AddNewUserResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, AddNewUserResponderInterface $responder): Response;
}
