<?php

namespace Amid\Sku\Contracts;

interface SkuGenerator
{
    /**
     * Render the SKU.
     *
     * @return string
     */
    public function render(): string;
}
