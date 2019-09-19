<?php


namespace App\UI\Action\Admin\Administration\Users;


use App\Domain\Form\Admin\Users\AddNewUserForm;
use App\Domain\Handler\Interfaces\AddNewUserFormHandlerInterfaces;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Action\Interfaces\AddNewUserActionInterface;
use App\UI\Responder\Interfaces\AddNewUserResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddNewUserAction
 * @Route(name="addUserAdminAction", path="/admin/utilisateur/add")
 */
class AddNewUserAction implements AddNewUserActionInterface
{
    private $userRepository;

    private $addUserHandler;

    private $formFactory;

    /**
     * AddNewUserAction constructor.
     *
     * @param $userRepository
     * @param $addUserHandler
     * @param $formFactory
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        AddNewUserFormHandlerInterfaces $addUserHandler,
        FormFactoryInterface $formFactory
    ) {
        $this->userRepository = $userRepository;
        $this->addUserHandler = $addUserHandler;
        $this->formFactory = $formFactory;
    }

    public function __invoke(Request $request, AddNewUserResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(AddNewUserForm::class)->handleRequest($request);

        if ($this->addUserHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}