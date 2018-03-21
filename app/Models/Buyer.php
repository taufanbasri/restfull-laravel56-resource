<?php

namespace App\Models;

use App\Scopes\BuyerScope;
use App\Models\Transaction;
use App\Transformers\BuyerTransformer;

class Buyer extends User
{
    public $transformer = BuyerTransformer::class;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerScope);
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }
}
