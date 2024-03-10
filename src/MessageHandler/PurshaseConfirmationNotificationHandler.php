<?php
declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\PurchaseConfirmmationNotification;
use Mpdf\Mpdf;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class PurshaseConfirmationNotificationHandler
{
    public function __invoke(PurchaseConfirmmationNotification $notification)
    {

    }
}
