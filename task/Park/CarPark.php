<?php

namespace Task\Park;

abstract class CarPark implements Park
{
    protected $park;

    /**
     * @return mixed
     */
    public function getPark()
    {
        return $this->park;
    }

    /**
     * @param mixed $park
     */
    public function setPark($park)
    {
        $this->park = $park;
    }
}