<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Contract;


interface RepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function persist($entity);
    public function begin();
    public function commit();
}