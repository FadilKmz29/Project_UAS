<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MotorSeeder extends Seeder
{
    public function run(): void
    {
        $motors =  [
            [
                'id' => 'tt1746090',
                'nama' => 'Honda Super Cub',
                'deskripsi' => 'Motor ini adalah salah satu yang paling laris sepanjang masa. Diluncurkan pada tahun 1958, Super Cub dikenal karena desainnya yang sederhana, andal, dan mudah dikendarai. Motor ini populer di berbagai belahan dunia.',
                'tahun' => 1958,
                'category_id' => 1,
                'asal' => 'Jepang',
                'foto_sampul' => 'honda.jpg',
            ],
            [
                'id' => 'tt0944947',
                'nama' => 'Harley-Davidson Sportster',
                'deskripsi' => 'Dikenal sebagai bagian dari warisan Amerika Serikat, Sportster adalah salah satu model ikonik dari Harley-Davidson. Diproduksi sejak tahun 1957, motor ini terkenal karena gaya khasnya yang kuat dan performa yang tangguh.',
                'tahun' => 1957,
                'category_id' => 1,
                'asal' => 'Amerika Serikat',
                'foto_sampul' => 'harley.jpg',
            ],
            [
                'id' => 'tt0111161',
                'nama' => 'Yamaha YZF-R1',
                'deskripsi' => 'Merupakan salah satu motor sport yang sangat dihormati di dunia balap. YZF-R1 hadir dengan teknologi canggih dan performa tinggi, menjadi favorit di sirkuit balap dan juga di jalan raya.',
                'tahun' => 1998,
                'category_id' => 2,
                'asal' => 'Jepang ',
                'foto_sampul' => 'yamaha.jpg',
            ],
            [
                'id' => 'tt0109830',
                'nama' => 'Kawasaki Ninja ZX-10R',
                'deskripsi' => 'Motor sport dari Kawasaki ini terkenal karena keunggulannya di lintasan balap. Dengan teknologi tinggi dan performa yang luar biasa, Ninja ZX-10R menjadi pilihan banyak pembalap.',
                'tahun' => 2004,
                'category_id' => 2,
                'asal' => 'Jepang ',
                'foto_sampul' => 'kawasaki.jpg',
            ],
            [
                'id' => 'tt0108778',
                'nama' => 'BMW R 1250 GS',
                'deskripsi' => 'Merupakan motor jenis adventure yang sangat populer. GS series dari BMW terkenal akan keandalannya dalam perjalanan jarak jauh dan penggunaannya di berbagai kondisi medan.',
                'tahun' => 2018,
                'category_id' => 3,
                'asal' => 'Jerman',
                'foto_sampul' => 'bmw.jpg',
            ],
            [
                'id' => 'tt0109831',
                'nama' => 'Ducati Panigale V4',
                'deskripsi' => 'Ducati dikenal karena motor-motor sport premiumnya, dan Panigale V4 adalah salah satu yang paling ikonik. Memadukan performa tinggi dengan desain yang elegan, motor ini menjadi impian para penggemar motor sport.',
                'tahun' => 2018,
                'category_id' => 2,
                'asal' => 'Italia',
                'foto_sampul' => 'ducati.jpg',
            ],
            [
                'id' => 'tt0317740',
                'nama' => 'Triumph Bonneville T120',
                'deskripsi' => 'Bonneville T120 membawa gaya klasik Britania dengan sentuhan modern. Motor klasik ini diluncurkan ulang pada tahun 2016, tetapi tetap mempertahankan estetika vintage yang disukai banyak penggemar motor klasik.',
                'tahun' => 2016,
                'category_id' => 1,
                'asal' => 'Inggris',
                'foto_sampul' => 'triumph.jpg',
            ],
            [
                'id' => 'tt0120737',
                'nama' => 'Suzuki Hayabusa',
                'deskripsi' => 'Hayabusa, dengan kecepatan tertingginya yang luar biasa, menjadi salah satu motor sport paling dihormati. Diluncurkan pada tahun 1999, motor ini mempertahankan reputasinya sebagai salah satu motor tercepat di dunia.',
                'tahun' => 1999,
                'category_id' => 2,
                'asal' => 'Jepang',
                'foto_sampul' => 'suzuki.jpg',
            ],
            
            
        ];
        foreach ($motors as $motor) {
            Motor::create([
                'id' => $motor['id'],
                'nama' => $motor['nama'],
                'deskripsi' => $motor['deskripsi'],
                'tahun' => $motor['tahun'],
                'category_id' => $motor['category_id'],
                'asal' => $motor['asal'],
                'foto_sampul' => $motor['foto_sampul'],
            ]);
        }

    }
}
