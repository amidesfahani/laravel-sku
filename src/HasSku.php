<?php

namespace Amid\Sku;

use Amid\Sku\Concerns\SkuObserver;
use Amid\Sku\Concerns\SkuOptions;

trait HasSku
{
    /**
     * Boot the trait by adding observers.
     *
     * @return void
     */
    public static function bootHasSku()
    {
        static::observe(SkuObserver::class);
    }

    /**
     * Get the options for generating the Sku.
     *
     * @return Amid\Sku\SkuOptions
     */
    public function skuOptions(): SkuOptions
    {
        return resolve(SkuOptions::class);
    }

    /**
     * Fetch SKU option.
     *
     * @param  string $key
     * @return mixed
     */
    public function skuOption(string $key)
    {
        return $this->skuOptions()->{$key};
    }

    /**
     * Unless the field is called something else, we can safely get the value from the attribute.
     *
     * @param  mixed $value
     * @return string
     */
    public function getSkuAttribute($value)
    {
        return $value;
        // prevent n+1 probmel!
        // return (string) $value ?: $this->getAttribute($this->skuOption('field'));
    }
}
