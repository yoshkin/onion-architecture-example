<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Contract;


interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getUninvoicedOrders();
}