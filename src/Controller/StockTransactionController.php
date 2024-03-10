<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StockTransactionController extends AbstractController
{
    #[Route('/buy', name: 'buy-stock')]
    public function buy(MessageService $messageService): Response
    {
        $messageService->dispatch();

        return $this->render('stocks/example.html.twig');
    }
}
