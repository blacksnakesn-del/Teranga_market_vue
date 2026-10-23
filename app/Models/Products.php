<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'categorie_id',
        'price',
        'salePrice',
        'stock',
        'unit',
        'origin',
        'desciption',
        'image',
        'active',
        'featured',
    ];

    protected $casts = [
        'name' => 'string',
        'categorie_id' => 'integer',
        'price' => 'integer',
        'salePrice' => 'integer',
        'stock' => 'integer',

    ];

    public function toCatalogArray() {
        return [
            'name' => $this->name,
            'categorie_id' => $this->category,
            'price' => $this->price,
            'salePrice' => $this->salePrice,
            'stock' => $this->stock,
            'unit' => $this->unit,
            'origin' => $this->origin,
            'description' => $this->description,
            'image' => $this->image,
            'active' => $this->active,
            'featured' => $this->featured,
        ];
    }
}