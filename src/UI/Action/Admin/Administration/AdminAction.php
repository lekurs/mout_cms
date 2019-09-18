<?php


namespace App\UI\Action\Admin\Administration;


use App\UI\Action\Interfaces\AdminActionInterface;
use App\UI\Responder\Interfaces\AdminReponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminAction
 * @Route(name="admin", path="/admin")
 */
class AdminAction implements AdminActionInterface
{
    public function __invoke(AdminReponderInterface $reponder): Response
    {
        return $reponder->response();
    }
}