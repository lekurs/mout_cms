<?php


namespace App\UI\Responder\Admin\Administration;


use App\UI\Responder\Interfaces\AdminReponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AdminReponder implements AdminReponderInterface
{
    private $twig;

    /**
     * AdminReponder constructor.
     *
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function response(): Response
    {
        return  new Response($this->twig->render('/layout/admin-layout.html.twig', [

        ]));
    }
}