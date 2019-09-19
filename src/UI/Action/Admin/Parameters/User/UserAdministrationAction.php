<?php


namespace App\UI\Action\Admin\Parameters\User;


use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Action\Interfaces\UserAdministrationActionInterface;
use App\UI\Responder\Interfaces\UserAdministrationResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserAdministrationAction
 * @Route(name="adminUserShow", path="/admin/utilisateurs")
 */
class UserAdministrationAction implements UserAdministrationActionInterface
{
    private $userRepository;

    /**
     * UserAdministrationAction constructor.
     *
     * @param $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request, UserAdministrationResponderInterface $responder): Response
    {
        $users = $this->userRepository->getAllByRole();

        return  $responder->response($users);
    }
}
