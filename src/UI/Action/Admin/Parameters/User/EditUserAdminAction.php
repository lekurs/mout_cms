<?php


namespace App\UI\Action\Admin\Parameters\User;


use App\Domain\DTO\Admin\Users\EditUserAdminDTO;
use App\Domain\Form\Admin\Users\EditUserAdminForm;
use App\Domain\Handler\Interfaces\EditUserAdminFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Action\Interfaces\EditUserAdminActionInterface;
use App\UI\Responder\Interfaces\EditUserAdminResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EditUserAdminAction
 * @Route(name="editUserAdmin", path="/admin/utilisateur/edit/{slug}")
 */
class EditUserAdminAction implements EditUserAdminActionInterface
{
    private $userRepository;

    private $formFactory;

    private $editUserHandler;

    /**
     * EditUserAdminAction constructor.
     * @param $userRepository
     * @param $formFactory
     * @param $editUserHandler
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        FormFactoryInterface $formFactory,
        EditUserAdminFormHandlerInterface $editUserHandler
    ) {
        $this->userRepository = $userRepository;
        $this->formFactory = $formFactory;
        $this->editUserHandler = $editUserHandler;
    }

    public function __invoke(Request $request, EditUserAdminResponderInterface $responder): Response
    {
        $user = $this->userRepository->getOneBySlug($request->attributes->get('slug'));

        $userEditDTO = new EditUserAdminDTO(
            $user->getEmail(),
            $user->getRoles(),
            $user->getOnline(),
            $user->getName(),
            $user->getLastName()
        );

        $form = $this->formFactory->create(EditUserAdminForm::class, $userEditDTO);

        if ($this->editUserHandler->handle($form)) {

            return $responder->response(true, null, $user);
        }

        return $responder->response(false, $form, $user);
    }
}