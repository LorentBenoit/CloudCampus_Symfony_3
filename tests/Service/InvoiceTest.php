<?php

namespace App\Tests\Service;

use App\Service\EmailService;
use App\Service\Invoice;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvoiceTest extends KernelTestCase
{
    public function testProcess()
    {
        $emailService = $this->getMockBuilder(EmailService::class)
            ->getMock();

        $emailService->expects($this->once())->method('send')
            ->willReturn(true);

        $invoice = new Invoice($emailService);

        $recipientEmail = 'client@example.com';
        $amount = 100;

        $result = $invoice->process($recipientEmail, $amount);

        $this->assertTrue($result);
    }
}

?>