<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryZones extends Model
{
    protected $fillable = ['name', 'fee'];

    protected $casts = [
        'name' => 'string',
        'fee' => 'integer'
    ];

    public function toCatalogArray() {
        return [
            'name' => $this->name,
            'fee' => $this->fee,
        ];
    }
}

