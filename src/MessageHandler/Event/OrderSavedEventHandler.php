<?php
declare(strict_types=1);

namespace App\MessageHandler\Event;

use App\Message\Event\OrderSavedEvent;
use Mpdf\Mpdf;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class OrderSavedEventHandler
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(OrderSavedEvent $event)
    {
        $mpdf = new Mpdf();
        $content = "<h1>Contact Note for order {$event->getOrderId()}</h1>";
        $content .= '<p>Total:<b>$1898.75</b>></p>>';
        $mpdf->writeHTML($content);
        $contractMpdf = $mpdf->output('', 'S');

        $email = (new Email())
            ->from('sales@stoackapp.com')
            ->to('email@example.com')
            ->subject('Примечание по контракту на заказ' . $event->getOrderId())
            ->text('Here is your contract note')
            ->attach($contractMpdf, 'contract-notr.pdf');

        $this->mailer->send($email);
    }
}