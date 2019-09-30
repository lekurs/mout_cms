<?php


namespace App\UI\Responder\Admin\Parameters\User;


use App\UI\Responder\Interfaces\AddNewUserResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class AddNewUserResponder implements AddNewUserResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * AddNewUserResponder constructor.
     * @param $twig
     * @param $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('admin')) :
            $response = new Response($this->twig->render('/admin/parameters/user/add-user-administration.html.twig', [
                'form' => $form->createView(),
            ]));

        return $response;
    }
}
