<?php
declare(strict_types=1);

namespace AYashenkov\Onion\Domain\Entity;


abstract class AbstractEntity
{
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AbstractEntity
     */
    public function setId($id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }
}