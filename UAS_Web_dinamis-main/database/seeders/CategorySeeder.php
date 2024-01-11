<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Klasik',
                'keterangan' => 'Motor Low-cc'
            ],
            [
                'nama_kategori' => 'Sport',
                'keterangan' => 'Motor Middle-cc'
            ],
            [
                'nama_kategori' => 'Touring',
                'keterangan' => 'Motor High-cc'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
