<?php


namespace App\UI\Responder\Admin\Parameters\User;


use App\Domain\Models\User;
use App\UI\Responder\Interfaces\EditUserAdminResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class EditUserAdminResponder implements EditUserAdminResponderInterface
{
    private $urlGenerator;

    private $twig;

    /**
     * EditUserAdminResponder constructor.
     *
     * @param $urlGenerator
     * @param $twig
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, Environment $twig)
    {
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }

    public function response($redirect = false, FormInterface $form = null, User $user): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('adminUserShow')) :
            $response = new Response($this->twig->render('/admin/parameters/user/edit-user-administration.html.twig', [
                'form' => $form->createView(),
                'user' => $user
            ]));

        return $response;
    }
}
