<?php
declare(strict_types=1);

namespace App\MessageHandler\Command;

use App\Message\Command\SaveOrder;
use App\Message\Event\OrderSavedEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class SaveOrderHandler
{
    public function __construct(private MessageBusInterface $eventBus)
    {
    }

    public function __invoke(SaveOrder $saveOrder)
    {
        $orderId = 123;
        echo 'Заказ сохранен' . PHP_EOL;

        $this->eventBus->dispatch(new OrderSavedEvent($orderId));
    }
}