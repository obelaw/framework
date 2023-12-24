<?php

namespace Obelaw\Framework\Support;

abstract class DTO
{
    public function getData(array $keys = null): array
    {
        $collection = collect((array) $this);

        if ($keys) {
            return $collection->only($keys)->all();
        }

        return $collection->all();
    }
}
