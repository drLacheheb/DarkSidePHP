<?php

namespace Core;

class Container
{
    private array $bindings = [];

    public function bind(string $key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws \Exception
     */
    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception('No matching binding for : ' . $key);
        } else {
            $resolver = $this->bindings[$key];
            return call_user_func($resolver);
        }
    }
}