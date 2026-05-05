<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "product_code" => "SKILL-PHP8",
            "name" => "PHP 8",
            "description_short" => "Short description of product 1",
            "description_long" => "Long description of product 1",
            "price" => 199.99
        ]);

        Product::create([
            "product_code" => "SKILL-LARAVEL",
            "name" => "Laravel",
            "description_short" => "Short description of product 2",
            "description_long" => "Long description of product 2",
            "price" => 149.99
        ]);

        Product::create([
            "product_code" => "SKILL-MYSQL",
            "name" => "MySQL Databases",
            "description_short" => "Short description of product 3",
            "description_long" => "Long description of product 3",
            "price" => 179.99
        ]);

        Product::create([
            "product_code" => "SKILL-MSSQL",
            "name" => "Microsoft SQL Server",
            "description_short" => "Short description of product 4",
            "description_long" => "Long description of product 4",
            "price" => 129.99
        ]);

        Product::create([
            "product_code" => "SKILL-NOSQL",
            "name" => "NoSQL Databases",
            "description_short" => "Short description of product 5",
            "description_long" => "Long description of product 5",
            "price" => 159.99
        ]);
    }
}
