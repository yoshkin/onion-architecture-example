<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Factory;


use AYashenkov\Onion\Domain\Entity\Invoice;
use AYashenkov\Onion\Domain\Entity\Order;

class InvoiceFactory
{
    /**
     * @param Order $order
     * @return Invoice $invoice
     * @throws \Exception
     */
    public function createFromOrder(Order $order): Invoice
    {
        $invoice = (new Invoice())
            ->setOrder($order)
            ->setInvoiceDate(new \DateTime())
            ->setTotal($order->getTotal());

        return $invoice;
    }
}