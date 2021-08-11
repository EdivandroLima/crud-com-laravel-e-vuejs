<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Produto::factory()->create([
            "titulo" => "Smartphone Motorola Moto G10 64GB 4G Wi-Fi Tela 6.5'' Dual Chip 4GB RAM Câmera Quádrupla + Selfie 8MP - Cinza Aurora",
            "preco" => 1099,
            "img_produto" => "/storage/product_1.png",
            "descricao" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ipsum, temporibus velit libero inventore cum officiis in accusamus at ad unde ipsam sequi atque? Corrupti quis incidunt minima repellat aliquid. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ipsum, temporibus velit libero inventore cum officiis in accusamus at ad unde ipsam sequi atque? Corrupti quis incidunt minima repellat aliquid."
        ]);
        \App\Models\Produto::factory()->create([
            "titulo" => "Notebook Acer Core i5-10210U 8GB 512GB SSD Tela 15.6” Windows 10 Aspire 5 A515-54-50BT",
            "preco" => 3671.10,
            "img_produto" => "/storage/product_3.png",
            "descricao" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ipsum, temporibus velit libero inventore cum officiis in accusamus at ad unde ipsam sequi atque? Corrupti quis incidunt minima repellat aliquid. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ipsum, temporibus velit libero inventore cum officiis in accusamus at ad unde ipsam sequi atque? Corrupti quis incidunt minima repellat aliquid."
        ]);
    }
}
