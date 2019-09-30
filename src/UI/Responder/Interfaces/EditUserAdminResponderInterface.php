<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\User;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface EditUserAdminResponderInterface
{
    /**
     * EditUserAdminResponderInterface constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, Environment $twig);

    public function response($redirect = false, FormInterface $form = null, User $user): Response;
}
