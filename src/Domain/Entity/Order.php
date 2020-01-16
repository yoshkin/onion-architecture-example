<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Entity;


class Order extends AbstractEntity
{
    /* @var Customer */
    protected $customer;

    /* @var string */
    protected $orderNumber;

    /* @var string */
    protected $description;

    /* @var float|null */
    protected $total;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Order
     */
    public function setCustomer(Customer $customer): Order
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return Order
     */
    public function setOrderNumber(string $orderNumber): Order
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Order
     */
    public function setDescription(string $description): Order
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     * @return Order
     */
    public function setTotal(?float $total): Order
    {
        $this->total = $total;
        return $this;
    }
}