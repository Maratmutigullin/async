<?php
declare(strict_types=1);

namespace App\Service;


use App\Message\Command\SaveOrder;
use App\Message\PurchaseConfirmmationNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MessageService extends AbstractService
{
    public function __construct(protected EntityManagerInterface $em, protected MessageBusInterface $bus)
    {
        parent::__construct($em);
    }

    public function dispatch()
    {
//        $order = new class {
//            public function getId()
//            {
//                return 1;
//            }
//
//            public function getBuyer(): object
//            {
//                return new class {
//                    public function getEmail(): string
//                    {
//                        return 'email@example.com';
//                    }
//                };
//            }
//        };

        $this->bus->dispatch(new SaveOrder());
    }
}