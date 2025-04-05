<?php

namespace Database\Seeders;

use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa produtos existentes
        Product::truncate();
        
        // Inicializa o Faker com locale pt_BR
        $faker = Faker::create('pt_BR');
        
        // Instancia o repositório
        $productRepository = app(ProductRepository::class);
        
        // Cria 500 produtos
        for ($i = 0; $i < 500; $i++) {
            $name = $faker->word();
            $description = $faker->sentence();
            $price = round($faker->randomFloat(2, 10, 1000), 2);
            $total = $faker->numberBetween(1, 100);
            
            $productRepository->store($name, $description, $price, $total);
        }
    }
}
