<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Entity;


class Invoice extends AbstractEntity
{
    /* @var Order */
    protected $order;

    /* @var \DateTime */
    protected $invoiceDate;

    /* @var float */
    protected $total;

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return Invoice
     */
    public function setOrder(Order $order): Invoice
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvoiceDate(): \DateTime
    {
        return $this->invoiceDate;
    }

    /**
     * @param \DateTime $invoiceDate
     * @return Invoice
     */
    public function setInvoiceDate(\DateTime $invoiceDate): Invoice
    {
        $this->invoiceDate = $invoiceDate;
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
     * @return Invoice
     */
    public function setTotal(?float $total): Invoice
    {
        $this->total = $total;
        return $this;
    }
}