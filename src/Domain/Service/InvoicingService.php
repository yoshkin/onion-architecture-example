<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Service;

use AYashenkov\Onion\Domain\Contract\OrderRepositoryInterface;
use AYashenkov\Onion\Domain\Factory\InvoiceFactory;

class InvoicingService
{
    /* @var OrderRepositoryInterface */
    protected $orderRepository;

    /* @var InvoiceFactory */
    protected $invoiceFactory;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        InvoiceFactory $invoiceFactory
    )
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceFactory = $invoiceFactory;
    }

    public function generateInvoices()
    {
        $invoices = [];
        if ($orders = $this->orderRepository->getUninvoicedOrders()) {
            foreach ($orders as $order) {
                $invoices[] = $this->invoiceFactory->createFromOrder($order);
            }
        }

        return $invoices;
    }
}