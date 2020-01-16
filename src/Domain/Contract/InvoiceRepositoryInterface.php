<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Contract;


use AYashenkov\Onion\Domain\Entity\Invoice;
use AYashenkov\Onion\Domain\Entity\Order;

interface InvoiceRepositoryInterface extends RepositoryInterface
{
    public function createFromOrder(Order $order): Invoice;
}