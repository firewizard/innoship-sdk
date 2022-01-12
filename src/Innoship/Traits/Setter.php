<?php

namespace Innoship\Traits;

trait Setter
{
    public function __set($attribute, $value)
    {
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
        }

        return $this;
    }

    public function __call($method, $arguments)
    {
        if (substr($method, 0, 3) === 'set') {
            $propery = strtolower(substr($method, 3, 1)) . substr($method, 4);
            $this->$propery = $arguments[0] ?? null;
        }

        return $this;
    }
}