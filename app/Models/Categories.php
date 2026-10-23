<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model

{
    protected $fillable = ['name', 'color', 'image'];

    protected $casts = [
        'name' => 'string',
        'color' => 'string',
        'image' => 'string'
    ];

    public function toCatalogArray() : array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'color' => $this->color,
            'image' => $this->image,
        ];
    }
}
