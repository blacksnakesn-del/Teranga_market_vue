<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UnexpectedValueException;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = file_get_contents(base_path('database/data/demo.json'));
        $data = json_decode($json, true);

        if(! is_array($data)) {
            throw new UnexpectedValueException("Error", 1);
        }

        foreach($data['categories'] as $categorie) {
            Categories::updateOrcreate(
                ['id' =>(int) $categorie['id']],
                [
                    'name' => $categorie['name'],
                    'color' => $categorie['color'],
                    'image' => $categorie['image'],
                ]
            );
        }

        foreach($data['products'] as $product) {
            Products::updateOrcreate(
                ['id' => (int) $product['id']],
                [
                    'name' => $product['name'],
                    'categorie_id' => $product['categoryId'],
                    'price' => $product['price'],
                    'salePrice' => $product['salePrice'],
                    'stock' => $product['stock'],
                    'unit' => $product['unit'],
                    'origin' => $product['origin'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                    'active' => $product['active'],
                    'featured' => $product['featured'],
                ]
            );
        }
    }
}
 