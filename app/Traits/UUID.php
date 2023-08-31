<?php

namespace App\Traits;

use Hidehalo\Nanoid\Client;
use Illuminate\Support\Facades\Auth;

trait UUID
{
    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $size = 21;

            if ($model->getIncrementing() == false and $model->getKeyType() == 'string') {
                $model->{$model->getKeyName()} = (new Client())
                    ->formattedId(alphabet: $alphabet, size: $size);

                if (Auth::User() != null) {
                    $model->created_by = Auth::User()->id;
                    $model->updated_by = Auth::User()->id;
                    $model->deleted_by = Auth::User()->id;
                }
                // dd(vars: $model);
            }
        });
    }
}