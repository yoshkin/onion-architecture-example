<?php

use AYashenkov\Onion\Domain\Entity\Invoice;
use AYashenkov\Onion\Domain\Entity\Order;
use AYashenkov\Onion\Domain\Factory\InvoiceFactory;
use AYashenkov\Onion\Domain\Service\InvoicingService;

describe('InvoiceFactory', function () {
    describe('->createFromOrder()', function () {
        it('should return an Invoice object', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice)->to->be->instanceof('AYashenkov\Onion\Domain\Entity\Invoice');
        });

        it('should set the total of the Invoice', function () {
            $order = new Order();
            $order->setTotal(500);

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getTotal())->to->equal((float)500);
        });

        it('should associate the Order to the Invoice', function () {
            $order = new Order();

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getOrder())->to->equal($order);
        });

        it('should set the date of the Invoice', function () {
            $order = new Order();

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getInvoiceDate())->to->be->an->instanceof(new \DateTime());
        });
    });
});


describe('InvoicingService', function () {
    describe('->generateInvoices()', function (){
        beforeEach(function (){
            $repo = 'AYashenkov\Onion\Domain\Contract\OrderRepositoryInterface';
            $this->repository = $this->getProphet()->prophesize($repo);
            $this->factory = $this->getProphet()->prophesize('AYashenkov\Onion\Domain\Factory\InvoiceFactory');
        });

        it('should query the OrderRepository for uninvoiced Orders', function () {
            $this->repository->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $service->generateInvoices();
        });

        it('should return an Invoice for each uninvoiced Order', function () {
            $orders = [(new Order())->setTotal(400)];
            $invoices = [(new Invoice())->setTotal(400)];

            $this->repository->getUninvoicedOrders()->willReturn($orders);
            $this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);

            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $results = $service->generateInvoices();

            expect($results)->to->be->a('array');
            expect($results)->to->have->length(count($orders));
        });
    });
});