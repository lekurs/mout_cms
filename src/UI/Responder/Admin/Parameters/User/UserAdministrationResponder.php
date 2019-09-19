<?php


namespace App\UI\Responder\Admin\Parameters\User;


use App\UI\Responder\Interfaces\UserAdministrationResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UserAdministrationResponder implements UserAdministrationResponderInterface
{
    private $twig;

    /**
     * UserAdministrationResponder constructor.
     *
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $users): Response
    {
        return new Response($this->twig->render('/admin/parameters/user/users-admin.html.twig', [
            'users' => $users,
        ]));
    }
}
