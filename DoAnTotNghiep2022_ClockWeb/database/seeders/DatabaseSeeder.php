<?php

namespace Database\Seeders;

use App\Models\Slide;
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
        $this->call([
            UserSeeder::class,
            LoaiSanPhamSeeder::class,
            NhaCungCapSeeder::class,
            SlideSeeder::class,
            ContactSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
