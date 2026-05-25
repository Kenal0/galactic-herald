<?php

namespace App\Core;
class Container
{
    private array $bindings = [];

    public function bind($abstract, $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function resolve($abstract): object
    {
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract];
        }

        throw new \Exception("No binding found for {$abstract}");
    }
}